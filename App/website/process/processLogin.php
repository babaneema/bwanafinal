<?php

namespace App\Login;

session_start();


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



include_once '../../../vendor/autoload.php';


if (isset($_POST['phone']) && isset($_POST['password'])) {


    // Handle for upload

    $login = new Login();

    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $table = 'farmer';
    $column_name = 'famer_phone';


    $dt = $login->login(table_name: $table, colum: $column_name, colum_value: $phone, password: $password);
    if ($dt &&  $table == 'farmer') {
        $_SESSION['user'] = $login->encrypted();

        if (isset($_SESSION['experts_callback'])) {
            $url = $_SESSION['experts_callback'];
            unset($_SESSION['experts_callback']);
            header('Location: ../' . $url);
            exit;
        }
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION['loginFailed'] = True;
        header('Location: ../login.php');
        exit;
    }
} else {
    $_SESSION['loginError'] = True;
    header('Location: ../login.php');
    exit;
}
