<?php

// namespace App\Models;

if (session_status() === PHP_SESSION_NONE) session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include_once '../../../../vendor/autoload.php';

if (
    isset($_POST['name']) && isset($_POST['business_type']) && isset($_POST['service_type']) &&
    isset($_POST['phone'])  && isset($_POST['email']) && isset($_POST['district'])
) {
    // Handle for upload

    $serviceProviver = new \App\Models\ServiceProvider();

    // Variables
    $name = $_POST['name'];
    $business_type = $_POST['business_type'];
    $service_type = $_POST['service_type'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $district = $_POST['district'];


    $data = array(
        'provider_name' => $name,
        'provider_business_type' => $business_type,
        'provider_district' => $district,
        'provider_email' => $email,
        'provider_phone_number' => $phone,
        'service_offered' => $service_type
    );

    $savedData = $serviceProviver->create($data);

    if (is_array($savedData)) {

        $_SESSION['saveServiceProviderError'] = $savedData[2];
        header('Location: ../../addServiceProvider.php');
        exit;
    }

    $_SESSION['successServiceProvider'] = True;
    header('Location: ../../../serviceprovider.php');
    exit;
} else {
    $_SESSION['serviceProvider'] = True;
    header('Location: ../../addServiceProvider.php');
    exit;
}
