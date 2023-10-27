<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php
    class Team {
    
    private $mechanic;
    private $rider;
    private $name;
    private $country; 

        public function __construct (Mechanic $mechanic, Rider $rider, $name, $country) {
            $this->mechanic = $mechanic;
            $this->rider = $rider;
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
            return "Team: " . $this->name . " from " . $this->city . " - " . $this->mechanic->nombre . " (Mechanic) - " . $this->rider->nombre . " (Rider)";
        }
    }
?>