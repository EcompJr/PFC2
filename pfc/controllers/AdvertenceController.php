<?php
    
    class AdvertenceController extends MainController{

        //Call the index page
        public function index(){
            if($this->isAdmin()){
                $this->loadContent('advertence_index',array());
            }
        }
        /*This method provides the service to register of the members. The register should be made by directors
        and all fields are required*/
        public function register(){
            if($this->isAdmin()){
                if(isset($_POST) && !empty($_POST)){
                    $advertenceDAO = new AdvertenceDAO();
                    $advertence = new Advertence($_POST['memberName'],
                                         $_POST['reason'],
                                         $_POST['datepicker'],
                                         $_POST['defense'],
                                         $_POST['points'],
                                         $_POST['responsible']
                                        );
                                
                    $advertenceDAO->insert($advertence); //Saves the advertence in database
                    
                    $this->redirect('advertence'); //Redirect the page
                }else{
                    $memberDAO = new MemberDAO();
                    $fields = array('name');
                    $filters = array("cpf"=>$_SESSION['cpf']);                    
                    $member = $memberDAO->retrieve($fields,$filters);
                    //Selecting member type other than adm
                    $filters_members = array("member_type !"=>'admin');
                    $members = $memberDAO->retrieve($fields,$filters_members);
                    $this->data['single_profile'] = $member[0];
                    $this->data['membersList'] = $members;
                    $this->loadContent('advertence_register', $this->data);
                }
            }
        }   

        //This method provides the service to update the registers of the members. The update is made by the member
        public function update(){
            if($this->isLogged()){
                if(isset($_POST) && !empty($_POST)){
                    //Save member data 
                    $memberDAO = new MemberDAO();
                    $fields = array("name"=>$_POST['name'],
                                    "professional_email"=>$_POST['professional_email'],
                                    "telephone"=>$_POST['telephone'],
                                    "marital_status"=>$_POST['marital_status'],
                                    "path_profile_picture"=>$_POST['path_profile_picture']);
                    
                    if(!empty($_POST['password_update'])){
                        $fields["password"] = password_hash($_POST['password_update'],PASSWORD_DEFAULT);
                    }

                    $memberDAO->update($fields,array("cpf"=>$_SESSION['cpf']));
                    $this->redirect('member');
                }else{
                    //Loads the data from advertences to the table
                    $advDAO = new AdvertenceDAO();
                    // $fields = array('name,professional_email,telephone,path_profile_picture');
                    // $filters = array('cpf'=>$_SESSION['cpf']);
                    // $member = $memberDAO->retrieve($fields,$filters);
                    $this->loadContent('advertence_update',array());
                }
            }
        }
        
        //This method provides the service of history of the transactions performed by members.
        public function history(){
            if($this->isLogged()){
                $memberDAO = new MemberDAO();
                $fields = array('cpf,path_profile_picture');
                $filters = array();
                $members = $memberDAO->retrieve($fields,$filters);

                if($_SESSION['member_type'] == "director" || $_SESSION['member_type'] == "admin"){
                    $this->data['profiles'] = $members;
                    $this->loadContent('director_history', $this->data['profiles']);
                }
                else{
                    $fields = array('name,personal_email,professional_email,birthdate,telephone,member_type,score,marital_status,scorePCD');
                    $filters = array("cpf"=>$_SESSION['cpf']);                    
                    $member = $memberDAO->retrieve($fields,$filters);
                    $this->data['single_profile'] = $member[0];

                    $historyDAO = new HistoryDAO();
                    $filters = array('member_cpf'=>$_SESSION['cpf']);
                    $history = $historyDAO->retrieve(array(),$filters);
                    $this->data['history'] = $history;

                    $this->loadContent('member_history', $this->data);
                }
            }
        }

        //Get the history from specific member
        public function selectMemberHistory(){
            if($this->isLogged()){
                $memberDAO = new MemberDAO();
                $historyDAO = new HistoryDAO();
                $requestDAO = new RequestDAO();
                $fields = array('name,personal_email,professional_email,birthdate,telephone,member_type,score,marital_status');
                
                $filters = array('cpf'=>$_POST['cpf']);
                $members = $memberDAO->retrieve($fields,$filters); //Get the member
                
                $filters = array('member_cpf'=>$_POST['cpf']);
                $history = $historyDAO->retrieve(array(),$filters); //Get the member history

                $filters = array("member_cpf"=>$_POST['cpf'],
                                 "status"=>"opened");
                $requests = $requestDAO->retrieve(array(),$filters); //Get opened requests
                echo json_encode(array($members[0],$history,$requests));
            }
        }

        //Turn off the advertence
        public function removeMember(){
            if($this->isLogged()){
                if(isset($_POST) && !empty($_POST)){
                    //Save member data 
                    $memberDAO = new MemberDAO();
                    $fields = array("password");
                    $filters = array("cpf"=>$_SESSION['cpf']);
                    $director_password;
                    
                    if(!empty($_POST['password_director'])){
                        $director_password = $_POST['password_director'];
                    }else{
                        echo json_encode(array("success"=>false,"message"=>"Por favor, insira a senha"));
                        return;
                    }

                    $director = $memberDAO->retrieve($fields,$filters)[0];
                    if(password_verify($director_password,$director->getPassword())){
                        //Get the member score
                        $fields = array("score","name");
                        $filters = array("cpf"=>$_POST['member_cpf']);
                        $member = $memberDAO->retrieve($fields,$filters)[0];
                        $memberScore = intval($member->getScore());

                        //Get the admin
                        $filter = array("member_type" => "admin");
                        $admin = $memberDAO->retrieve(array(),$filter)[0];
                        $adminScore = intval($admin->getScore());

                        if($admin->getCPF() == $_POST['member_cpf']){
                            echo json_encode(array("success"=>false,"message"=>"Operação Inválida"));
                            return;
                        }
                        //Update admin score
                        $new_data = array("score"=>$adminScore + $memberScore);
                        $filter = array("cpf" => $admin->getCPF());
                        $memberDAO->update($new_data,$filter);

                        $historyDAO = new HistoryDAO(); //Add the transaction to member history
                        $historyDAO->insert($admin->getCPF(),
                                            "Desligamento de ".$member->getName(),
                                            "gain",
                                            $memberScore);

                        //Remove the member
                        $memberDAO->delete(array("cpf"=>$_POST['member_cpf']));
                        echo json_encode(array("success"=>true,"message"=>""));
                    }else{
                        echo json_encode(array("success"=>false,"message"=>"Senha incorreta!"));
                    }
                }
            }
        }
    }