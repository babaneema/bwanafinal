<?php


namespace App\Models;

if (session_status() === PHP_SESSION_NONE) session_start();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$data = '';

$database = new Database();


if (isset($_SESSION['expert'])) {
    $password = $_SESSION['expert'];
    $agronomy = true;
    $data = $database->superGetDataByColumn(table_name: 'agronomist', column: 'agro_password', value: $password);
    $image = '../' . $data['agro_picture'];
    $pdf = '../' . $data['agro_cv'];
} else {
    header('Location: ../website/index.php');
    exit;
}
