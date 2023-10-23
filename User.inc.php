<?php 
    class User {
        private $id;  //OBLIGATORIO
        private $name; //OBLIGATORIO
        private $surname1;
        private $surname2;
        private $email; //OBLIGATORIO
        private $birthday;
        private $phone;

        public function __construct ($id, $email ,$name ,$surname1='', $surname2='', $birthday=0, $phone=0) {
            $this->id =$id;
            $this->name =$name;
            $this->surname1 =$surname1;
            $this->surname2 =$surname2;
            $this->email =$email;
            $this->birthday = $birthday;
            $this->phone =$phone;
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

        private function getAge (): int {
            //Se obtiene la fecha en formato a partir de la función getDateBirthday
            $dateBirthday = $this->getDateBirthday($this->birthday);
            $today = new strtotime('now');
            $interval = $today - $dateBirthday;
            $age = floor($interval / (365 * 24 * 60 * 60));
            return $age;
            
        }

        private function getDateBirthday () { //$birtday esta en segundos
            return strtotime(date('Y-m-d', $this->birthday));
        }

        public function __toString(): string {
            return 
                "<article class='user'>" .
                "<h1>{$this->name} {$this->surname1} {$this->surname2} {$this->id}</h1>" .
                "<div>" .
                "<span> {$this->getDateBirthday()}</span></br>" .
                "<span>Email: {$this->email}</span></br>" .
                "<span>Teléfono: {$this->phone}</span></br>" .
                "</div>" .
                "</article>";
        }
        
        
    }
?>