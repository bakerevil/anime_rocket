<?php
class modules extends mysqli
{
    public function __construct()
    {
        $this->conexion = new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_data()
    {
        $consulta = "SELECT * FROM usuarios";
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
                "id" => $row["id"],
                "nombre" => $row["nombre"],
                "rol" => $row["rol"],
                "status" => $row["status"],
                "correo" => $row["correo"],
                "passwords" => $row["passwords"],
            ];
        }
        echo json_encode($array);
    }
    public function get_one($id)
    {
        $consulta = "SELECT * FROM usuarios  WHERE id = $id";
        $result = $this->conexion->query($consulta);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $array = [
            "id" => $row["id"],
            "nombre" => $row["nombre"],
            "rol" => $row["rol"],
            "status" => $row["status"],
            "correo" => $row["correo"],
            "avatar" => $row["avatar"],
            "passwords" => $row["passwords"],
        ];
        echo json_encode($array);
    }
    public function login()
    {
        $correo = $_POST['correo'];
        $passwords = $_POST['passwords'];
        $consulta = "SELECT * FROM usuarios WHERE correo = '$correo' AND passwords = '$passwords' AND status = 1";
        $result = $this->conexion->query($consulta);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo json_encode($row);
    }

    public function insert_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $passwords = $_POST['passwords'];
        $rol = $_POST['rol'];
        $status = $_POST['status'];

        $consulta = "INSERT IGNORE INTO usuarios";
        $result = $this->conexion->query($consulta);
        if ($result) {
            $array = [
                "status" => "success",
                "text" => "Se insertó correctamente"
            ];
        } else {
            $array = [
                "status" => "error",
                "text" => "No se pudo insertar el registro"
            ];
        }
        echo json_encode($array);
    }

    public function update_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $passwords = $_POST['passwords'];
        $rol = $_POST['rol'];
        $status = $_POST['status'];
        $id = $_POST['id'];

        $consulta = "UPDATE * FROM usuarios";
        $array = [
            "status" => "success",
            "text" => "Se editó correctamente"
        ];

        if (!mysqli::query($consulta)) {
            $array = [
                "status" => "error",
                "text" => "No se pudo insertar el registro"
            ];
        }
        echo json_encode($array);
    }
    public function delete_data()
    {
        $datos = $_POST["data"];
        $consulta = "DELETE FROM usuarios WHERE id IN ($datos)";
        mysqli::query($consulta);
        $array = [
            "text" => "Se eliminó correctamente",
            "status" => "success",
        ];
        echo json_encode($array);
    }
    public function set_avatar()
    {
        $upload_dir = "../../../public/";
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = $upload_dir . $_FILES["file"]["name"];
        $response = [
            "status" => "error",
            "text" => "no se pudo cargar"
        ];
        if(move_uploaded_file($tmp_name, $name)){
            $response = [
            "status" => "succes",
            "text" => " se pudo cargar",
            "file"=> $_FILES["file"]["name"]
            ];
        }
        echo json_encode ($response);

    }
  
    }


$modules = new modules("localhost", "root", "", "anime_rocket");

if (isset($_POST)) {
    switch ($_POST["funcion"]) {
        case 'get_data':
            $modules->get_data();
            break;
        case 'login':
            $modules->login();
            break;
        case 'get_one':
            $modules->get_one($_POST['id']);
            break;
        case 'insert_data':
            $modules->insert_data();
            break;
        case 'update_data':
            $modules->update_data();
            break;
        case 'delete_data':
            $modules->delete_data();
            break;
            case 'set_avatar':
                $modules->set_avatar();
                break;
        default:
            echo "Función incompleta";
            break;
    }
}
