<?php


class Employee
{
    private $first_name;
    private $middle_name;
    private $last_name;
    private $department;
    private $position;
    private $pass;
    private $dbi = false ;
    private $db;

    /**
     * Employee constructor.
     * @param $first_name
     * @param $middle_name
     * @param $last_name
     * @param $department
     * @param $position
     * @param $pass
     */
    public function __construct($first_name, $middle_name, $last_name, $department, $position, $pass)
    {
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->department = $department;
        $this->position = $position;
        $this->pass = $pass;
        $this->connectDb();
    }

    public function connectDb()
    {
        $db = new DB();
        $this->dbi = $db->connect();
    }

    public function insertEmployee()
    {
        if ($this->dbi != false) {
            $db = $this->dbi;
            $query = $db->prepare("
        INSERT INTO `employees`
        (`first_name`, `middle_name`, `last_name`, `department`, `position`, `passport_id`)
        VALUES (?, ?, ?, ?, ?, ?)
        ");
            $query->execute([$this->first_name, $this->middle_name, $this->last_name, $this->department, $this->position, $this->pass]);

            return "New employee $this->first_name $this->middle_name $this->last_name saved.\n";
        } else {
            return "There isn't connect to DB";
        }

    }
}