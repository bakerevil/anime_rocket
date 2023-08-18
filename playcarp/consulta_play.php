<?php
class modules extends mysqli{
    public $conexion;

    public function __construct(){
        $this->conexion= new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_sipnosis(){
        $id =$_GET['id'];
        $consulta = "SELECT capitulo FROM videos WHERE id = $id"; 
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row["capitulo"]; 
        }
        return($array);
    }

}

$modules = new modules();

if (isset($_POST)) {
    switch (isset($_POST["funcion"]) && $_POST["funcion"] ) {
        case 'get_sipnosis':
            $modules->get_sipnosis();
            break;
    }
}
