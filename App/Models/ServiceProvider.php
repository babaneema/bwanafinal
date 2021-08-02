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


class ServiceProvider extends Connection
{
    private $database;
    private array $field;
    private $table_name = 'service_provider';
    private $date;

    public function __construct()
    {

        $this->database = parent::connect();
        $this->field = [
            'provider_id', 'provider_unique', 'provider_name', ' provider_business_type',
            'provider_district', 'provider_email', 'provider_phone_number', 'service_offered',
            'provider_status', 'provider_reg_date'
        ];
        $this->date = new DateTime(null, new DateTimeZone('Africa/Dar_es_Salaam'));
    }

    public function getAllData()
    {
        $data = $this->database->select($this->table_name, $this->field);
        if ($this->database->error) return [];
        return  $data;
    }

    public function getDataWithDistrict()
    {
        $data = $this->database->select(
            $this->table_name,
            ["[><]districts" => ["provider_district" => "id"]],
            [
                'provider_id', 'provider_unique', 'provider_name', ' provider_business_type',
                'provider_district', 'provider_email', 'provider_phone_number', 'service_offered',
                'provider_status', 'provider_reg_date', 'district_name'
            ]
        );
        // if ($this->database->error) return [];
        if ($this->database->error) return $this->database->error;
        return  $data;
    }

    public function singeleProvider($provider_id)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            ['provider_id' => $provider_id]
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

    public function getDatawithAddress($service_id)
    {
        $data = $this->database->select(
            $this->table_name,
            ["[><]districts" => ["provider_district" => "id"]],
            [
                'provider_id', 'provider_name', 'provider_business_type', ' provider_email',
                'provider_phone_number', 'service_offered', 'district_name'
            ],
            ['provider_id' => $service_id]
        );
        // if ($this->database->error) return [];
        if ($this->database->error) return $this->database->error;
        return  $data;
    }

    public function create(array $data)
    {
        $provider_unique = uniqid();
        $this->database->insert($this->table_name, [
            "provider_unique" => $provider_unique,
            "provider_name" => $data['provider_name'],
            "provider_business_type" => $data['provider_business_type'],
            "provider_district" => $data['provider_district'],
            "provider_email" => $data['provider_email'],
            "provider_phone_number" => $data['provider_phone_number'],
            "service_offered" => $data['service_offered'],
            "provider_reg_date" =>  $this->date->format('Y-m-d'),
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
