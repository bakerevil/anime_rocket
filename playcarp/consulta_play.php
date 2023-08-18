<?php
class modules extends mysqli {
    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_sipnosis() {
        $id = $_GET['id'];
        $consulta = "SELECT sipnosis FROM listas WHERE id = $id";
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row["sipnosis"];
        }
        return $array;
    }

    public function get_data($id) {
        $consulta = "SELECT archivo FROM videos WHERE id = $id";
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
                "video_url" => $row["archivo"],
            ];
        }
        echo json_encode($array);
    }
}

$modules = new modules();

if (isset($_POST["funcion"])) {
    switch ($_POST["funcion"]) {
        case 'get_sipnosis':
            $sipnosis = $modules->get_sipnosis();
            echo json_encode($sipnosis);
            break;
        case 'get_data':
            $id = $_POST['id'];
            $modules->get_data($id);
            break;
    }
}
?>

