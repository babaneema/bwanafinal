<?php

namespace App\Models;

session_start();

include_once '../../../vendor/autoload.php';

$database = new Database();

$farmer_data = [];

if (isset($_SESSION['user'])) {
    $password = $_SESSION['user'];
    $farmer_data = $database->superGetDataByColumn(table_name: 'farmer', column: 'password', value: $password);
}
// var_dump($farmer_data);
