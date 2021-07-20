<?php

namespace App\Database;


use Medoo\Medoo;
use \PDO;


class Connection
{
    private $conn;

    public function connect()
    {

        // Username: TYGZBRHbma
        // Database name: TYGZBRHbma
        // Password: ZS6g6Rb9wK
        // Server: remotemysql.com
        // Port: 3306

        return $this->conn = new Medoo([
            'type' => 'mysql',
            'host' => 'localhost',
            'database' => 'bwanashamba',
            'username' => 'root',
            'password' => '',
            'error' => PDO::ERRMODE_SILENT,
        ]);
    }
}
