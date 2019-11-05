<?php

class DB {
    private static $instance = null;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("sqlite:database/courseworkapp.db");
    }

    public static function getInstance() : DB
    {
        if(!self::$instance)
        {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function run($sql, $params = NULL)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
