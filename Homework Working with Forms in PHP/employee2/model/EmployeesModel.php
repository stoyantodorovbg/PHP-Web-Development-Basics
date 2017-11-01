<?php

class EmployeesModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = 'employees';
    }

    public  function readAll($start = 0)
    {
        $query = $this->db->prepare("
        SELECT *
        FROM `".$this->table."`
        LIMIT ".$start.", 20
        ");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


}