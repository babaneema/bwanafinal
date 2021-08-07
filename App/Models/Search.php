<?php

namespace App\Models;

// include_once '../../vendor/autoload.php';


use App\Models\Connection;


use \Datetime;
use \DateTimeZone;

class Search extends Connection
{
    public function __construct()
    {
        $this->database = parent::connect();
    }
    public function searchAgronist($search)
    {
        $data = $this->database->select(
            "agronomist",
            "*",
            [
                "agro_name[~]" => [$search]
            ]
        );
        return $data;
    }

    public function searchLearn($search)
    {
        $data = $this->database->select(
            "learning",
            "*",
            [
                "subject_name[~]" => [$search]
            ]
        );
        return $data;
    }

    public function searchService($search)
    {
        $data = $this->database->select(
            "service_product",
            "*",
            [
                "pro_name[~]" => [$search]
            ]
        );
        return $data;
    }
}
