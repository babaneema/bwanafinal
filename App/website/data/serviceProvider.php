<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


$serviceProduct = new \App\Models\ServiceProviderProduct();

if (isset($_GET['dist_id'])) {
    $districtId = $_GET['dist_id'];
    $productData = $serviceProduct->getAllByColumn('prod_district', $districtId);
} else {
    $productData = $serviceProduct->getAllData();
}

if (!$productData) $productData = [];
// $agroData = $agronomists->getAllData();
// var_dump($productData);
