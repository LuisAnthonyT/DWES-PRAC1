<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php
    class Circuit {
    
    private $name;
    private $country;
    private $laps; 

        public function __construct ($name, $country, $laps) {
            $this->name = $name;
            $this->country = $country;
            $this->laps = $laps;
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

        public function __toString(): string {
            return "Circuit: {$this->name}, Country: {$this->country}, Laps: {$this->laps}";
        
        }
    }
?>