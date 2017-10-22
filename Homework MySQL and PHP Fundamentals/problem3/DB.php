<?php


class DB extends PDO
{
    private $db_host = 'localhost';
    private $db_name = 'geography';
    private $db_user = 'root';
    private $db_password = '';
    private $db = false;



    public function __construct() {
        parent::__construct("mysql:dbname=".$this->db_name.";host=".$this->db_host, $this->db_user, $this->db_password);
    }

    public function setErrorException() {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function connect() {
        $this->setErrorException();
        return $this;
    }
}