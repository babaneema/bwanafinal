<?php


namespace App\Models;


use PDO;

class Database
{
    protected $host;
    protected $db;
    protected $user;
    protected $pass;
    protected $port;
    protected $charset;

    protected $pdo;
    protected array $error_info;
    protected $error_message;
    protected $error_code;

    public function __construct()
    {
        // Locol host
        $this->host = '127.0.0.1';
        $this->db = 'bwanashamba';
        $this->user  = 'root';
        $this->pass  = '';
        $this->port = "3306";
        $this->charset = 'utf8mb4';


        // Online host
        // $this->host = 'localhost';
        // $this->db = 'id16159611_bwanashamba';
        // $this->user  = 'id16159611_agriedo';
        // $this->pass  = '0^cWv7gE&xuKM$2P';
        // $this->port = "3306";
        // $this->charset = 'utf8mb4';


        // Errors
        $this->error_info = [
            'message' => '',
            'code_number' => '',
            'error_type' => '',
            'http_response_code' => ''
        ];
        $this->connection();
    }

    private function connection()
    {
        $dsn = "mysql:host=$this->host;
                dbname=$this->db;
                charset=$this->charset;
                port=$this->port";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            return true;
        } catch (\PDOException $e) {
            // throw new \PDOException($e->getMessage(), (int)$e->getCode());
            return $this->setErrors(e: $e, error_type: 'Connection Error', http_status_code: 404);
        }
    }

    public function superCreate(array $colums_in, array $data, $table_name)
    {
        $colums = implode(',', $colums_in);
        $place_holders = $this->createPlaceholder($colums_in);

        try {
            $sql = "INSERT INTO $table_name ($colums) VALUES ($place_holders)";
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (\PDOException $e) {
            return $this->setErrors(e: $e, error_type: 'Insert Data Error');
        }
    }

    public function superUpdate($table_name, array $set_colums, $where, array $data, $where_value)
    {
        $set_values = $this->updateSetValues($set_colums);
        $data[] = $where_value;

        try {
            $sql = "UPDATE $table_name SET $set_values WHERE $where=?";
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (\PDOException $e) {
            return $this->setErrors(e: $e, error_type: 'Update Data Error');
        }
    }

    public function superDelete($table_name, $where, $where_value)
    {
        try {
            $sql = "DELETE FROM $table_name WHERE $where = ?";
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute([$where_value]);
            return true;
        } catch (\PDOException $e) {
            return $this->setErrors(e: $e, error_type: 'Delete Data Error');
        }
    }

    public function superGetAllData($table_name)
    {
        try {
            $sql = "SELECT * FROM  $table_name";
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute();
            return $data = $stmt->fetchAll();
        } catch (\PDOException $e) {
            return $this->setErrors(e: $e, error_type: 'Select All Data Error');
        }
    }

    public function superGetDataByColumn($table_name, $column, $value)
    {
        try {
            $sql = "SELECT * FROM  $table_name WHERE $column=?";
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute([$value]);
            return $data = $stmt->fetch();
        } catch (\PDOException $e) {
            return $this->setErrors(e: $e, error_type: 'Select by Column Error');
        }
    }



    public function superSql($sql)
    {
        try {
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute();
            return $data = $stmt->fetchAll();
        } catch (\PDOException $e) {
            return $this->setErrors(e: $e, error_type: 'Select All Data Error');
        }
    }

    public function superSqlWhere($sql, $data)
    {
        try {
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute([$data]);
            return $data = $stmt->fetchAll();
        } catch (\PDOException $e) {
            return $this->setErrors(e: $e, error_type: 'Select With Where Data Error');
        }
    }

    private function setErrors($e, $error_type, $http_status_code = 501)
    {
        $this->error_info['message'] = $e->getMessage();
        $this->error_info['code_number'] = (int)$e->getCode();
        $this->error_info['error_type'] = $error_type;
        $this->error_info['http_response_code'] = $http_status_code;
        return $this->error_info;
    }

    public function pdo()
    {
        return $this->pdo;
    }

    public function check_connection()
    {
        if ($this->pdo) return true;
        return $this->error_info;
    }

    private function createPlaceholder($colums)
    {
        return $placeholder = implode(',', array_map(function ($keys) {
            return '?';
        }, $colums));
    }

    private function updateSetValues($colums)
    {
        return $placeholder = implode(',', array_map(function ($key) {
            return "$key=?";
        }, $colums));
    }
}


// $database = new Database();
// var_dump($database->check_connection());
