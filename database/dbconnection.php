<?php

class DB {
    private static $instance = null;
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("sqlite:database/courseworkapp.db");
    }

    public static function getInstance() : DB
    {
        if(!self::$instance)
        {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    public function getConn(): PDO
    {
        return $this->conn;
    }
}
