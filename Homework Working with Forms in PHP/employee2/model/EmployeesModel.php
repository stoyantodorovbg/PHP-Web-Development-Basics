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
        JOIN `departments` 
        USING (`manager_id`)
        JOIN `addresses`
        USING (`address_id`)
        JOIN `towns`
        USING (`town_id`)
        LIMIT ".$start.", 20
        ");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function readEmployeeProject($employee_id)
    {
        $query = $this->db->prepare("
        SELECT `employees_projects`.`project_id`, `name`, `description`, `start_date`, `end_date` 
        FROM `employees_projects`, `projects`
        WHERE `employee_id` = \"$employee_id\"
        AND `employees_projects`.`project_id` = `projects`.`project_id`
        ");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public function addProject($employee_id, $name, $description, $start_date, $and_date)
    {
        try {
            $this->db->beginTransaction();
            $query = $this->db->prepare("
        INSERT INTO `projects`
        (`name`, `description`, `start_date`, `end_date`)
        VALUES (?, ?, ?, ?)
        ");
            $query->execute([$name, $description, $start_date, $and_date]);

            $query = $this->db->prepare("
        SELECT LAST_INSERT_ID()
        ");
            $query->execute();
            $project_id_arr = $query->fetchAll(PDO::FETCH_ASSOC);

            $query = $this->db->prepare("
        INSERT INTO `employees_projects`
        (`employee_id`, `project_id`)
        VALUES (?, ?)
        ");
            $query->execute([$employee_id, $project_id_arr[0]['LAST_INSERT_ID()']]);
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }




}