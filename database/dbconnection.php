<?php

class DbConnection {
    private $pdo;
 
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new PDO("sqlite:database/courseworkapp.db");
        }
        return $this->pdo;
    }
}
