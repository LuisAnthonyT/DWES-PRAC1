<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php 
    class GrandPrix {

        private $date;
        private $rider;

        function __construct (Rider $rider, $date) {
            $this->rider = $rider;
            $this->date = $date;
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
            return "GrandPrix: " . $this->date . " - Rider " .$this->mechanic->nombre . " (Mechanic) - " . $this->rider->nombre . " (Rider)";
        }


    }
?>