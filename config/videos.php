<?php
class videos extends mysqli
{
    public $con;

    public function _construct($host, $user, $pass, $db)
    {
        parent ::_construct($host, $user, $pass, $db);
    }

    public function get_videos(){
        $consulta = "SELECT * FROM videos";
        $query=$this->query($consulta);
        return $query;
    }
    public function search($texto){
        $consulta = "SELECT * FROM videos WHERE titulo like '%$texto%'";
        $query = $this->query($consulta);
        return $query;
    }
}
?>