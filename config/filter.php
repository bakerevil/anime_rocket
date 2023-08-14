<?php
class filter extends mysqli
{
    public function __construct($host, $user, $pass, $db)
    {
        parent::__construct($host, $user, $pass, $db);
    }

    private function escape($value)
    {
        return $this->real_escape_string($value);
    }

    private function buildConditions($select, $columns)
    {
        $escapedSelect = $this->escape($select);
        $conditions = [];

        foreach ($columns as $column) {
            $escapedColumn = $this->escape($column);
            $conditions[] = "$escapedColumn LIKE '%$escapedSelect%'";
        }

        return implode(" OR ", $conditions);
    }

    public function get_listas($select = "", $tipo = "", $status = "", $categoria = "")
    {
        $consulta = "SELECT s.id, s.titulo, s.thumbnail, s.sipnosis, s.capitulos, s.fecha_insercion, s.votos, s.anio, s.l_tipo as rvt_nombre, s.l_categoria as categoria, c.status FROM listas s LEFT JOIN status c ON s.l_status = c.id ";

        $whereConditions = [];

        if (!empty($select)) {
            $whereConditions[] = $this->buildConditions($select, ['s.l_tipo', 's.l_categoria', 'c.status']);
        }

        if (!empty($tipo)) {
            $whereConditions[] = $this->buildConditions($tipo, ['s.l_tipo']);
        }

        if (!empty($status)) {
            $whereConditions[] = $this->buildConditions($status, ['c.status']);
        }

        if (!empty($categoria)) {
            $whereConditions[] = $this->buildConditions($categoria, ['s.l_categoria']);
        }

        if (!empty($whereConditions)) {
            $consulta .= "WHERE " . implode(" AND ", $whereConditions);
        }

        $query = $this->query($consulta);
        return $query;
    }


    public function get_tipo($select = "")
    {
        $consulta = "SELECT * FROM rvt_tipo ";

        if (!empty($select)) {
            $where = $this->buildConditions($select, ['rvt_nombre']);
            $consulta .= "WHERE $where";
        }

        $query = $this->query($consulta);
        return $query;
    }

    public function get_status($select = "")
    {
        $consulta = "SELECT * FROM status ";

        if (!empty($select)) {
            $where = $this->buildConditions($select, ['status']);
            $consulta .= "WHERE $where";
        }

        $query = $this->query($consulta);
        return $query;
    }

    public function get_categoria($select = "")
    {
        $consulta = "SELECT * FROM rv_categoria ";

        if (!empty($select)) {
            $where = $this->buildConditions($select, ['categoria']);
            $consulta .= "WHERE $where";
        }

        $query = $this->query($consulta);
        return $query;
    }
}