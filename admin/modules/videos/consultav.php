<?php
class modules extends mysqli
{
    public $conexion;
    
    public function __construct()
    {
        $this->conexion = new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_data()
    {
        $consulta = "SELECT v.id, v.capitulo, v.thumbnail, v.archivo, v.fecha_insercion, v.fecha_publicacion, v.orden, rsc.status, ur.categoria, rsl.titulo, v.archivo FROM videos v LEFT JOIN status rsc ON v.v_status = rsc.id LEFT JOIN rv_categoria ur ON v.categoria = ur.id LEFT JOIN listas rsl ON v.anime = rsl.id";
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
                "id" => $row["id"],
                "capitulo" => $row["capitulo"],
                "avatar" => $row["thumbnail"],
                "categoria" => $row["categoria"],
                "anime" => $row["titulo"],
                "fechai" => $row["fecha_insercion"],
                "fechap" => $row["fecha_publicacion"],
                "orden" => $row["orden"],
                "status" => $row["status"],
                "videoprev" => $row["archivo"],
            ];
        }
        echo json_encode($array);
    }

    public function get_one($id)
    {
        $consulta = "SELECT * FROM videos  WHERE id = ?";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $array = [
            "id" => $row["id"],
            "capitulo" => $row["capitulo"],
            "avatar" => $row["thumbnail"],
            "categoria" => $row["categoria"],
            "anime" => $row["anime"],
            "fechai" => $row["fecha_insercion"],
            "fechap" => $row["fecha_publicacion"],
            "status" => $row["v_status"],
            "videoprev" => $row["archivo"],
        ];
        echo json_encode($array);
    }

    public function login()
    {
        $correo = $_POST['correo'];
        $passwords = $_POST['passwords'];
        $consulta = "SELECT * FROM usuarios WHERE correo = ? AND passwords = ? AND status = 1";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("ss", $correo, $passwords);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo json_encode($row);
    }

    public function insert_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $capitulo = $_POST['capitulo'];
        $thumbnail = $_POST['avatar'];
        $categoria = $_POST['categoria'];
        $anime = $_POST['anime'];
        $fecha_insercion = $_POST['fechai'];
        $v_status = $_POST['status'];
        $archivo = $_POST['videoprev'];

        $consulta = "INSERT INTO videos (capitulo, thumbnail, categoria, anime, v_status, fecha_insercion) VALUES ('$capitulo', '$thumbnail', '$categoria', '$anime','$v_status', '$fecha_insercion')";
        $this->conexion->query($consulta);
        if($this->conexion->affected_rows>0){
            $array = [
                "status" => "success",
                "text" => "Se editó correctamente"
            ];
            }else{
                $array = [
                    "status" => "error",
                    "text" => "No se pudo insertar el registro"
                ];
            }
            echo json_encode($array);
        }
    
    public function update_data($id)
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $capitulo = $_POST['capitulo'];
        $thumbnail = $_POST['avatar'];
        $categoria = $_POST['categoria'];
        $anime = $_POST['anime'];
        $fecha_insercion = $_POST['fechai'];
        $v_status = $_POST['status'];
        $archivo = $_POST['videoprev'];

        $consulta = "UPDATE videos SET capitulo = ?, thumbnail = ?, categoria = ?, anime = ?, fecha_insercion = ?, v_status = ?, archivo = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("ssssssssi", $capitulo, $thumbnail, $categoria, $anime, $fecha_insercion, $v_status, $archivo, $id);
        $result = $stmt->execute();

        $array = [
            "status" => "success",
            "text" => "Se editó correctamente"
        ];

        if (!$result) {
            $array = [
                "status" => "error",
                "text" => "No se pudo editar el registro"
            ];
        }
        echo json_encode($array);
    }
    
    public function delete_data()
    {
        $datos = $_POST["data"];
        $consulta = "DELETE FROM videos WHERE id IN ($datos)";
        $result = mysqli_query($this->conexion, $consulta);
        $array = [
            "text" => "Se eliminó correctamente",
            "status" => "success",
        ];
        echo json_encode($array);
    }

    public function set_avatar(){
        $upload_dir = "../../../public/";
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = $upload_dir . $_FILES["file"]["name"];
        $response = [
            "status" => "error",
            "text" => "No se pudo cargar"
        ];
        if (move_uploaded_file($tmp_name, $name)) {
            $response = [
                "status" => "success",
                "text" => "Se pudo cargar",
                "file" => $_FILES["file"]["name"]
            ];
        }
        echo json_encode($response);
    }

    public function set_video(){
        $upload_dir = "../../../public/";
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = $upload_dir . $_FILES["file"]["name"];
        $response = [
            "status" => "error",
            "text" => "No se pudo cargar"
        ];
        if (move_uploaded_file($tmp_name, $name)) {
            $response = [
                "status" => "success",
                "text" => "Se pudo cargar",
                "file" => $_FILES["file"]["name"]
            ];
        }
        echo json_encode($response);
    }
}

$modules = new modules();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["funcion"])) {
    switch ($_POST["funcion"]) {
        case 'get_data':
            $modules->get_data();
            break;
        case 'login':
            $modules->login();
            break;
        case 'get_one':
            if (isset($_POST['id'])) {
                $modules->get_one($_POST['id']);
            }
            break;
        case 'insert_data':
            $modules->insert_data();
            break;
        case 'update_data':
            if (isset($_POST['id'])) {
                $modules->update_data($_POST['id']);
            }
            break;
        case 'delete_data':
            $modules->delete_data();
            break;
        case 'set_avatar':
            $modules->set_avatar();
            break;
        case 'set_video':
            $modules->set_video();
            break;
        default:
            echo "Función incompleta";
            break;
    }
}
?>
