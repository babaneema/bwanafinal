<?php

namespace App\Models;

// include_once '../../vendor/autoload.php';

use App\Models\Connection;

use \Datetime;
use \DateTimeZone;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


class Learn extends Connection
{
    private $database;
    private array $field;
    private $table_name = 'learning';
    private $date;

    public function __construct()
    {

        $this->database = parent::connect();
        $this->field = [
            'learn_id', 'learn_unique', 'subject_name', ' crop_id',
            'provider_id', 'video_link', 'picture_link', 'pdf_link',
            'learn_reg_date'
        ];
        $this->date = new DateTime(null, new DateTimeZone('Africa/Dar_es_Salaam'));
    }

    public function getAllData($start = 0, $amout = 12)
    {
        $begin = $start * $amout;
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            ["LIMIT" => [$begin, $amout]]
        );
        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return [];
        return  $data;
    }

    public function count()
    {
        return $this->database->count($this->table_name);
    }

    public function singeleLearn($learn_unique)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            ['learn_unique' => $learn_unique]
        );
        if ($this->database->error) return $this->database->errorInfo;
        return  $data;
    }

    public function getLearnByCrop($crop_id)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            [
                'crop_id' => $crop_id
            ]
        );
        if ($this->database->error) return $this->database->errorInfo;
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
        $learn_unique = uniqid();
        $this->database->insert($this->table_name, [
            "learn_unique" => $learn_unique,
            "subject_name" => $data['subject_name'],
            "crop_id" => $data['crop_id'],
            "provider_id" => $data['provider_id'],
            "video_link" => $data['video_link'],
            "picture_link" => $data['picture_link'],
            "pdf_link" => $data['pdf_link'],
            "learn_reg_date" =>  $this->date->format('Y-m-d'),
        ]);

        if ($this->database->error) return $this->database->errorInfo;
        return $this->database->id();
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
