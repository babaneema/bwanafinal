<?php

namespace App\Models;

session_start();


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



include_once '../../../vendor/autoload.php';


if (
    isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) &&
    isset($_POST['age_group'])  && isset($_POST['activity']) && isset($_POST['gender']) &&
    isset($_POST['district']) && isset($_POST['phone']) && isset($_POST['password'])
) {
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    // Handle for upload

    $farmer = new Farmer();

    // Variables
    $name = $_POST['fname'] . " " . $_POST['mname'] . " " . $_POST['lname'];
    $age_group = $_POST['age_group'];
    $activity = $_POST['activity'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $phone = $_POST['phone'];



    $passwrd = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $data = array(
        'farmer_name' => $name,
        'farmer_gender' => $gender,
        'farmer_district' => $district,
        'age_group' => $age_group,
        'activities' => $activity,
        'famer_phone' => $phone,
        'farmer_email' => $email,
        'password' => $passwrd,
    );

    $farmer->setData($data);
    $savedData = $farmer->create();

    if (is_array($savedData)) {
        $response['response_status'] = '501';
        $response['error_type'] = $savedData['error_type'];
        $response['code_number'] = $savedData['code_number'];
        $response['message'] = $savedData['message'];

        $erro = strstr($savedData['message'], 'Duplicate');

        $_SESSION['saveFarmerError'] = $erro;
        header('Location: ../register.php');
        exit;
    }

    $_SESSION['saveFarmerSuccess'] = True;
    header('Location: ../index.php');
    exit;
} else {
    $_SESSION['farmerError'] = True;
    header('Location: ../register.php');
    exit;
}
