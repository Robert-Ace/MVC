<?php

namespace application\lib;

use PDO;

class Db
{
    private PDO $db;
    public function __construct()
    {
        $config = require 'application/config/db.php';
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->db = new PDO($dsn, $config['user'], $config['password'], $config['opt']);
    }

    private function query(string $sql, $params = []) : bool|\PDOStatement
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(":{$key}", $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function getRow(string $sql, $params = []) : bool|array
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function getColumn(string $sql, $params = []) : mixed
    {
        return $this->query($sql, $params)->fetchColumn();
    }

}