<?php
class modules extends mysqli
{
    public function __construct($host, $usuario, $pass, $bd)
    {
        parent::__construct($host, $usuario, $pass, $bd);
    }

    public function get_data()
    {
        $consulta = "SELECT v.id, v.capitulo, v.thumbnail, v.thumbnail, v.fecha_insercion, v.fecha_publicacion, v.orden, rsc.rv_status, ur.categoria, rsl.titulo FROM videos v LEFT JOIN rv_status rsc ON v.v_status = rsc.rv_id LEFT JOIN rv_categoria ur ON v.categoria = ur.id LEFT JOIN listas rsl ON v.anime = rsl.id";
        $result = mysqli::query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
            "id" => $row["id"],
            "capitulo" => $row["capitulo"],
            "foto" => $row["thumbnail"],
            "video" => $row["thumbnail"],
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
            "orden" => $row["orden"],
            "status" => $row["v_status"],
        ];
        echo json_encode($array);
    }

    public function insert_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $capitulo = $_POST['capitulo'];
        $thumbnail = $_POST['thumbnail'];
        $archivo = $_POST['archivo'];
        $categoria = $_POST['categoria'];
        $anime = $_POST['anime'];
        $fecha_insercion = $_POST['fecha_insertada'];
        $fecha_publicacion = $_POST['fecha_publicacion'];
        $orden = $_POST['orden'];
        $status = $_POST['v_status'];

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
        $capitulo = $_POST['capitulo'];
        $thumbnail = $_POST['thumbnail'];
        $archivo = $_POST['thumbnail'];
        $categoria = $_POST['categoria'];
        $anime = $_POST['anime'];
        $fecha_insercion = $_POST['fecha_insertada'];
        $fecha_publicacion = $_POST['fecha_publicacion'];
        $orden = $_POST['orden'];
        $status = $_POST['v_status'];
        $id = $_POST['id'];

        $consulta = "UPDATE videos set capitulo = '$capitulo', thumbnail = '$thumbnail', archivo = '$archivo', categoria = '$categoria', anime = '$anime', fecha_insercion = '$fecha_insercion, fecha_publicacion = '$fecha_publicacion', orden = '$orden', status = $status WHERE id =  $id";
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
