<?php

if (session_status() === PHP_SESSION_NONE) session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include_once '../../../vendor/autoload.php';
include_once '../sms/sendSms.php';


if (isset($_POST['phone'])) {

    // Handle for upload

    $verficationCode = new \App\Models\Code();

    $phone = $_POST['phone'];
    $phone = '255' . substr($phone, 1);

    $token = substr(uniqid(), -6);

    // verification code
    $verficationCode = new \App\Models\Code();

    while ($verficationCode->codeUsed($token)) {
        $token = substr(uniqid(), -6);
    }


    // get farmer data
    $farmer = new \App\Models\Farmer();
    $farmerData = $farmer->getAllByColumn(column: 'famer_phone', value: $phone);
    if (is_array($farmerData)) {
        $codeData = array(
            'code_farmer' =>  $farmerData[0]['farmer_id'],
            'code' => $token,
            'code_type' => 'reset',
        );

        $codeSave =  $verficationCode->create($codeData);

        if (is_array($codeSave)) {

            $_SESSION['saveFarmerError'] = $codeSave[2];
            header('Location: ../forgetPassword.php');
            exit;
        }

        $massage = 'You have request password rest. Your verification code is : ' . $token;
        $number = $phone;

        if (sendSms(number: $number, massage: $massage)) {
            $_SESSION['farmerContactRest'] = $phone;
            header('Location: ../verification.php');
            exit;
        } else {
            $_SESSION['resetPasswordVerfication'] = 'Failed to send massage';
            header('Location: ../forgetPassword.php');
            exit;
        }
    } else {
        $_SESSION['resetPasswordVerfication'] = 'Phone number is not ';
        header('Location: ../forgetPassword.php');
        exit;
    }
} else {
    $_SESSION['resetPasswordVerfication'] = 'Fill all the blanks';
    header('Location: ../forgetPassword.php');
    exit;
}
