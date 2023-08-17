<?php
class modules extends mysqli{
    public $conexion;

    public function __construct(){
        $this->conexion= new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_sipnosis(){
        $consulta = "SELECT sipnosis FROM listas"; 
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row["sipnosis"]; 
        }
        echo json_encode($array);
    }

}

$modules = new modules();

if (isset($_POST)) {
    switch ($_POST["funcion"]) {
        case 'get_sipnosis':
            $modules->get_sipnosis();
            break;
        default:
            echo "Función incompleta";
            break;
    }
}
