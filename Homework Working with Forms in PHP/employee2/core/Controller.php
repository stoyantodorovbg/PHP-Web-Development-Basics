<?php

abstract class Controller
{

    protected $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    abstract public function main();

    public function loadView($file_name, $params = null)
    {
        if (file_exists($file_name)) {
            include 'view/'.$file_name;
        } else {
            throw new Exception('View not found!'.$file_name);
        }
    }

}