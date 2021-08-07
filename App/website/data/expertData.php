<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$agronomists = new \App\Models\Agronomist();

$countData = $agronomists->count();
$pages = ceil($countData / 10);

// sorting agromist

if (isset($_GET['dist_id'])) {
    $districtId = $_GET['dist_id'];
    $agroData = $agronomists->getAllByColumn('agro_district', $districtId);
} elseif (isset($_GET['page'])) {
    $page = $_GET['page'];
    $agroData = $agronomists->getAllData($page);
} elseif (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    // var_dump($sort);
    $agroData = $agronomists->getAllByColumn('agro_specialize', $sort);
} else {
    $agroData = $agronomists->getAllData();
}

if (!$agroData) $agroData = [];
// $agroData = $agronomists->getAllData();
// var_dump($agroData);
