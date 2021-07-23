<?php

namespace App\Login;

use App\Models\Code;
use App\Models\Farmer;

if (session_status() === PHP_SESSION_NONE) session_start();


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



include_once '../../../vendor/autoload.php';


if (isset($_POST['code'])) {


    // Handle for upload

    $login = new Login();

    $code = $_POST['code'];

    $verfyCode = new Code();
    $farmer = new Farmer();

    $data = $verfyCode->getAllByCode($code);

    if (!$data) {
        $_SESSION['verificationError'] = 'Wrong verification code. Try again';
        header('Location: ../verification.php');
        exit;
    }

    // activate both code and and user
    if ($verfyCode->activate($code)) {
        if ($data[0]['code_type'] === 'registration') {
            $farmer_id = $data[0]['code_farmer'];
            $farmer->activate($farmer_id);

            $verfyCode->delete($code);

            header('Location: ../login.php');
            exit;
        } else {
            $verfyCode->delete($code);
            $farmer_id = $data[0]['code_farmer'];
            $farmerData = $farmer->getAllById($farmer_id);
            $_SESSION['resetPasswordCode'] = $farmerData[0]['password'];
            header('Location: ../changePassword.php');
            exit;
        }
    } else {
        $_SESSION['verificationError'] = 'Failed to activate you code. Try again';
        header('Location: ../verification.php');
        exit;
    }
} else {
    $_SESSION['verificationError'] = True;
    header('Location: ../verification.php');
    exit;
}
