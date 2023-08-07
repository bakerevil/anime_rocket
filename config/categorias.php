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
    
    public function get_categoria(){
        $consulta = "SELECT v.id, v.capitulo, v.thumbnail, v.archivo, c.categoria, v.anime, v.orden, v.v_status FROM videos v INNER JOIN rv_categoria c ON v.categoria = c.id";
        $query=$this->query($consulta);
        return $query;
    }

    
}                   
?>  