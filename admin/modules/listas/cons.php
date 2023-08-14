<?php
class modules extends mysqli{
    public $conexion;

    public function __construct(){
        $this->conexion= new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_data(){
        $consulta = "SELECT * FROM listas";
        $result = $this->conexion->query($consulta);
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
    public function get_one($id){
        $consulta = "SELECT * FROM listas  WHERE id = $id";
        $result = $this->conexion->query($consulta);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $array = [
            "id"=> $row["id"],
            "titulo"=> $row["titulo"],
            "cap"=> $row["capitulos"],
            "sipnosis"=> $row["sipnosis"],
            "foto"=> $row["thumbnail"],
            "voto"=> $row["votos"],
            "fecha"=> $row["fecha_insercion"],
            "año"=> $row["anio"],
        ];
        echo json_encode($array);
    }

    public function insert_data(){
        mysqli_report(MYSQLI_REPORT_OFF);
        $titulo = $_POST['titulo'];
        $sipnosis = $_POST['sipnosis'];
        $thumbnail = $_POST['avatar'];
        $capitulos = $_POST['cap'];
        $fecha_insercion = $_POST['fecha'];
        $votos = $_POST['votos'];
        $anio = $_POST['año'];

        $consulta = "INSERT INTO listas (titulo, sipnosis, thumbnail, capitulos, fecha_insercion, votos, anio) VALUES ('$titulo', '$sipnosis', '$thumbnail', '$capitulos', '$fecha_insercion','$votos','$anio')";
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
    
    public function update_data(){
        mysqli_report(MYSQLI_REPORT_OFF);
        $titulo = $_POST['titulo'];
        $capitulo = $_POST['cap'];
        $sipnosis = $_POST['sipnosis'];
        $thumbnail = $_POST['avatar'];
        $fecha_insercion = $_POST['fecha'];
        $votos = $_POST['votos'];
        $anio = $_POST['año'];
        $id = $_POST['id'];
        
        $consulta = "UPDATE listas set titulo = '$titulo', sipnosis = '$sipnosis', capitulos = '$capitulo', thumbnail = '$thumbnail', fecha_insercion = '$fecha_insercion', votos = '$votos', anio = '$anio' WHERE id =  $id";
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
    public function delete_data(){
        $datos = $_POST["data"];
        $consulta = "DELETE FROM listas WHERE id IN ($datos)";
        $this->conexion->query($consulta);
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
