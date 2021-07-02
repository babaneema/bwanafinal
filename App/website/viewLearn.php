<?php

use PhpParser\Node\Expr\Isset_;

session_start();

require_once './data/sidebarLearn.php';
require_once './data/singleLearn.php';
require_once './data/getFarmerData.php';
$hide = false;
(empty($farmer_data)) ? $hide = false : $hide = true;

if (!$hide) {
    $url =  $_SERVER['REQUEST_URI'];
    $_SESSION['experts_callback'] = strstr($url, 'viewLearn');
}

?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">

<style>
    .image-modi {
        height: 250px !important;
        width: 250px !important;
    }
</style>

<!-- product-grid-sidebar-left10:54-->

<head>
    <?php include_once './includes/header.php' ?>
</head>

<body id="product-sidebar-left" class="product-grid-sidebar-left">
    <?php include_once './navigation/header.php' ?>

    <!-- main content -->
    <div class="main-content">
        <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
                    <div class="page-home">
                        <!-- breadcrumb -->
                        <nav class="breadcrumb-bg">
                            <div class="container no-index">
                                <div class="breadcrumb">
                                    <ol>
                                        <li>
                                            <a href="#">
                                                <span>Experts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Agronomists</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Veterinarians</span>
                                            </a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </nav>

                        <div class="container">
                            <div class="content">
                                <div class="row">
                                    <!-- Sidebar -->
                                    <?php include_once './navigation/learn_sidebar.php' ?>

                                    <!-- end col-md-9-1 -->
                                    <div class="col-sm-8 col-lg-9 col-md-9">
                                        <div class="main-product-detail">
                                            <h3>
                                                <?= $singleData['subject_name'] ?>
                                            </h3>
                                            <div class="product-single row">
                                                <div class="product-detail col-xs-12 col-md-5 col-sm-5">
                                                    <div class="page-content" id="content">
                                                        <div class="images-container">
                                                            <div class="js-qv-mask mask tab-content border">
                                                                <div id="item1" class="tab-pane fade active in show">
                                                                    <video controls autoplay class="image-modi">
                                                                        <source src="<?= $video ?>" type="video/mp4">
                                                                    </video>
                                                                    <!-- <img src="<?= $image ?>" alt="img" class="image-modi"> -->
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info col-xs-12 col-md-7 col-sm-7">
                                                    <div class="detail-description">

                                                        <div class="d-flex2 has-border mb-3">
                                                            <div class="btn-group">
                                                                <a href="./viewPdf.php?view=<?= $pdf ?>" class="email">
                                                                    <i class="fa fa-book" aria-hidden="true"></i>
                                                                    <span>
                                                                        Read more
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>


                                                        <div class="rating-comment has-border d-flex">
                                                            <div class="review-description d-flex">
                                                                <span>REVIEW :</span>
                                                                <div class="rating">
                                                                    <div class="star-content">
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <!-- <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <div class="star"></div> -->
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?php
                                                        if (!$hide) {
                                                        ?>
                                                            <div class="d-flex2 has-border mb-3 mt-2">

                                                                <div class="btn-group">
                                                                    <a href="login.php" class="login">
                                                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                                        <span>
                                                                            Login
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="btn-group">
                                                                    <a href="register.php" class="signup">
                                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                                        <span>
                                                                            Register
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>

                                                        <!-- <div class="content">

                                                            <p>Categories :
                                                                <span class="content2">
                                                                    <a href="#">Clothing</a>,
                                                                    <a href="#">Men's Jackets</a>
                                                                </span>
                                                            </p>

                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
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


<!-- product-grid-sidebar-left10:55-->

</html>