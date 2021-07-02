<?php


session_start();
$saveError = '';

// check if there is an error


$saveError = '';
if (isset($_SESSION['loginError'])) {
    $saveError = 'Fill all the data fields';
    unset($_SESSION['loginError']);
}

if (isset($_SESSION['loginFailed'])) {
    $saveError = 'Wrong credentials';
    unset($_SESSION['loginFailed']);
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
                                    <span>Login</span>
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
                        <h1 class="text-center title-page">Log In</h1>
                        <div class="login-form">
                            <form id="customer-form" action="./process/processLogin.php" method="post">
                                <div>
                                    <div class="form-group">
                                        <h4 class="bg-danger text-center  text-white"> <?= $saveError ?></h4>
                                    </div>
                                    <input type="hidden" name="back" value="my-account">
                                    <div class="form-group no-gutters">
                                        <input class="form-control" required="required" name="phone" type="text" placeholder=" Phone numer">
                                    </div>
                                    <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                            <input class="form-control js-child-focus js-visible-password" name="password" type="password" required="required" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="no-gutters text-center">
                                        <div class="forgot-password">
                                            <a href="forgetPassword.php" rel="nofollow">
                                                Forgot your password?
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div class="text-center no-gutters">
                                        <input type="hidden" name="submitLogin" value="1">
                                        <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                            Sign in
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