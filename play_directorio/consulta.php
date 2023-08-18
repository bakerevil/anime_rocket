<?php
class modules extends mysqli{
    public $conexion;

    public function __construct(){
        $this->conexion= new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_sipnosis(){
        $id =$_GET['id'];
        $consulta = "SELECT sipnosis FROM listas WHERE id = $id"; 
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row["sipnosis"]; 
        }
        return($array);
    }

    public function get_nombre(){
        $id =$_GET['id'];
        $consulta = "SELECT titulo FROM listas WHERE id = $id"; 
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row["titulo"]; 
        }
        return($array);
    }

    public function get_categoria(){
        $id =$_GET['id'];
        $consulta = "SELECT rc.categoria as categorias FROM listas l JOIN rv_categoria rc ON l.l_categoria = rc.id WHERE l.id = $id";
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row["categorias"]; 
        }
        return($array);
    }

    public function get_tipo(){
        $id =$_GET['id'];
        $consulta = "SELECT rvt.rvt_nombre AS tipos FROM listas l JOIN rvt_tipo rvt ON l.l_tipo = rvt.rvt_id WHERE l.id = $id";
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row["tipos"]; 
        }
        return($array);
    }

    public function get_votos(){
        $id =$_GET['id'];
        $consulta = "SELECT votos FROM listas WHERE id = $id"; 
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row["votos"]; 
        }
        return($array);
    }

}

$modules = new modules();

if (isset($_POST)) {
    switch (isset($_POST["funcion"]) && $_POST["funcion"] ) {
        case 'get_sipnosis':
            $modules->get_sipnosis();
            break;
        case 'get_nombre':
            $modules->get_nombre();
            break;
        case 'get_categoria':
            $modules->get_categoria();
            break;
        case 'get_tipo':
            $modules->get_tipo();
            break;
        case 'get_votos':
            $modules->get_votos();
            break;        
    }
}
