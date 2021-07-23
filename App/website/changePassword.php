<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['resetPasswordCode'])) {
    header('Location: ./login.php');
    exit;
}
$saveError = '';
if (isset($_SESSION['changePasswordError'])) {
    $saveError = $_SESSION['changePasswordError'];
    $saveError = 'Fill all the blanks';
    unset($_SESSION['changePasswordError']);
}

?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- user-reset-password11:18-->

<head>
    <?php include_once './includes/header.php' ?>
</head>

<body class="user-reset-password blog">
    <?php include_once './navigation/header.php' ?>

    <!-- main content -->
    <div class="main-content">
        <div class="wrap-banner">

            <!-- breadcrumb -->
            <nav class="breadcrumb-bg">
                <div class="container no-index">
                    <div class="breadcrumb">
                        <ol>
                            <li>
                                <a href="#">
                                    <span>User</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>User Reset Password</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
        </div>

        <!-- main -->
        <div id="wrapper-site">
            <div class="container">
                <div class="row">
                    <div id="content-wrapper" class="onecol">
                        <div id="main">
                            <div class="page-content">
                                <form action="./process/changePassword.php" class="forgotten-password" method="post">
                                    <h1 class="text-center title-page">Change Password</h1>
                                    <div class="form-group">
                                        <h4 class="bg-danger text-center  text-white"> <?= $saveError ?></h4>
                                    </div>
                                    <div class="form-fields text-center ">
                                        <div class="form-group center-email-fields">
                                            <div class="email text-left">
                                                <label for="">New password</label>
                                                <input type="password" name="password" required class="form-control" min="8">
                                            </div>
                                            <div>
                                                <button class="form-control-submit btn btn-primary" name="submit" type="submit">
                                                    Change password
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once './footer/footer.php' ?>

    <?php include_once './navigation/mobileNav.php' ?>

    <!-- Page Loader -->
    <!-- page Loading : page-preloader -->
    <div id="page-preloaders">
        <div class="page-loading">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <?php include_once './includes/footer.php' ?>
</body>


<!-- user-reset-password11:18-->

</html>