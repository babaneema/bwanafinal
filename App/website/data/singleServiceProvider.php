<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$id = 0;
isset($_GET['pass_id']) ? $id = $_GET['pass_id'] : header('Location: index.php');



$serviveProviderProduct = new \App\Models\ServiceProviderProduct();
$serviceProvider = new \App\Models\ServiceProvider();

$singleData = $serviveProviderProduct->getAllByColumn('pro_unique', $id);

if (!is_array($singleData))  header('Location: index.php');
$serviceData = $serviceProvider->getDatawithAddress($singleData[0]['provider_id']);

$picha = explode(',', $singleData[0]['prod_images']);
$image1 = '../' . $picha[0];
$image2 = '../' . $picha[1];
$image3 = '../' . $picha[2];
$image4 = '../' . $picha[3];
$image5 = '../' . $picha[4];


$add = $address->getDistrictById($singleData[0]['prod_district']);
// var_dump($serviceData);
