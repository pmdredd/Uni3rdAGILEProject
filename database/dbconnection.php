<?php

class DB {
    private static $instance = null;
    private static $pdo;

    public function __construct()
    {
        self::$pdo = new PDO("sqlite:".$_SERVER['DOCUMENT_ROOT']."/database/courseworkapp.db");
    }

    public static function getInstance() : DB
    {
        if(!self::$instance)
        {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public static function run($sql, $params = NULL)
    {
        self::getInstance();
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
