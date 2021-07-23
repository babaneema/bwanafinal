<?php


if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['farmerContact']) && !isset($_SESSION['farmerContactRest'])) header('Location: ./index.php');

$saveError = '';
if (isset($_SESSION['verificationError'])) {
    $saveError = $_SESSION['verificationError'];
    unset($_SESSION['verificationError']);
}


?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- user-login11:10-->

<head>
    <?php include_once './includes/header.php' ?>
</head>

<body class="user-login blog">
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
                                    <span>Verification</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>

        </div>

        <!-- main -->
        <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
                    <div class="container">
                        <h1 class="text-center title-page">Verification</h1>
                        <div class="login-form">
                            <form id="customer-form" action="./process/verify.php" method="post">
                                <div>
                                    <div class="form-group">
                                        <h4 class="bg-danger text-center  text-white"> <?= $saveError ?></h4>
                                    </div>
                                    <input type="hidden" name="back" value="my-account">
                                    <div class="form-group no-gutters">
                                        <label for="">Verification Code</label>
                                        <input class="form-control" max="6" min="6" required="required" name="code" type="text">
                                    </div>
                                    <div class="no-gutters text-center">
                                        <div class="forgot-password">
                                            <a href="./process/resendVerificationCode.php" rel="nofollow">
                                                Resend verification code
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div class="text-center no-gutters">
                                        <input type="hidden" name="submitLogin" value="1">
                                        <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                            Verify
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once './footer/footer.php' ?>

    <?php include_once './navigation/mobileNav.php' ?>
    <?php include_once './includes/footer.php' ?>

</body>


<!-- user-login11:10-->

</html>