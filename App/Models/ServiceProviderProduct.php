<?php

namespace App\Models;

// include_once '../../vendor/autoload.php';


use App\Models\Database;
use App\Models\Connection;

use \Datetime;
use \DateTimeZone;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


class ServiceProviderProduct extends Connection
{
    private $database;
    private array $field;
    private $table_name = 'service_product';
    private $date;

    public function __construct()
    {

        $this->database = parent::connect();
        $this->field = [
            'pro_id', 'pro_unique', 'provider_id', ' pro_name', 'pro_type',
            'prod_district', 'prod_street', 'prod_gps', 'prod_info',
            'prod_images', 'prod_last_update', 'prod_reg_date'
        ];
        $this->date = new DateTime(null, new DateTimeZone('Africa/Dar_es_Salaam'));
    }

    public function getAllData()
    {
        $data = $this->database->select($this->table_name, $this->field);
        if ($this->database->error) return [];
        return  $data;
    }

    public function getDataWithDistrictWithId($provider_id)
    {
        $data = $this->database->select(
            $this->table_name,
            ["[><]districts" => ["prod_district" => "id"]],
            [
                'pro_id', 'pro_unique', 'provider_id', ' pro_name', 'pro_type',
                'prod_district', 'prod_street', 'prod_gps', 'prod_info',
                'prod_images', 'prod_last_update', 'prod_reg_date', 'district_name'
            ],
            ['provider_id' => $provider_id]
        );
        // if ($this->database->error) return [];
        if ($this->database->error) return $this->database->error;
        return  $data;
    }

    public function singeleProvider($pro_id)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            ['pro_id' => $pro_id]
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
        $pro_unique = uniqid();
        $this->database->insert($this->table_name, [
            "pro_unique" => $pro_unique,
            "provider_id" => $data['provider_id'],
            "pro_name" => $data['pro_name'],
            "pro_type" => $data['pro_type'],
            "prod_district" => $data['prod_district'],
            "prod_street" => $data['prod_street'],
            "prod_gps" => $data['prod_gps'],
            "prod_info" => $data['prod_info'],
            "prod_images" => $data['prod_images'],
            "prod_last_update" =>  $this->date->format('Y-m-d H:i:s'),
            "prod_reg_date" =>  $this->date->format('Y-m-d'),
        ]);

        if ($this->database->error) return $this->database->errorInfo;
        return $this->database->id();
    }

    public function activate($provider_id)
    {
        $this->database->update(
            $this->table_name,
            ["provider_status" => 'active'],
            ["provider_id" => $provider_id]
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
