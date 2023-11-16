<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php 
    include_once (__DIR__ . '/formatDate.inc.php');

    class GrandPrix {

        private $date;
        private $riders;
        private $circuit;

        public function __construct ($date, Circuit $circuit) {
            $this->date = $date;
            $this->circuit = $circuit;
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

        public function addRider (int $position, Rider $rider) {
            if (!isset($this->riders[$position])) {
                $this->riders[$position] = $rider;
            }
        }

        public function results() {
            $gpInfo = "<h2>Circuito  {$this->circuit->__get('name')}</h2> " . "País: ". $this->circuit->__get('country') . "\n Fecha: ". getDateBirthday($this->date) . "<h2>Pilotos</h2>";
        
            foreach ($this->riders as $position => $rider) {
                $gpInfo .= "Posición $position: " . $rider->__get('name') . "</br>";
            }
            return $gpInfo;
        }

        public function __toString() {
            return "Circuito: " . $this->circuit->__toString() . "Fecha de realización:" . $this->date . " ";
        }


    }
?>