<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php
    class Team {
    
    private $mechanics = [];
    private $riders = [];
    private $name;
    private $country; 

        public function __construct ($name, $country) {
            $this->name = $name;
            $this->country = $country;
        }

        public function __set ($property, $value) {
            if (isset($this->$property)) {
                $this->$property = $value;
            }
        }

        public function __get ($property) {
            if (isset($this->$property)) {
                return $this->$property;
            }
        }

        public function __toString() {
            $teamInfo = "Team: {$this->name} , Country: {$this->country}\n" . ", Mechanics: ";
            foreach ($this->mechanics as $mechanic) {
                $teamInfo .= $mechanic. ",";
            }
                $teamInfo .= "Riders: ";
            foreach ($this->riders as $rider) {
                $teamInfo .= $rider . ",";
            }
            return $teamInfo;
        }
        
        public function addRider (Rider $rider) {
            $this->riders[] = $rider;
        } 

        public function addMechanic (Mechanic $mechanic) {
            $this->mechanics[] = $mechanic;
        } 
    }
?>