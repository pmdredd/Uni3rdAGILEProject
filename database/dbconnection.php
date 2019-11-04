<?php

class DbConnection {
    private static $instance = null;
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("sqlite:database/courseworkapp.db");
    }

    public static function getInstance() : DbConnection
    {
        if(!self::$instance)
        {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    public function getConn(): PDO
    {
        return $this->conn;
    }
}
