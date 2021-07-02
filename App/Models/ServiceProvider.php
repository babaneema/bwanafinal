<?php

namespace App\Models;

// include_once '../../vendor/autoload.php';


use App\Models\Database;


use \Datetime;
use \DateTimeZone;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



class ServiceProvider extends Database
{


    // table properties
    protected array $colums_data;
    protected array $colums_head;
    protected $date;

    private String $table_name = 'service_provider';



    public function __construct()
    {
        $this->colums_data = [
            'id' => '',
            'provider_name' => '',
            'provider_district' => '',
            'provider_email' => '',
            'service_offered' => '',
            'provider_reg_date' => '',
        ];
        $this->colums_head = array_keys($this->colums_data);
        $this->date = new DateTime(null, new DateTimeZone('Africa/Dar_es_Salaam'));
        parent::__construct();
    }

    public function getAllData()
    {
        return parent::superGetAllData($this->table_name);
    }

    public function singeleProvider($id)
    {
        return parent::superGetDataByColumn(table_name: 'service_provider', column: 'id', value: $id);
    }


    public function setData(array $data)
    {
        foreach ($data as $key => $value) $this->colums_data[$key] = $value;
        $this->colums_data['provider_reg_date'] = $this->date->format('Y-m-d');
    }

    public function create()
    {
        // coppy array remove id and create a head and data
        $insert_data = $this->colums_data;
        unset($insert_data['id']);
        $colum_head = array_keys($insert_data);
        $data = array_values($insert_data);

        $save = parent::superCreate(table_name: $this->table_name, colums_in: $colum_head, data: $data);
        return $save;
    }
}
