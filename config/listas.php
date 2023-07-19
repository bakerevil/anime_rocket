<?php
class listas extends mysqli
{
    public function _construct($host, $user, $pass, $db)
    {
        parent ::__construct($host, $user, $pass, $db);
    }

    public function get_listas($texto = ""){
        $consulta = "SELECT s.id, s.titulo, s.thumbnail, s.capitulos, s.fecha_insercion, s.votos, s.anio, s.l_tipo, s.l_categoria, c.rv_status FROM listas s LEFT JOIN rv_status c ON s.l_status = c.rv_id ";
        if($texto != ""){
            $where = $this->search($texto);
            $consulta = $consulta . $where;
        }

        $query=$this->query($consulta);
        return $query;
    }
    public function search($texto){
        $where = "WHERE titulo like '%$texto%'";
        return $where;
    }
}