<?php

namespace App\Login;

use App\Models\Database;

class Login extends Database
{
    private $key = '';
    public function login($table_name, $colum, $colum_value, $password)
    {
        $success = parent::superGetDataByColumn(table_name: $table_name, column: $colum, value: $colum_value);
        if (array_key_exists('code_number', $success)) return false;

        $this->key = $success['password'];
        return password_verify($password, $success['password']);
        // return $success['password'];
    }

    public function encrypted()
    {
        return $this->key;
    }

    public function reset()
    {
        # code...
    }
}
