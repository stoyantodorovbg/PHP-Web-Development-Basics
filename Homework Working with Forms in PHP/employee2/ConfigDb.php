<?php
class ConfigDB
{
    private $db;

    /**
     * ConfigDB constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
    $this->db = new PDO("mysql:dbname=soft_uni;host=localhost", 'root', '');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }



}
