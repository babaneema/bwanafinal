<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


$serviceProduct = new \App\Models\ServiceProviderProduct();

$countData = $serviceProduct->count();
$pages = ceil($countData / 10);

if (isset($_GET['dist_id'])) {
    $districtId = $_GET['dist_id'];
    $productData = $serviceProduct->getAllByColumn('prod_district', $districtId);
} elseif (isset($_GET['page'])) {
    $page = $_GET['page'];
    $productData = $serviceProduct->getAllData($page);
} elseif (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    // var_dump($sort);
    $productData = $serviceProduct->getAllByColumn('pro_type', $sort);
} else {
    $productData = $serviceProduct->getAllData();
}

if (!$productData) $productData = [];
// $agroData = $agronomists->getAllData();
// var_dump($productData);
