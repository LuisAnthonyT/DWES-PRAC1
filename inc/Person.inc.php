<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php
    class Person {
    
    protected $name;
    protected $birthday; 

        public function __construct ($name, $birthday) {
            $this->name = $name;
            $this->birthday = $birthday;
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
            return $this->name ." ". $this->birthday;
        }
    }
?>