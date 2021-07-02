<?php

namespace App\Models;

include_once '../../vendor/autoload.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



$service = new ServiceProvider();
$serviceData = $service->getAllData();
if (!$serviceData) $serviceData = [];

// var_dump($cropData);
