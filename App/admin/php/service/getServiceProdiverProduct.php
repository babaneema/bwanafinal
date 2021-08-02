<?php

namespace App\Models;



// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$provider_id = $provider_data[0]['provider_id'];

$serviceProviderProduct = new ServiceProviderProduct();
$serviceProductData = $serviceProviderProduct->getDataWithDistrictWithId($provider_id);
if (!$serviceProductData) $serviceProductData = [];

// var_dump($serviceProductData);
