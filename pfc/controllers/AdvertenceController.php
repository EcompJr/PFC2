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

                    //Send email to the corresponding member

                    $reason = $this->reasonPCD($_POST['reason'], $_POST['datepicker'],$_POST['points']);

                    $headers = "From: ".$_POST['email_remetente']."\r\n";
                    $destinatario =  $_POST['email_destinatario'];
                    $assunto = "[Programa de Controle Disciplinar] ".$reason['subject'];
                    $corpo = $reason['message'];
                    $headers .= 'Content-type: text/html;' . "\r\n";
                    mail($destinatario, $assunto, $corpo, $headers);
                    
                    $this->redirect('advertence'); //Redirect the page
                }else{

                    $memberDAO = new MemberDAO();
                    $fields = array('name', 'professional_email');
                    $filters = array("cpf"=>$_SESSION['cpf']);                    
                    $member = $memberDAO->retrieve($fields,$filters);
                    //Selecting member type other than adm
                    $filters_members = array("member_type !"=>'admin');
                    $members = $memberDAO->retrieve($fields,$filters_members);
                    $this->data['single_profile'] = $member[0];
                    if(empty($members)){
                        $this->data['membersList'] = array();

                    }else{
                        $this->data['membersList'] = $members;

                    }
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
                        
                        $advDAO->update($fields,array("adv_id"=>$advertence_id[0]));
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
        
        public function reasonPCD($reason_number,$date,$points){

            $reason = array("subject","message");
           
            if($reason_number == 1){

                $reason["subject"] = "Ausência nas reuniões, no dia ".$date;
                $reason["message"] = "Como já previsto no ".$reason_number."º artigo do Programa de Controle Disciplinar: <br><br>
                <strong>1. Ausência nas reuniões</strong> <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;Faltar alguma reunião que foi marcada com pelo menos 72 horas (3 dias) de antecedência sem nenhuma justificativa plausível. <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 1</b> Entende-se como justificativa plausível: motivos médicos (desde que apresentado atestado), aula extra marcada por professor no horário da reunião.<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 2</b> As reuniões <b>não</b> poderão ser marcadas em horários que indique impossibilidade devido à aulas ou reuniões de iniciação científica.<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 3</b> O membro deverá estar presente na reunião até seu fim, caso ele saia antes sem justificativa plausível, será penalizado como ausência.<br><br>
            Penalidade:  4 Pontos.<br><br>
            Você terá direito à defesa em até 7 dias, caso julgue a punição indevida, devendo mandar uma justificativa que será analisada, podendo então posteriormente ser indeferida ou não.
            ";

            }else if($reason_number == 2){

                $reason["subject"] = "Por atraso nas reuniões ao qual foi solicitado, do dia ".$date;
                $reason["message"] = "Como já previsto no ".$reason_number."º artigo do Programa de Controle Disciplinar: <br><br>
                <b>2. Por atraso nas reuniões ao qual foi solicitado</b> <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;Atrasar por mais de 15 minutos em alguma reunião que foi marcada com pelo menos 72 horas (3 dias) sem aviso prévio justificando  o atraso. <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 1</b> O atraso deverá ser justificado com pelo menos 12 horas de antecedência. <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 2</b>  Após 20 minutos caso o membro não tenha chegado, será tratado como ausência em reunião.<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 3</b> Imprevistos podem ser considerados como justificativa caso a outra parte afetada aceite-a. <br><br>
            Penalidade: 2 Pontos<br><br>
            Você terá direito à defesa em até 7 dias, caso julgue a punição indevida, devendo mandar uma justificativa que será analisada, podendo então posteriormente ser indeferida ou não.
            ";
            }else if($reason_number  == 3){

                $reason["subject"] = "Ausência ou atraso nas atividades para os quais forem designados, na data ".$date;
                $reason["message"] = "Como já previsto no ".$reason_number."º artigo do Programa de Controle Disciplinar: <br><br>
                <b>3. Ausência ou atraso nas atividades para os quais forem designados</b> <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;Atrasar ou não entregar pontualmente alguma meta de projeto que lhe tenha sido passada sem justificativa aceitável. <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 1</b> Entende-se como justificativa aceitável algum fator externo que de certa forma pode ter contribuído para o atraso na entrega, como por exemplo a disponibilidade de algum serviço de terceiros (e.g. servidor fora do ar) ou motivos de doença (desde que apresentado atestado que corresponda a pelo menos ⅓ do prazo que foi dado para resolução da meta). Outros motivos poderão também ser incluídos, desde que conversados e acordados com o Diretor de Projetos e/ou de Recursos Humanos. <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 2</b> A cada dia de atraso são perdidos 2 pontos até um total de 3 dias de atraso, situação na qual é considerada ausência da atividade e a tarefa deverá ser remanejada.<br><br>
            Penalidade: 2 Pontos por dia de atraso.<br>
            TOTAL:".$points." pontos.<br><br>
            Você terá direito à defesa em até 7 dias, caso julgue a punição indevida, devendo mandar uma justificativa que será analisada, podendo então posteriormente ser indeferida ou não.
            ";

            }else if($reason_number == 4){

                $reason["subject"] = "Ausência de resposta dos comunicados internos, na data ".$date;
                $reason["message"] = "Como já previsto no ".$reason_number."º artigo do Programa de Controle Disciplinar: <br><br>
                <b>4. Ausência de resposta dos comunicados internos</b> <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;Presumem-se lidas as correspondências eletrônicas em um prazo de 48 horas, assim o membro terá até este prazo para resposta de emails (quando necessário). <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 1</b> Alguns emails poderão receber prazo maior, desde que explicitados os seus prazos no corpo do texto. Caso o membro não possa responder por algum motivo, este motivo deverá ser expresso <strong>antes da finalização do prazo de resposta do email, sinalizando a falta de resposta.</strong> <br><br> 
            Penalidade: 2 Pontos<br><br>
            Você terá direito à defesa em até 7 dias, caso julgue a punição indevida, devendo mandar uma justificativa que será analisada, podendo então posteriormente ser indeferida ou não.
            ";

            }else if($reason_number == 5){

                $reason["subject"] = "Ausência na sede no horário acordado (plantão), na data ".$date;
                $reason["message"] = "Como já previsto no ".$reason_number."º artigo do Programa de Controle Disciplinar: <br><br>
                <b>5. Ausência na sede no horário acordado (plantão)</b><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;O membro poderá faltar no seu horário por motivos pessoais desde que não seja recorrente (2 vezes em 2 semanas) e estas faltas deverão ser sinalizadas com pelo menos 12 horas de antecedência para o diretor de recursos humanos.<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 1</b> Cada plantão corresponde à 2 horas.<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 2</b> O membro que precise faltar mais do que 1 vez em um período de 15 dias deverá apresentar justificativa plausível (e.g. atestado médico, aula extra e entre outros).  <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 3</b> O membro deverá ficar na sede no horário acordado, do início ao fim, caso este se atrase (10 minutos) e/ou saia antes sem justificativa plausível será penalizado em 2 pontos.<br><br>
                Penalidade: 4 Pontos<br><br>
                Você terá direito à defesa em até 7 dias, caso julgue a punição indevida, devendo mandar uma justificativa que será analisada, podendo então posteriormente ser indeferida ou não.
            ";

            }else if($reason_number == 6){
                  
                $reason["subject"] = "Atitudes negativas, na data ".$date;
                $reason["message"] = "Como já previsto no ".$reason_number."º artigo do Programa de Controle Disciplinar: <br><br>
                <b>6. Atitudes que possam denegrir a imagem, ofender a dignidade ou conter preconceito de natureza pejorativa</b><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;O membro será punido caso haja de maneira desrespeitosa com outro membro durante encontros (reunião, integração, assembleias) fazendo algum comentário impróprio/inadequado. <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Obs. 1</b> O membro que se sentir ofendido de certa maneira deverá reportar o acontecido ao diretor de recursos humanos, para que assim  os dois lados sejam ouvidos e as devidas providências sejam tomadas.<br><br>
                Penalidade: 10 Pontos<br><br>
                Você terá direito à defesa em até 7 dias, caso julgue a punição indevida, devendo mandar uma justificativa que será analisada, podendo então posteriormente ser indeferida ou não.
                
                ";

            }

            return $reason;
        }
    }