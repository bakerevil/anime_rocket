<?php
    require_once('valid.php');
    class Admin extends mysqli{
        public function __construct($host,$usuario,$pass,$bd){
            parent::__construct($host,$usuario,$pass,$bd);
        }
        
        public function validation($correo, $passwords){
            $consulta = "SELECT correo, passwords, rol FROM usuarios WHERE correo='$correo' AND passwords='$passwords' AND status='1'";
            $query = $this->query($consulta);
            return $query;
        }
    }
?>