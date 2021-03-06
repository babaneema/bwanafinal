<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$saveError = '';
if (isset($_SESSION['resetPasswordVerfication'])) {
    $saveError = $_SESSION['resetPasswordVerfication'];
    unset($_SESSION['resetPasswordVerfication']);
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
                                <form action="./process/sendResetVerificationCode.php" class="forgotten-password" method="post">
                                    <h1 class="text-center title-page">Change Password</h1>
                                    <div class="form-group">
                                        <h4 class="bg-danger text-center  text-white"> <?= $saveError ?></h4>
                                    </div>
                                    <div class="form-fields text-center ">
                                        <div class="form-group center-email-fields">
                                            <div class="email text-left">
                                                <label for="">Phone number</label>
                                                <input type="text" name="phone" required class="form-control" placeholder="Phone number">
                                            </div>
                                            <div>
                                                <button class="form-control-submit btn btn-primary" name="submit" type="submit">
                                                    Send verification code
                                                </button>
                                            </div>
                                        </div>
                                        <a href="login.php" class="account-link">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                            <span class="text-center">Back to login</span>
                                        </a>
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