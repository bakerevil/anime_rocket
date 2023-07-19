<?php
class modules extends mysqli
{
    public function __construct($host, $usuario, $pass, $bd)
    {
        parent::__construct($host, $usuario, $pass, $bd);
    }

    public function get_data()
    {
        $consulta = "SELECT v.id, v.capitulo, v.thumbnail, v.archivo, v.fecha_insercion, v.fecha_publicacion, v.orden, rsc.rv_status, ur.categoria, rsl.titulo FROM videos v LEFT JOIN rv_status rsc ON v.v_status = rsc.rv_id LEFT JOIN rv_categoria ur ON v.categoria = ur.id LEFT JOIN listas rsl ON v.anime = rsl.id";
        $result = mysqli::query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
            "id" => $row["id"],
            "capitulo" => $row["capitulo"],
            "foto" => $row["thumbnail"],
            "video" => $row["archivo"],
            "categoria" => $row["categoria"],
            "anime" => $row["titulo"],
            "fechai" => $row["fecha_insercion"],
            "fechap" => $row["fecha_publicacion"],
            "orden" => $row["orden"],
            "status" => $row["rv_status"],
            ];
        }
        echo json_encode($array);
    }
    public function get_one($id)
    {
        $consulta = "SELECT * FROM videos  WHERE id = $id";
        $result = mysqli::query($consulta);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $array = [
            "id" => $row["id"],
            "capitulo" => $row["capitulo"],
            "foto" => $row["thumbnail"],
            "video" => $row["archivo"],
            "categoria" => $row["categoria"],
            "anime" => $row["anime"],
            "fechai" => $row["fecha_insercion"],
            "fechap" => $row["fecha_publicacion"],
            "status" => $row["v_status"]
        ];
        echo json_encode($array);
    }

    public function insert_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $capitulo = $_POST['capitulo'];
        $thumbnail = $_POST['foto'];
        $archivo = $_POST['video'];
        $categoria = $_POST['categoria'];
        $anime = $_POST['anime'];
        $fecha_insercion = $_POST['fechai'];
        $fecha_publicacion = $_POST['fechap'];
        $v_status = $_POST['status'];

        $consulta = "INSERT INTO videos (capitulo, thumbnail, archivo, categoria, anime, v_status, fecha_insercion, fecha_publicacion) VALUES ('$capitulo', '$thumbnail', '$archivo', '$categoria', '$anime','$v_status', '$fecha_insercion', '$fecha_publicacion')";
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
        $capitulo = $_POST['capitulo'];
        $thumbnail = $_POST['foto'];
        $archivo = $_POST['video'];
        $categoria = $_POST['categoria'];
        $anime = $_POST['anime'];
        $fecha_insercion = $_POST['fechai'];
        $fecha_publicacion = $_POST['fechap'];
        $v_status = $_POST['status'];
        $id = $_POST['id'];

        $consulta = "UPDATE videos set capitulo = '$capitulo', thumbnail = '$thumbnail', archivo = '$archivo', categoria = '$categoria', anime = '$anime', fecha_insercion = '$fecha_insercion', fecha_publicacion = '$fecha_publicacion', v_status = '$v_status' WHERE id =  $id";
        $array = [
            "status" => "success",
            "text" => "Se editó correctamente"
        ];

        if (!mysqli::query($consulta)) {
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
