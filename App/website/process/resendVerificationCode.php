<?php

if (session_status() === PHP_SESSION_NONE) session_start();


include_once '../../../vendor/autoload.php';
include_once '../sms/sendSms.php';

$token = substr(uniqid(), -6);

// verification code
$verficationCode = new \App\Models\Code();

while ($verficationCode->codeUsed($token)) {
    $token = substr(uniqid(), -6);
}

$farmer = new \App\Models\Farmer();

if (isset($_SESSION['farmerContactRest'])) {
    $code_password = $_SESSION['farmerContactRest'];
    $farmerData = $farmer->getAllByColumn(column: 'famer_phone', value: $code_password);

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

        $massage = 'Your verification code is : ' . $token;
        $number = $farmerData[0]['famer_phone'];

        if (sendSms(number: $number, massage: $massage)) {
            $_SESSION['farmerContact'] = $number;
            header('Location: ../verification.php');
            exit;
        } else {
            $_SESSION['resetPasswordVerfication'] = 'Failed to send massage';
            header('Location: ../forgetPassword.php');
            exit;
        }
    } else {
        header('Location: ../forgetPassword.php');
        exit;
    }
}
if (isset($_SESSION['farmerContact'])) {
    die('We are here now');
    $farmer_contact = $_SESSION['farmerContact'];
    $farmerData = $farmer->getAllByColumn(column: 'famer_phone', value: $farmer_contact);

    if (is_array($farmerData)) {
        $codeData = array(
            'code_farmer' =>  $farmerData[0]['farmer_id'],
            'code' => $token,
            'code_type' => 'registration',
        );

        $codeSave =  $verficationCode->create($codeData);

        if (is_array($codeSave)) {

            // $_SESSION['saveFarmerError'] = $codeSave[2];
            header('Location: ../register.php');
            exit;
        }

        $massage = 'Your verification code is : ' . $token;
        $number = $farmerData[0]['famer_phone'];

        if (sendSms(number: $number, massage: $massage)) {
            // $_SESSION['farmerContact'] = $number;
            header('Location: ../verification.php');
            exit;
        } else {
            $_SESSION['saveFarmerError'] = 'Failed to send massage';
            header('Location: ../register.php');
            exit;
        }
    } else {
        header('Location: ../register.php');
        exit;
    }
} else {
    header('Location: ../login.php');
    exit;
}
