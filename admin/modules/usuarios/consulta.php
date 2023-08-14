<?php
class modules extends mysqli
{
    public $conexion;

    public function __construct()
    {
        $this->conexion= new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_data()
    {
        $consulta = "SELECT * FROM usuarios";
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
                "id"=> $row["id"],
                "correo"=> $row["correo"],
                "passwords"=> $row["passwords"],
                "rol"=> $row["rol"],
                "nombre"=> $row["nombre"],
                "status"=> $row["status"],
                "avatar"=> $row["avatar"],
             
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
            "id"=> $row["id"],
            "correo"=> $row["correo"],
            "passwords"=> $row["passwords"],
            "rol"=> $row["rol"],
            "nombre"=> $row["nombre"],
            "status"=> $row["status"],
            "avatar"=> $row["avatar"],
                
        ];
        echo json_encode($array);
    }

    public function insert_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $correo= $_POST['correo'];
        $passwords= $_POST['passwords'];
        $rol= $_POST['rol'];
        $nombre= $_POST['nombre'];
        $status= $_POST['status'];
        $avatar= $_POST['avatar'];
        
        

        $consulta = "INSERT INTO usuarios (correo,passwords,rol,nombre ,status, avatar) VALUES ('$correo','$passwords','$rol','$nombre','$status','$avatar')";
        $this->conexion->query($consulta);
        if ($this->conexion->affected_rows>0) {
            $array = [
                "status" => "success",
                "text" => "Se insertó correctamente"
            ];
        }else{
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
        $id= $_POST['id'];
        $correo= $_POST['correo'];
        $passwords= $_POST['passwords'];
        $rol= $_POST['rol'];
        $nombre= $_POST['nombre'];
        $status= $_POST['status'];
        $avatar= $_POST['avatar'];

        
        
        $consulta = "UPDATE usuarios set correo = '$correo', passwords = '$passwords', rol = '$rol', nombre = '$nombre', status = '$status', avatar = '$avatar' WHERE id = '$id'";
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
    public function delete_data()
    {
        $datos = $_POST["data"];
        $consulta = "DELETE FROM usuarios WHERE id IN ($datos)";
        $this->conexion->query($consulta);
        $array = [
            "text" => "Se eliminó correctamente",
            "status" => "success",
        ];
        echo json_encode($array);
    }
}

$modules = new modules();

if (isset($_POST)) {
    switch ($_POST["funcion"]) {
        case 'get_data':
            $modules->get_data();
            break;
        case 'get_one':
            $modules->get_one($_POST['id']);
            break;
        case 'insert_data':
            $modules->insert_data();
            break;
        case 'update_data':
            $modules->update_data($_POST['id']);
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

