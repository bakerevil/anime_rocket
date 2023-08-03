<?php
class categorias extends mysqli
{
    public $con;

    public function _construct($host, $user, $pass, $db)
    {
        parent ::__construct($host, $user, $pass, $db);
    }

    public function get_data(){
        $consulta = "SELECT * FROM rv_categoria";
        $query=$this->query($consulta);
        return $query;
    }
    
}
?>