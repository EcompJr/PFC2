<?php

    class Advertence implements JsonSerializable{
        
        private $memberName;
        private $reason;
        private $date;
        private $defense;
        private $points;
        private $responsible;
        private $id;
        
        public function __construct($memberName,$reason,$date,$defense,$points,$responsible, $id){
            
            $this->memberName = $memberName;
            $this->reason = $reason;
            $this->date = $date;
            $this->defense = $defense;
            $this->points = $points;
            $this->responsible = $responsible;
            $this->id = $id;
        }

        public function getMemberName(){
            return $this->memberName;
        }

        public function getReason(){
            return $this->reason;
        }

        public function getDate(){
            return $this->date;
        }

        public function getDefense(){
            return $this->defense;
        }

        public function getPoints(){
            return $this->points;
        }

        public function getResponsible(){
            return $this->responsible;
        }
        public function getId(){
            return $this->id;
        }

        public function jsonSerialize(){
            return [
                "memberName"=>$this->memberName,
                "reason"=>$this->reason,
                "datepicker"=>$this->date,
                "defense"=> $this->defense,
                "points"=>$this->points,
                "responsible"=>$this->responsible,
                "id"=>$this->id
            ];
        }
    }