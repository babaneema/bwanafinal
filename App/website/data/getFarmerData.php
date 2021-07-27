<?php

namespace App\Models;

if (session_status() === PHP_SESSION_NONE) session_start();

// include_once '../../../vendor/autoload.php';

$database = new Database();

$farmer_data = [];
$agronomy = false;

if (isset($_SESSION['user'])) {
    $password = $_SESSION['user'];
    $farmer_data = $database->superGetDataByColumn(table_name: 'farmer', column: 'password', value: $password);
}

if (isset($_SESSION['expert'])) {
    $password = $_SESSION['expert'];
    $agronomy = true;
    $farmer_data = $database->superGetDataByColumn(table_name: 'agronomist', column: 'agro_password', value: $password);
}
// var_dump($farmer_data);
