<?php

namespace App\Models;

// include_once '../../vendor/autoload.php';


use App\Models\Database;


use \Datetime;
use \DateTimeZone;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



class Address extends Database
{

    public function getAllRegions()
    {
        return parent::superGetAllData('regions');
    }

    public function geAlltDistricts()
    {
        return parent::superGetAllData('districts');
    }

    public function geDistrictsByRegion($rigion_id)
    {
        $sql = "SELECT * FROM  districts  WHERE region_id=?";
        return parent::superSqlWhere($sql, $rigion_id);
    }

    public function getRegionWithDistricts()
    {
        $result = [];
        $data = $this->getAllRegions();
        foreach ($data as $dt) {
            $sql = "SELECT * FROM  districts  WHERE region_id=?";
            $distData = parent::superSqlWhere($sql, $dt['id']);
            $dt['districts'] = $distData;
            array_push($result, $dt);
        }
        return $result;
        // var_dump($result);
    }

    public function getDistrictById($id)
    {
        $sql = "SELECT * FROM  districts  WHERE id=?";
        $district = parent::superSqlWhere($sql, $id);
        $sql1 = "SELECT * FROM  regions  WHERE id=?";
        $region = parent::superSqlWhere($sql1, $district[0]['region_id']);
        return array_merge($district[0], $region[0]);
    }
}

// s
