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
        $titulo = $_POST['titulo'];
        $sipnosis = $_POST['sipnosis'];
        $thumbnail = $_POST['thumbnail'];
        $capitulo = $_POST['cap'];
        $fecha_insercion = $_POST['fecha'];
        $votos = $_POST['votos'];
        $anio = $_POST['año'];

        $consulta = "INSERT INTO listas (titulo, sipnosis, thumbnail, capitulos, fecha_insercion, votos, anio) VALUES ('$titulo', '$sipnosis', '$thumbnail', '$capitulo', '$fecha_insercion','$votos','$anio')";
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
        $titulo = $_POST['titulo'];
        $capitulo = $_POST['cap'];
        $sipnosis = $_POST['sipnosis'];
        $thumbnail = $_POST['thumbnail'];
        $fecha_insercion = $_POST['fecha'];
        $votos = $_POST['votos'];
        $anio = $_POST['año'];
        $id = $_POST['id'];

        $consulta = "UPDATE listas set titulo = '$titulo', capitulos = '$capitulo', sipnosis = '$sipnosis', thumbnail = '$thumbnail', fecha_insercion = '$fecha_insercion', votos = '$votos', anio = '$anio' WHERE id =  $id";
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
            $modules->update_data($_POST['id']);
            break;
        case 'delete_data':
            $modules->delete_data();
            break;
        default:
            echo "Función incompleta";
            break;
    }
}
