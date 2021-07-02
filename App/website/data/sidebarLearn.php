<?php

// namespace App\Models;

require_once '../../vendor/autoload.php';

$crop = new \App\Models\Crop();

$cropedData = $crop->getDataByCropType();
// var_dump($cropedData);
// die();
