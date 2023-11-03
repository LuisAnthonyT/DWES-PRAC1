<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php
    require_once(__DIR__ . '/Person.inc.php');
    
    class Mechanic extends Person {
    
        private $speciality;

        public function __construct ($name, $birthday, $speciality) {
            parent::__construct($name, $birthday);
            $this->speciality = $speciality;
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
            return parent::__toString() . ' '.
                "(Especialidad: " . $this->speciality .")";
        }
    }
?>