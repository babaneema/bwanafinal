<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$id = 0;
isset($_GET['agrod_id']) ? $id = $_GET['agrod_id'] : header('Location: index.php');



$agronomists = new \App\Models\Agronomist();
$singleData = $agronomists->singeleAgrodata($id);

if (!is_array($singleData))  header('Location: index.php');

$image = '../' . $singleData[0]['agro_picture'];


$add = $address->getDistrictById($singleData[0]['agro_district']);
// var_dump($singleData);
