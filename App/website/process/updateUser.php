<?php

// namespace App\Models;

if (session_status() === PHP_SESSION_NONE) session_start();


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



include_once '../../../vendor/autoload.php';
include_once '../sms/sendSms.php';

if (
    isset($_POST['name'])  && isset($_POST['age_group'])  && isset($_POST['activity']) &&
    isset($_POST['gender']) && isset($_POST['district']) &&
    isset($_POST['phone']) && isset($_POST['password'])
) {
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    // Handle for upload

    $farmer = new \App\Models\Farmer();

    // Variables
    $name = $_POST['name'];
    $age_group = $_POST['age_group'];
    $activity = $_POST['activity'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $phone = $_POST['phone'];
    // $phone = '255' . substr($phone, 1);

    if (!isset($_SESSION['user'])) {
        header('Location: ../index.php');
        exit;
    }

    $past_password = $_SESSION['user'];

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
        'pastPassword' => $past_password
    );

    $savedData = $farmer->update($data);

    if (is_array($savedData)) {

        $_SESSION['updateFarmerError'] = $savedData[2];
        header('Location: ../updateUser.php');
        exit;
    }

    $_SESSION['updateFarmerSuccess'] = True;
    header('Location: ../account.php');
    exit;
} else {
    $_SESSION['updateError'] = True;
    header('Location: ../updateUser.php');
    exit;
}
