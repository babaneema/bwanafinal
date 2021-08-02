<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


$agronomists = new \App\Models\Agronomist();

if (isset($_GET['dist_id'])) {
    $districtId = $_GET['dist_id'];
    $agroData = $agronomists->getAllByColumn('agro_district', $districtId);
} else {
    $agroData = $agronomists->getAllData();
}

if (!$agroData) $agroData = [];
// $agroData = $agronomists->getAllData();
// var_dump($agroData);
