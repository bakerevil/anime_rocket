<?php
class episodios extends mysqli
{
    public $con;

    public function _construct($host, $user, $pass, $db)
    {
        parent ::__construct($host, $user, $pass, $db);
    }

    public function get_episodios(){
        $consulta = "SELECT * FROM videos WHERE anime ORDER BY orden ASC";
        $query = $this->query($consulta);
        return $query;
    }
}
?>