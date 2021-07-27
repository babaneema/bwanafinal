<?php

namespace App\Models;

include_once '../../vendor/autoload.php';


use App\Models\Connection;


use \Datetime;
use \DateTimeZone;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


class Code extends Connection
{
    private $database;
    private array $field;
    private $table_name = 'verification_codes';
    private $date;

    public function __construct()
    {

        $this->database = parent::connect();
        $this->field = [
            'code_id', 'code_farmer', 'code', ' used',
            'code_type', 'code_reg_date',
        ];
        $this->date = new DateTime(null, new DateTimeZone('Africa/Dar_es_Salaam'));
    }

    public function getAllData()
    {
        $data = $this->database->select($this->table_name, $this->field);
        if ($this->database->error) return [];
        return  $data;
    }

    public function getAllByCode($code)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            [
                'code' => $code
            ]
        );
        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return false;
        return  $data;
    }

    public function getAllByColumn($column, $value)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            [$column => $value]
        );
        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return false;
        return  $data;
    }

    public function codeUsed($code)
    {
        $data = $this->database->has($this->table_name, [
            'code' => $code
        ]);
        if ($this->database->error) return $this->database->errorInfo;
        return  $data;
    }

    public function create(array $data)
    {
        $this->database->insert($this->table_name, [
            "code_farmer" => $data['code_farmer'],
            "code" => $data['code'],
            "code_type" => $data['code_type'],
            "code_reg_date" =>  $this->date->format('Y-m-d'),
        ]);

        if ($this->database->error) return $this->database->errorInfo;
        return  true;
    }

    public function activate($code)
    {
        $this->database->update(
            $this->table_name,
            ["used" => 'yes'],
            ["code" => $code]
        );

        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return false;
        return  true;
    }

    public function update(array $data)
    {
        $this->database->update(
            $this->table_name,
            [
                "crop_name" => $data['crop_name'],
                "crop_type" => $data['crop_type'],
                "crop_measurement" => $data['crop_measurement'],
                "crop_grades" => $data['crop_grades'],
            ],
            [
                "crop_id" => $data['crop_id']
            ]
        );

        if ($this->database->error) return $this->database->errorInfo;
        return  true;
    }

    public function delete($code)
    {
        $this->database->delete(
            $this->table_name,
            ["code" => $code]
        );
        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return false;
        return  true;
    }
}
