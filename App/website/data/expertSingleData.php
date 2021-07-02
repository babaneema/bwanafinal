<?php

$id = 0;
isset($_GET['agrod_id']) ? $id = $_GET['agrod_id'] : header('Location: index.php');

$agronomists = new \App\Models\Agronomist();
$singleData = $agronomists->singeleAgrodata($id);
$image = '../' . $singleData['agro_picture'];


$add = $address->getDistrictById($singleData['agro_district']);
// var_dump($add['region_name']);
