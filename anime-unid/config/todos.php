<?php
        class todos extends mysqli{
            public function __construct($host,$usuario,$pass,$bd){
            parent::__construct($host,$usuario,$pass,$bd);
        }

        public function get_todos(){
            $consulta = "SELECT * FROM video ORDER BY fecha_insercion ASC";
            $query = $this->query($consulta);
            return $query;
        }

        public function search($texto){
            $consulta = "SELECT * FROM video WHERE titulo like '%$texto%'";
            $query = $this->query($consulta);
            return $query; 
        }
    }
?>