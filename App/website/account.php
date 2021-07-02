<?php
require_once './data/sidebarRegions.php';
require_once './data/expertData.php';
require_once './data/getFarmerData.php';
if (empty($farmer_data)) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- user-acount11:10-->

<head>
    <?php include_once './includes/header.php' ?>
</head>

<body class="user-acount">
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
                                    <span>My Account</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>

            <div class="acount head-acount">
                <div class="container">
                    <div id="main">
                        <h1 class="title-page">My Account</h1>
                        <div class="content" id="block-history">
                            <table class="std table">
                                <tbody>
                                    <tr>
                                        <th class="first_item">My Name :</th>
                                        <td>David James</td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Company :</th>
                                        <td>TivaTheme</td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Address :</th>
                                        <td>123 canberra Street, New York, USA</td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">City :</th>
                                        <td>New York</td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Postal/Zip Code :</th>
                                        <td>10001</td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Phone :</th>
                                        <td>0123456789</td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Country:</th>
                                        <td>USA</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                            view Address
                        </button>
                        <div class="order">
                            <h4>Order
                                <span class="detail">History</span>
                            </h4>
                            <p>You haven't placed any orders yet.</p>
                        </div> -->
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


<!-- user-acount11:10-->

</html>