<?php

use App\Models\Farmer;

if (session_status() === PHP_SESSION_NONE) session_start();


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



include_once '../../../vendor/autoload.php';

if (!isset($_SESSION['resetPasswordCode'])) header('Location: ./login.php');


if (isset($_POST['password'])) {


    // Handle for upload


    $password = $_POST['password'];
    $code_password = $_SESSION['resetPasswordCode'];
    unset($_SESSION['resetPasswordCode']);

    $farmer = new Farmer();

    $data = $farmer->getAllByColumn(column: 'password', value: $code_password);


    if (is_array($data)) {
        // change password
        $passwrd = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($farmer->changePassword($data[0]['farmer_id'], $passwrd)) {
            header('Location: ../login.php');
            exit;
        } else {
            header('Location: ../logout.php');
            exit;
        }
    } else {
        header('Location: ../login.php');
        exit;
    }
} else {
    $_SESSION['changePasswordError'] = True;
    header('Location: ../changePassword.php');
    exit;
}
