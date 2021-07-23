<?php

// namespace App\Models;

if (session_status() === PHP_SESSION_NONE) session_start();


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



include_once '../../../vendor/autoload.php';
include_once '../sms/sendSms.php';

if (
    isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) &&
    isset($_POST['age_group'])  && isset($_POST['activity']) && isset($_POST['gender']) &&
    isset($_POST['district']) && isset($_POST['phone']) && isset($_POST['password'])
) {
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    // Handle for upload

    $farmer = new \App\Models\Farmer();

    // Variables
    $name = $_POST['fname'] . " " . $_POST['mname'] . " " . $_POST['lname'];
    $age_group = $_POST['age_group'];
    $activity = $_POST['activity'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $phone = $_POST['phone'];
    $phone = '255' . substr($phone, 1);



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

    $savedData = $farmer->create($data);

    if (is_array($savedData)) {

        $_SESSION['saveFarmerError'] = $savedData[2];
        header('Location: ../register.php');
        exit;
    }

    $token = substr(uniqid(), -6);

    // verification code
    $verficationCode = new \App\Models\Code();

    while ($verficationCode->codeUsed($token)) {
        $token = substr(uniqid(), -6);
    }

    $farmer_id = $savedData;
    // save token
    $codeData = array(
        'code_farmer' =>  $farmer_id,
        'code' => $token,
        'code_type' => 'registration',
    );

    $codeSave =  $verficationCode->create($codeData);

    if (is_array($codeSave)) {

        $_SESSION['saveFarmerError'] = $codeSave[2];
        header('Location: ../register.php');
        exit;
    }


    $massage = 'Thank you for  registering on Bwanashamba app. Your verification code is : ' . $token;
    $number = $phone;

    if (sendSms(number: $number, massage: $massage)) {
        $_SESSION['farmerContact'] = $phone;
        header('Location: ../verification.php');
        exit;
    } else {
        $_SESSION['saveFarmerError'] = 'Failed to send massage';
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
