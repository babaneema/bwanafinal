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


class Agronomist extends Connection
{
    private $database;
    private array $field;
    private $table_name = 'agronomist';
    private $date;

    public function __construct()
    {

        $this->database = parent::connect();
        $this->field = [
            'agro_id', 'agro_name', 'agro_birthdate', ' agro_gender', 'agro_district',
            'agro_phone', 'agro_email', 'agro_password', 'agro_education',
            'agro_certificate', 'agro_specialize', 'agro_cv', 'agro_picture',
            'agro_unique', 'agro_red_date',
        ];
        $this->date = new DateTime(null, new DateTimeZone('Africa/Dar_es_Salaam'));
    }

    public function count()
    {
        return $this->database->count($this->table_name);
    }

    public function getAllData($start = 0, $amout = 12)
    {
        $begin = $start * $amout;
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            ["LIMIT" => [$begin, $amout]]
        );
        if ($this->database->error) return [];
        return  $data;
    }

    public function sortAllData($sort)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            ["agro_specialize" => 'Horticulture'],

        );
        if ($this->database->error) return [];
        return  $data;
    }

    public function singeleAgrodata($uniq)
    {
        $data = $this->database->select(
            $this->table_name,
            $this->field,
            [
                'agro_unique' => $uniq
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
            [$column => $value],

        );
        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return false;
        return  $data;
    }


    public function create(array $data)
    {
        $this->database->insert($this->table_name, [
            "agro_name" => $data['agro_name'],
            "agro_birthdate" => $data['agro_birthdate'],
            "agro_gender" => $data['agro_gender'],
            "agro_district" => $data['agro_district'],
            "agro_phone" => $data['agro_phone'],
            "agro_email" => $data['agro_email'],
            "agro_password" => $data['agro_password'],
            "agro_education" => $data['agro_education'],
            "agro_certificate" => $data['agro_certificate'],
            "agro_specialize" => $data['agro_specialize'],
            "agro_cv" => $data['agro_cv'],
            "agro_picture" => $data['agro_picture'],
            "agro_unique" => $data['agro_unique'],
            "agro_red_date" =>  $this->date->format('Y-m-d'),
        ]);

        if ($this->database->error) return $this->database->errorInfo;
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

    public function delete($id)
    {
        $this->database->delete(
            $this->table_name,
            ["agro_id" => $id]
        );
        // if ($this->database->error) return $this->database->errorInfo;
        if ($this->database->error) return false;
        return  true;
    }
}
