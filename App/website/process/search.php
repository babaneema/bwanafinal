<?php

use App\Models\Search;

include_once '../../../vendor/autoload.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_POST['search'])) {
    $searchInput = $_POST['search'];
    $searchClass = new Search();
    // $agromistData = $searchClass->searchAgronist($searchInput);
    if (!empty($agromistData = $searchClass->searchAgronist($searchInput))) {
        // Agrononist
        $_SESSION['agroSearch'] = $agromistData;
        header('Location: ../agromistSearch.php');
        exit;
    } elseif ($learnData = $searchClass->searchLearn($searchInput)) {
        // learn
        $_SESSION['learnSearch'] = $learnData;
        header('Location: ../learnSearch.php');
        exit;
    } elseif ($serviceData = $searchClass->searchService($searchInput)) {
        // service
        $_SESSION['serviceSearch'] = $serviceData;
        header('Location: ../serviceSearch.php');
        exit;
    } else {
        // No data
        die('Fuck Wait');
    }
} else {
    header('Location: ../index.php');
    exit;
}
