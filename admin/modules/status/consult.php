<?php
class modules extends mysqli
{
    public function __construct($host, $usuario, $pass, $bd)
    {
        parent::__construct($host, $usuario, $pass, $bd);
    }

    public function get_data()
    {
        $consulta = "SELECT * FROM rv_status";
        $result = mysqli::query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
                "id"=> $row["rv_id"],
                "statusdelvideo"=> $row["rv_status"],
            ];
        }
        echo json_encode($array);
    }
    public function get_one($id)
    {
        $consulta = "SELECT * FROM rv_status  WHERE id = $id";
        $result = mysqli::query($consulta);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $array = [
            "id"=> $row["rv_id"],
                "statusdelvideo"=> $row["rv_status"],
        ];
        echo json_encode($array);
    }

    public function insert_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $rv_id = $_POST['id'];
        $rv_status = $_POST['statusdelvideo'];

        $consulta = "INSERT INTO rv_status (rv_id, rv_status) VALUES ('$rv_id', '$rv_status')";
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
        $rv_id = $_POST['id'];
        $rv_status = $_POST['statusdelvideo'];
       

        $consulta = "UPDATE rv_status set  rv_status = '$rv_status' WHERE id =  $rv_id";
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
        $consulta = "DELETE FROM rv_status WHERE rv_id IN ($datos)";
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
