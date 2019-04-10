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
                                         $_POST['responsible'],
                                         ""
                                        );
                    //Retrieving member pcd score the value according to the new advertence             
                    $memberDAO = new MemberDAO();  
                    $fields = array('scorePCD');      
                    $filters = array('name'=>$_POST['memberName']);
                    $memberPoints = $memberDAO->retrieve($fields,$filters);  
                    $newScore = $memberPoints[0]->getScorePCD() - $_POST['points'];    
                    $memberDAO->update(array('scorePCD'=>$newScore), array('name'=>$_POST['memberName']));

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
        public function update($advertence_id){
            if($this->isAdmin()){
                $advDAO = new AdvertenceDAO();
                if(count($advertence_id) > 0){

                    //Loads the data from advertence to edit
                    $fields = array();
                    $filters = array("adv_id"=>$advertence_id[0]);
                    $adv = $advDAO->retrieve($fields,$filters);
                    $memberDAO = new MemberDAO();

                    if(isset($_POST) && !empty($_POST)){
                        
                       
                        $fields = array('scorePCD');      
                        $filters = array('name'=>$adv[0]->getMemberName());
                        $member = $memberDAO->retrieve($fields,$filters);  
                        //Checking if new score is different, which means its necessary to update member ScorePCD
                        $pontosPCD = "";
                        if($_POST['points'] < $adv[0]->getPoints()){

                            $pontosPCD = $adv[0]->getPoints() - $_POST['points'];
                            $newScore = $member[0]->getScorePCD() + $pontosPCD;


                        }else if($_POST['points'] > $adv[0]->getPoints()){

                            $pontosPCD = $_POST['points'] - $adv[0]->getPoints();
                            $newScore = $member[0]->getScorePCD() - $pontosPCD;

                        }

                        //Save advertence data 
                        $fields = array(
                                        "reason"=>$_POST['reason'],
                                        "date"=>$_POST['datepicker'],
                                        "defense"=>$_POST['defense'],
                                        "points"=>$_POST['points']
                                        );
                        
                        $memberDAO->update(array('scorePCD'=>$newScore), array('name'=>$adv[0]->getMemberName()));
                        
                        $advDAO->update($fields,array("adv_id"=>$_POST['advId']));
                        $this->redirect('advertence');
                    }else{

                        $fields = array('name');
                        $filters = array("cpf"=>$_SESSION['cpf']);                    
                        $member = $memberDAO->retrieve($fields,$filters);
                        $this->data['single_profile'] = $member[0];
                        
                        $this->data['advertence'] = $adv[0];
                        $this->loadContent('advertence_update', $this->data);
                    }
                }else{
                    //Loads the data from advertences to the table
                    
                    $fields = array();
                    $filters = array();
                    $this->data['advertencesList'] = $advDAO->retrieve($fields,$filters);
                    $this->loadContent('advertence_list', $this->data);

                }
            }
        }       

        //Turn off the advertence
        public function removeAdvertence(){
            if($this->isLogged()){
                if(isset($_POST) && !empty($_POST)){

                    $advDAO = new AdvertenceDAO();

                    $fields = array('memberName', 'points');
                    $filters = array("adv_id"=>$_POST['advId']);
                    $adv = $advDAO->retrieve($fields,$filters);

                    $memberDAO = new MemberDAO();  
                    $fields = array('scorePCD');      
                    $filters = array('name'=>$adv[0]->getMemberName());
                    $member = $memberDAO->retrieve($fields,$filters);  

                    $newScore = $member[0]->getScorePCD() + $adv[0]->getPoints();
                    $memberDAO->update(array('scorePCD'=>$newScore), array('name'=>$adv[0]->getMemberName()));

                    //Remove the advertence
                     $advDAO->delete(array("adv_id"=>$_POST['advId']));
                     echo json_encode(array("success"=>true,"message"=>""));
                
                }
            }
        }
    }