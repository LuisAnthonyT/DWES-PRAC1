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

        private function getAge () {
            //date_default_timezone_set('Europe/Madrid');
            
            $dateBirthday = date_create(date('Y-m-d', $this->birthday));
            $today = date_create(date('Y-m-d'));
            $age = date_diff($dateBirthday , $today);
            return $age->y;
            
        }

        private function getDateBirthday () {
            //return date('d-m-Y', $this->birthday);
            // setlocale(LC_TIME, 'es_ES', 'spanish'); // Establecer la configuración regional a español
            // return strftime('%e de %B de %Y', $this->birthday);
            $mesesEnEspanol = [
                'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
            ];
        
            $fecha = getdate($this->birthday);
            return $fecha['mday'] . ' de ' . $mesesEnEspanol[$fecha['mon'] - 1] . ' de ' . $fecha['year'];
        }

        public function __toString(): string {
            return 
                "<article class='user'>" .
                "<h1>{$this->name} {$this->surname1} {$this->surname2} {$this->id}</h1>" .
                "<div>" .
                "<span> {$this->getAge()} años {$this->getDateBirthday()}</span></br>" .
                "<span>Email: {$this->email}</span></br>" .
                "<span>Teléfono: {$this->phone}</span></br>" .
                "</div>" .
                "</article>";
        }
        
        
    }
?>