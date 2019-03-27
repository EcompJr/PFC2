<?php

    class AdvertenceDAO extends DAO{

        //Inserts a new member in database
        public function insert($advertence){
            $stmt = $this->PDO->prepare("INSERT INTO `advertences`( `memberName`, 
                                                       `reason`, `date`, `defense`, `points`, `responsible`) 
                                 VALUES (:memberName,:reason,:datepicker,:defense,
                                        :points,:responsible)");
            
            $stmt->bindValue(":memberName",$advertence->getMemberName(),PDO::PARAM_STR);
            $stmt->bindValue(":reason",$advertence->getReason(),PDO::PARAM_STR);
            $stmt->bindValue(":datepicker",$advertence->getDate(),PDO::PARAM_STR);
            $stmt->bindValue(":defense",$advertence->getDefense(),PDO::PARAM_STR);
            $stmt->bindValue(":points",$advertence->getPoints(),PDO::PARAM_STR);
            $stmt->bindValue(":responsible",$advertence->getREsponsible(),PDO::PARAM_STR);
           
            $stmt->execute();

        }

        //Update the advertence data in database. The query is generated dinamically from the parameters
        public function update($data,$filters){
            $query = "UPDATE advertences SET ";

            foreach($data as $key=>$value){
                $query .= $key.'='."'$value',";
            }

            $query = substr($query, 0, -1);
            
            if(count($filters) > 0){
                $query .= " WHERE ";
                $aux = array();

                foreach($filters as $key=>$value){
                    $aux[] = $key." = "."'$value'";
                }

                $query .= implode(" AND ",$aux);
            }
            
            
            $this->PDO->query($query);
        }

        //Retrieve a member from database. The query is generated dinamically from the parameters
        public function retrieve($fields,$filters){

            $query = "SELECT ";

            if(count($fields) == 0){
                $fields = array("*");
            }

            $query .= implode(',',$fields)." FROM advertences";

            if(count($filters) > 0){
                $query .= " WHERE ";
                $aux = array();

                foreach($filters as $key=>$value){
                    $aux[] = $key."="."'$value'";
                }
                
                $query .= implode(" AND ",$aux);
            }
            $result = $this->PDO->query($query);
            
            $advertences = array();
            if(!empty($result) && $result->rowCount() > 0){
                foreach($result->fetchAll() as $item){
                    $advertences[] = new Advertence(isset($item['memberName'])?$item['memberName']:null,
                                            isset($item['reason'])?$item['reason']:null,
                                            isset($item['date'])?$item['date']:null,
                                            isset($item['defense'])?$item['defense']:null,
                                            isset($item['points'])?$item['points']:null,
                                            isset($item['responsible'])?$item['responsible']:null,
                                            isset($item['adv_id'])?$item['adv_id']:null);
                }    
            }
            
            return $advertences;
        }

        //Search a member in database using LIKE. The query is generated dinamically from the parameters
        public function searchLike($fields,$filters){
            $query = "SELECT ";

            if(count($fields) == 0){
                $fields = array("*");
            }

            $query .= implode(',',$fields)." FROM member";

            if(count($filters) > 0){
                $query .= " WHERE ";
                $aux = array();

                foreach($filters as $key=>$value){
                    $aux[] = $key." LIKE "."'%$value%'";
                }
                
                $query .= implode(" AND ",$aux);
            }
            
            $result = $this->PDO->query($query);

            $members = array();
            if(!empty($result) && $result->rowCount() > 0){
                foreach($result->fetchAll() as $item){
                    $members[] = new Member(isset($item['name'])?$item['name']:null,
                                            isset($item['personal_email'])?$item['personal_email']:null,
                                            isset($item['professional_email'])?$item['professional_email']:null,
                                            isset($item['rg'])?$item['rg']:null,
                                            isset($item['cpf'])?$item['cpf']:null,
                                            isset($item['password'])?$item['password']:null,
                                            isset($item['birthdate'])?$item['birthdate']:null,
                                            isset($item['telephone'])?$item['telephone']:null,
                                            isset($item['marital_status'])?$item['marital_status']:null,
                                            isset($item['member_type'])?$item['member_type']:null,
                                            isset($item['score'])?$item['score']:null,
                                            isset($item['path_profile_picture'])?$item['path_profile_picture']:null,
                                            isset($item['scorePCD'])?$item['scorePCD']:null);
                }    
            }
            
            return $members;
        }

        //Delete a member from database. The query is generated dinamically from the parameters
        public function delete($filters){
            $query = "DELETE FROM advertences ";

            if(count($filters) > 0){
                $aux = array();
                $query .= "WHERE ";

                foreach($filters as $key=>$value){
                    $aux[] = $key." = "."'$value'";
                }

                $query .= implode(" AND ",$aux);
            }
            
            $this->PDO->query($query);
        }
    }