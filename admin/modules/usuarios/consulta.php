<?php
class modules extends mysqli
{
    public function __construct($host, $usuario, $pass, $bd)
    {
        parent::__construct($host, $usuario, $pass, $bd);
    }

    public function get_data()
    {
        $consulta = "SELECT u.id, u.nombre, u.correo, u.passwords, ur.rol, rsc.status FROM usuarios u LEFT JOIN rel_rol ur ON u.rol = ur.id LEFT JOIN rel_status rsc ON u.status = rsc.id";
        $result = mysqli::query($consulta);
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
        $result = mysqli::query($consulta);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $array = [
            "id" => $row["id"],
            "nombre" => $row["nombre"],
            "rol" => $row["rol"],
            "status" => $row["status"],
            "correo" => $row["correo"],
            "passwords" => $row["passwords"],
        ];
        echo json_encode($array);
    }

    public function insert_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $passwords = $_POST['passwords'];
        $rol = $_POST['rol'];
        $status = $_POST['status'];

        $consulta = "INSERT IGNORE INTO usuarios (correo, passwords, rol, status, nombre) VALUES ('$correo', '$passwords', '$rol', '$status', '$nombre')";
        $result = mysqli::query($consulta);
        if ($result) {
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
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $passwords = $_POST['passwords'];
        $rol = $_POST['rol'];
        $status = $_POST['status'];
        $id = $_POST['id'];

        $consulta = "UPDATE usuarios set correo = '$correo', passwords = '$passwords', rol = $rol, status = $status, nombre = '$nombre' WHERE id =  $id";
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
}

$modules = new modules("localhost", "root", "", "anime_rocket");

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
            $modules->update_data();
            break;
        case 'delete_data':
            $modules->delete_data();
            break;
        default:
            echo "Función incompleta";
            break;
    }
}
