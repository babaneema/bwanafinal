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
                                        <th class="first_item">Name :</th>
                                        <td><?= $farmer_data['farmer_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Gender :</th>
                                        <td><?= $farmer_data['farmer_gender'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Age group :</th>
                                        <td><?= $farmer_data['age_group'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Activity :</th>
                                        <td><?= $farmer_data['activities'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">E-mail :</th>
                                        <td><?= $farmer_data['farmer_email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Phone :</th>
                                        <td><?= $farmer_data['famer_phone'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="first_item">Date :</th>
                                        <td><?= $farmer_data['farmer_reg_date'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Funtion</th>
                                        <td>
                                            <a href="updateUser.php" class="btn btn-sm btn-success">
                                                Update
                                            </a>
                                            <button class="btn btn-sm btn-danger">
                                                Delete Account
                                            </button>
                                        </td>
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