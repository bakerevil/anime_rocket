<?php
class videos extends mysqli
{
    public $con;

    public function _construct($host, $user, $pass, $db)
    {
        parent ::__construct($host, $user, $pass, $db);
    }

    public function get_videos(){
        $consulta = "SELECT v.id, v.capitulo, v.thumbnail, v.archivo, c.categoria, v.anime, v.fecha_insercion, v.orden, v.v_status FROM videos v INNER JOIN rv_categoria c ON v.categoria = c.id ORDER BY v.orden ASC";
        $query=$this->query($consulta);
        return $query;
    }
}
?>