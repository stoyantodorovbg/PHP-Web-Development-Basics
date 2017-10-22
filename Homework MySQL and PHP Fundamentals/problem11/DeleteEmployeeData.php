<?php


class DeleteEmployeeData
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

    public function deleteEmployee($first_name, $middle_name, $last_name)
    {
        if ($this->dbi != false) {
            $db = $this->dbi;
            $query1 = $db->prepare("
            SELECT *
            FROM `employees`
            WHERE `first_name` = \"$first_name\"
            AND `middle_name` = \"$middle_name\"
            AND `last_name` = \"$last_name\"
            ");
            $query1->execute();
            $count = 0;
            foreach ($query1 as $i => $iv) {
                $count++;
            }
            if ($count > 0) {
                $query2 = $db->prepare("
            DELETE FROM `employees`
            WHERE `first_name` = \"$first_name\"
            AND `middle_name` = \"$middle_name\"
            AND `last_name` = \"$last_name\"
            ");
                $query2->execute();
                echo $count." employees was removed.\n";
            } else {
                echo  "There isn't employees with such names\n";
            }
        } else {
            echo "There isn't connect to DB\n";
        }
    }
}