<?php
class modules extends mysqli
{
    public function __construct($host, $usuario, $pass, $bd)
    {
        parent::__construct($host, $usuario, $pass, $bd);
    }

    public function get_data()
    {
        $consulta = "SELECT * FROM listas";
        $result = mysqli::query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
                "id"=> $row["id"],
                "titulo"=> $row["titulo"],
                "sipnosis"=> $row["sipnosis"],
                "foto"=> $row["thumbnail"],
                "cap"=> $row["capitulos"],
                "fecha"=> $row["fecha_insercion"],
                "voto"=> $row["votos"],
                "año"=> $row["anio"]
            ];
        }
        echo json_encode($array);
    }
    public function get_one($id)
    {
        $consulta = "SELECT * FROM listas  WHERE id = $id";
        $result = mysqli::query($consulta);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $array = [
            "id"=> $row["id"],
                "titulo"=> $row["titulo"],
                "sipnosis"=> $row["sipnosis"],
                "foto"=> $row["thumbnail"],
                "cap"=> $row["capitulos"],
                "fecha"=> $row["fecha_insercion"],
                "voto"=> $row["votos"],
                "año"=> $row["anio"]
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
        if (!mysqli::query($consulta)) {
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
        $titulo = $_POST['titulo'];
        $capitulo = $_POST['cap'];
        $sipnosis = $_POST['sipnosis'];
        $thumbnail = $_POST['thumbnail'];
        $fecha_insercion = $_POST['fecha'];
        $votos = $_POST['votos'];
        $anio = $_POST['año'];
        $id = $_POST['id'];

        $consulta = "UPDATE listas set titulo = '$titulo', capitulo = '$cap', sipnosis = '$sipnosis', thumbnail = '$thumbnail', fecha_insercion = '$fecha', votos = '$votos', anio = '$año' WHERE id =  $id";
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
        $consulta = "DELETE FROM listas WHERE id IN ($datos)";
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
