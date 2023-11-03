<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php

    class Rider extends Person {
    
        private $number;

        public function __construct ($name, $birthday, $number) {
            parent::__construct($name, $birthday);
            $this->number = $number;
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
                '(Dorsal ' . $this->number . ")";
        }
    }
?>