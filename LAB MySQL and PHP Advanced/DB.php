<?php


class DB
{
    private static $instance = null;

    private function __construct() {
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DB();
            self::$instance = new PDO("mysql:dbname=php_course_1;host=localhost", 'root', '');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}