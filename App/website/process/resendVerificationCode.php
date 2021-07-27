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

if (isset($_SESSION['farmerContact'])) {
    $phone = $_SESSION['farmerContact'];
    $farmerData = $farmer->getAllByColumn(column: 'famer_phone', value: $phone);

    if (is_array($farmerData)) {
        // get current code number
        $oldCodeData = $verficationCode->getAllByColumn(column: 'code_farmer', value: $farmerData[0]['farmer_id']);

        if (is_array($oldCodeData)) {
            $codeData = array(
                'code_farmer' =>  $farmerData[0]['farmer_id'],
                'code' => $token,
                'code_type' => $oldCodeData[0]['code_type'],
            );

            $codeSave =  $verficationCode->create($codeData);
            $verficationCode->delete($oldCodeData[0]['code']);

            if (is_array($codeSave)) {
                // $_SESSION['saveFarmerError'] = $codeSave[2];
                header('Location: ../login.php');
                exit;
            }

            $massage = 'Your verification code is : ' . $token;
            $number = $farmerData[0]['famer_phone'];

            if (sendSms(number: $number, massage: $massage)) {
                $_SESSION['farmerContact'] = $phone;
                header('Location: ../verification.php');
                exit;
            } else {
                header('Location: ../login.php');
                exit;
            }
        } else {
            // go back to login
            header('Location: ../login.php');
            exit;
        }
    } else {
        header('Location: ../login.php');
        exit;
    }
} else {
    header('Location: ../login.php');
    exit;
}
