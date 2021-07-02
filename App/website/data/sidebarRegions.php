<?php

// namespace App\Models;

require_once '../../vendor/autoload.php';

$address = new \App\Models\Address();

$regionData = $address->getRegionWithDistricts();
// var_dump($regionData);
