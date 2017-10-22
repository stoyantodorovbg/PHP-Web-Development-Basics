<?php


class UpdateEmployeeData
{
    private $dbi = false ;
    private $db;

    /**
     * Employee constructor.
     * @param $first_name
     * @param $middle_name
     * @param $last_name
     */
    public function __construct()
    {
        $this->connectDb();
    }


    public function connectDb()
    {
        $db = new DB();
        $this->dbi = $db->connect();
    }

    //queries

    public function updateData($id, $first_name, $middle_name, $last_name, $department, $position, $pass_id, $native_country_code)
    {
        if ($this->dbi != false) {
            $db = $this->dbi;
            $query = $db->prepare("
            SELECT `last_name`
            FROM `employees`
            WHERE `id` = \"$id\"
            ");
            $query->execute();
            $counter = 0;
            foreach ($query as $i => $iv) {
                $counter++;
            }

            if ($counter > 0) {
            $query1 = $db->prepare("
            UPDATE `employees`
            SET `first_name` = \"$first_name\",
            `middle_name` = \"$middle_name\",
            `last_name` = \"$last_name\",
            `department` = \"$department\",
            `position` = \"$position\",
            `passport_id` = \"$pass_id\",
            `native_country_code` = \"$native_country_code\"
            WHERE `id` = \"$id\"
            ");
                $query1->execute();
                echo "The data for employee with id $id was updated successfully\n";
            }
        } else {
            echo "There isn't connect to DB\n";
        }
    }

    public function updateMail($id, $mail, $type)
    {
        if ($this->dbi != false) {
            $db = $this->dbi;
            $query = $db->prepare("
            SELECT `type`
            FROM `employees_emails`
            WHERE `id` = \"$id\"
            AND `email` = \"$mail\"
            ");
            $query->execute();
            $counter = 0;
            foreach ($query as $i => $iv) {
                $counter++;
            }

            if ($counter > 0) {
                $query1 = $db->prepare("
            UPDATE `employees_emails`
            SET `type` = \"$type\"
            WHERE `id` = \"$id\"
            AND `email` = \"$mail\"
            ");
                $query1->execute();
                echo "The email type for employee with id $id was updated successfully.\n";
            }
        } else {
            echo "There isn't connect to DB\n";
        }
    }

    public function updatePhone($id, $phone, $type)
    {
        if ($this->dbi != false) {
            $db = $this->dbi;
            $query = $db->prepare("
            SELECT `type`
            FROM `employees_phones`
            WHERE `id` = \"$id\"
            AND `phone` = \"$phone\"
            ");
            $query->execute();
            $counter = 0;
            foreach ($query as $i => $iv) {
                $counter++;
            }

            if ($counter > 0) {
                $query1 = $db->prepare("
            UPDATE `employees_phones`
            SET `type` = \"$type\"
            WHERE `id` = \"$id\"
            AND `phone` = \"$phone\"
            ");
                $query1->execute();
                echo "The phone type for employee with id $id was updated successfully.\n";
            }
        } else {
            echo "There isn't connect to DB\n";
        }
    }
}