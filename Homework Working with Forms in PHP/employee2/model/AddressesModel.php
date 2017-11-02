<?php

class AddressesModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = 'employees';
    }

    public function readEmployeeAddress($employee_id)
    {
        $query = $this->db->prepare("
        SELECT `employee_id`, `address_id`, `town_id`, `address_text`, `town_name`,
        `first_name`, `middle_name`, `last_name`
        FROM `employees`
        JOIN `addresses`
        USING (`address_id`)
        JOIN `towns`
        USING (`town_id`)
        WHERE `employee_id` = \"$employee_id\"
        ");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function editEmployeeData($employee_id, $first_name, $middle_name, $last_name, $town_name, $address_text)
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("
            INSERT INTO `towns`
            (`town_name`)
            VALUES (?)
            ");
            $query->execute([$town_name]);

            $query = $this->db->prepare("
        SELECT LAST_INSERT_ID()
        ");
            $query->execute();
            $town_id_arr = $query->fetchAll(PDO::FETCH_ASSOC);
            $town_id = $town_id_arr[0]['LAST_INSERT_ID()'];

            $query = $this->db->prepare("
            SELECT `address_id`
            FROM `employees`
            WHERE `employee_id` = \"$employee_id\"
            ");
            $query->execute();
            $address_id_arr = $query->fetchAll(PDO::FETCH_ASSOC);
            $address_id = $address_id_arr[0]['address_id'];

            $query = $this->db->prepare("
            UPDATE `addresses`
            SET `address_text` = \"$address_text\", `town_id` = \"$town_id\"
            WHERE `address_id` = \"$address_id\"
            ");
            $query->execute();

            $query = $this->db->prepare("
            UPDATE `employees`
            SET `first_name` = \"$first_name\", `middle_name` = \"$middle_name\", `last_name` = \"$last_name\"
            WHERE `employee_id` =\"$employee_id\"
            ");
            $query->execute();

            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

}