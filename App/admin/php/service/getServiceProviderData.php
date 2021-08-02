<?php

namespace App\Models;



// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



$serviceProvider = new ServiceProvider();
$serviceData = $serviceProvider->getDataWithDistrict();
if (!$serviceData) $serviceData = [];

// var_dump($cropData);
