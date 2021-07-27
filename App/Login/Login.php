<?php

namespace App\Login;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use App\Models\Connection;

class Login extends Connection
{
    private $database;
    private $table_name = '';
    private $column = '';
    private $value = '';
    private $key = '';

    public function __construct()
    {
        $this->database = parent::connect();
    }

    public function login($table_name, $column, $value, $password, $status = 'farmer_status', $pass = 'password')
    {
        $this->table_name = $table_name;
        $this->column = $column;
        $this->value = $value;

        $data = $this->getAllByColumn();
        if (is_array($data)) {
            $active = $data[0][$status] == 'active' ? true : false;
            $ver = password_verify($password, $data[0][$pass]);
            if ($ver && $active) {
                $this->key = $data[0][$pass];
                return true;
            }
            return false;
        } else return false;
    }

    public function getAllByColumn()
    {
        $data = $this->database->select(
            $this->table_name,
            '*',
            [
                $this->column => $this->value
            ]
        );
        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return false;
        return  $data;
    }

    public function encryptedKey()
    {
        return $this->key;
    }
}
