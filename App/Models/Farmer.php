<?php

namespace App\Models;

include_once '../../vendor/autoload.php';


use App\Models\Connection;


use \Datetime;
use \DateTimeZone;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


class Farmer extends Connection
{
    private $database;
    private array $field;
    private $table_name = 'farmer';
    private $date;

    public function __construct()
    {

        $this->database = parent::connect();
        $this->field = [
            'farmer_id', 'farmer_name', 'farmer_gender', ' farmer_district',
            'age_group', 'activities', 'famer_phone', 'farmer_email',
            'password', 'farmer_status', 'farmer_reg_date'
        ];
        $this->date = new DateTime(null, new DateTimeZone('Africa/Dar_es_Salaam'));
    }

    public function getAllData()
    {
        $data = $this->database->select($this->table_name, $this->field);
        if ($this->database->error) return [];
        return  $data;
    }

    public function getAllById($farmer_id)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            [
                'farmer_id' => $farmer_id
            ]
        );
        if ($this->database->error) return $this->database->errorInfo;
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

    public function create(array $data)
    {
        $this->database->insert($this->table_name, [
            "farmer_name" => $data['farmer_name'],
            "farmer_gender" => $data['farmer_gender'],
            "farmer_district" => $data['farmer_district'],
            "age_group" => $data['age_group'],
            "activities" => $data['activities'],
            "famer_phone" => $data['famer_phone'],
            "farmer_email" => $data['farmer_email'],
            "password" => $data['password'],
            "farmer_reg_date" =>  $this->date->format('Y-m-d'),
        ]);

        if ($this->database->error) return $this->database->errorInfo;
        return $this->database->id();
    }

    public function activate($farmer_id)
    {
        $this->database->update(
            $this->table_name,
            ["farmer_status" => 'active'],
            ["farmer_id" => $farmer_id]
        );

        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return false;
        return  true;
    }

    public function changePassword($farmer_id, $password)
    {
        $this->database->update(
            $this->table_name,
            ["password" => $password],
            ["farmer_id" => $farmer_id]
        );

        if ($this->database->error) return $this->database->errorInfo;
        // if ($this->database->error) return false;
        return  true;
    }

    public function update(array $data)
    {
        $this->database->update(
            $this->table_name,
            [
                "farmer_name" => $data['farmer_name'],
                "farmer_gender" => $data['farmer_gender'],
                "farmer_district" => $data['farmer_district'],
                "age_group" => $data['age_group'],
                "activities" => $data['activities'],
                "famer_phone" => $data['famer_phone'],
                "farmer_email" => $data['farmer_email'],
                "password" => $data['password'],
            ],
            [
                "password" => $data['pastPassword']
            ]
        );

        if ($this->database->error) return $this->database->errorInfo;
        // if ($this->database->error) return false;
        return  true;
    }
}
