<?php
class listas extends mysqli
{
    public function _construct($host, $user, $pass, $db)
    {
        parent ::_construct($host, $user, $pass, $db);
    }

    public function get_listas(){
        $consulta = "SELECT * FROM listas";
        $query=$this->query($consulta);
        return $query;
    }
    public function search($texto){
        $consulta = "SELECT * FROM listas WHERE titulo like '%$texto%'";
        $query = $this->query($consulta);
        return $query;
    }
}