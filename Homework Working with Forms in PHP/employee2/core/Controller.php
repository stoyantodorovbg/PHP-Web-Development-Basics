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
        include 'view/' . $file_name;
    }

}