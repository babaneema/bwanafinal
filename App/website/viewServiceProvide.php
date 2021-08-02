<?php

use PhpParser\Node\Expr\Isset_;

if (session_status() === PHP_SESSION_NONE) session_start();

require_once './data/sidebarRegions.php';
require_once './data/singleServiceProvider.php';
require_once './data/getFarmerData.php';
$hide = false;
(empty($farmer_data)) ? $hide = false : $hide = true;

if (!$hide) {
    $url =  $_SERVER['REQUEST_URI'];
    $_SESSION['experts_callback'] = strstr($url, 'viewExpert');
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
                                                <span>Service Provider</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Service</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Product</span>
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
                                    <?php include_once './navigation/serviceSidebar.php' ?>

                                    <!-- end col-md-9-1 -->
                                    <div class="col-sm-8 col-lg-9 col-md-9">
                                        <div class="main-product-detail">
                                            <h2><?= $singleData[0]['pro_name'] ?></h2>
                                            <div class="product-single row">
                                                <div class="product-detail col-xs-12 col-md-5 col-sm-5">
                                                    <div class="page-content" id="content">
                                                        <div class="images-container">
                                                            <div class="js-qv-mask mask tab-content border">
                                                                <div id="item1" class="tab-pane fade active in show">
                                                                    <img src="<?= $image1 ?>" alt="img" class="w-100">
                                                                </div>
                                                                <div id="item2" class="tab-pane fade">
                                                                    <img src="<?= $image2 ?>" alt="img" class="w-100">
                                                                </div>
                                                                <div id="item3" class="tab-pane fade">
                                                                    <img src="<?= $image3 ?>" alt="img" class="w-100">
                                                                </div>
                                                                <div id="item4" class="tab-pane fade" class="w-100">
                                                                    <img src="<?= $image4 ?>" alt="img">
                                                                </div>
                                                                <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                                                                    <i class="fa fa-expand"></i>
                                                                </div>
                                                            </div>
                                                            <ul class="product-tab nav nav-tabs d-flex mt-1">
                                                                <li class="active col">
                                                                    <a href="#item1" data-toggle="tab" aria-expanded="true" class="active show">
                                                                        <img src="<?= $image1 ?>" alt="img" width="50" height="50">
                                                                    </a>
                                                                </li>
                                                                <li class="col">
                                                                    <a href="#item2" data-toggle="tab">
                                                                        <img src="<?= $image2 ?>" alt="img" width="50" height="50">
                                                                    </a>
                                                                </li>
                                                                <li class="col">
                                                                    <a href="#item3" data-toggle="tab">
                                                                        <img src="<?= $image3 ?>" alt="img" width="50" height="50">
                                                                    </a>
                                                                </li>
                                                                <li class="col">
                                                                    <a href="#item4" data-toggle="tab">
                                                                        <img src="<?= $image4 ?>" alt="img" width="50" height="50">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div class="modal fade" id="product-modal" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div class="modal-body">
                                                                                <div class="product-detail">
                                                                                    <div>
                                                                                        <div class="images-container">
                                                                                            <div class="js-qv-mask mask tab-content mb-2">
                                                                                                <div id="modal-item1" class="tab-pane fade active in show">
                                                                                                    <img src="<?= $image1 ?>" alt="img" class="w-100">
                                                                                                </div>
                                                                                                <div id="modal-item2" class="tab-pane fade">
                                                                                                    <img src="<?= $image2 ?>" alt="img" class="w-100">
                                                                                                </div>
                                                                                                <div id="modal-item3" class="tab-pane fade">
                                                                                                    <img src="<?= $image3 ?>" alt="img" class="w-100">
                                                                                                </div>
                                                                                                <div id="modal-item4" class="tab-pane fade">
                                                                                                    <img src="<?= $image4 ?>" alt="img" class="w-100">
                                                                                                </div>
                                                                                            </div>
                                                                                            <ul class="product-tab nav nav-tabs">
                                                                                                <li class="active">
                                                                                                    <a href="#modal-item1" data-toggle="tab" class="mr-2 active show">
                                                                                                        <img src="<?= $image1 ?>" alt="img" width="50" height="50">
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#modal-item2" data-toggle="tab" class="mr-2">
                                                                                                        <img src="<?= $image2 ?>" alt="img" width="50" height="50">
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#modal-item3" data-toggle="tab" class="mr-2">
                                                                                                        <img src="<?= $image3 ?>" alt="img" width="50" height="50">
                                                                                                    </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#modal-item4" data-toggle="tab" class="mr-2">
                                                                                                        <img src="<?= $image4 ?>" alt="img" width="50" height="50">
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
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
                                                <div class="product-info col-xs-12 col-md-7 col-sm-7">
                                                    <div class="detail-description">
                                                        <div class="price-del">
                                                            <b>
                                                                <span class="price">
                                                                    <?php
                                                                    echo $singleData[0]['prod_street'] . ',  ';
                                                                    echo $add['district_name'] . ',  ';
                                                                    echo $add['region_name'] . '  ';
                                                                    ?>
                                                                </span>
                                                            </b>
                                                        </div>
                                                        <p class="description">
                                                            <?= $singleData[0]['prod_info'] ?>
                                                        </p>

                                                        <div class="d-flex2 has-border">
                                                            <div class="btn-group">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-share"></i>
                                                                    <span>Share</span>
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
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="read after-has-border">
                                                                <a href="#review">
                                                                    <i class="fa fa-commenting-o color" aria-hidden="true"></i>
                                                                    <span>READ REVIEWS (3)</span>
                                                                </a>
                                                            </div>
                                                            <div class="apen after-has-border">
                                                                <a href="#review">
                                                                    <i class="fa fa-pencil color" aria-hidden="true"></i>
                                                                    <span>WRITE A REVIEW</span>
                                                                </a>
                                                            </div> -->
                                                        </div>
                                                        <div class="content">
                                                            <p>Service Provider :
                                                                <span class="content2">
                                                                    <a href="#">
                                                                        <?= $serviceData[0]['provider_name'] ?>
                                                                    </a>
                                                                </span>
                                                            </p>
                                                            <p>Business Type :
                                                                <span class="content2">
                                                                    <a href="#">
                                                                        <?= $serviceData[0]['service_offered'] ?>
                                                                    </a>
                                                                </span>
                                                            </p>
                                                            <p>Contact :
                                                                <span class="content2">
                                                                    <a href="#">
                                                                        <?= $serviceData[0]['provider_phone_number'] ?>
                                                                    </a>
                                                                </span>
                                                            </p>
                                                            <p>Email :
                                                                <span class="content2">
                                                                    <a href="#">
                                                                        <?= $serviceData[0]['provider_email'] ?>
                                                                    </a>
                                                                </span>
                                                            </p>
                                                            <p>Main Office :
                                                                <span class="content2">
                                                                    <a href="#">
                                                                        <?= $serviceData[0]['district_name'] ?>
                                                                    </a>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="related">
                                                <div class="title-tab-content  text-center">
                                                    <div class="title-product justify-content-start">
                                                        <h2>Related Products</h2>
                                                    </div>
                                                </div>
                                                <!-- <div class="tab-content">
                                                    <div class="row">
                                                        <div class="item text-center col-md-4">
                                                            <div class="product-miniature js-product-miniature item-one first-item">
                                                                <div class="thumbnail-container border border">
                                                                    <a href="product-detail.html">
                                                                        <img class="img-fluid image-cover" src="img/product/1.jpg" alt="img">
                                                                        <img class="img-fluid image-secondary" src="img/product/22.jpg" alt="img">
                                                                    </a>
                                                                    <div class="highlighted-informations">
                                                                        <div class="variant-links">
                                                                            <a href="#" class="color beige" title="Beige"></a>
                                                                            <a href="#" class="color orange" title="Orange"></a>
                                                                            <a href="#" class="color green" title="Green"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-description">
                                                                    <div class="product-groups">
                                                                        <div class="product-title">
                                                                            <a href="product-detail.html">Nulla et justo non augue</a>
                                                                        </div>
                                                                        <div class="rating">
                                                                            <div class="star-content">
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="product-group-price">
                                                                            <div class="product-price-and-shipping">
                                                                                <span class="price">£28.08</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-buttons d-flex justify-content-center">
                                                                        <form action="#" method="post" class="formAddToCart">
                                                                            <a class="add-to-cart" href="#" data-button-action="add-to-cart">
                                                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                            </a>
                                                                        </form>
                                                                        <a class="addToWishlist" href="#" data-rel="1" onclick="">
                                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
                                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item text-center col-md-4">
                                                            <div class="product-miniature js-product-miniature item-one first-item">
                                                                <div class="thumbnail-container border">
                                                                    <a href="product-detail.html">
                                                                        <img class="img-fluid image-cover" src="img/product/2.jpg" alt="img">
                                                                        <img class="img-fluid image-secondary" src="img/product/11.jpg" alt="img">
                                                                    </a>
                                                                    <div class="highlighted-informations">
                                                                        <div class="variant-links">
                                                                            <a href="#" class="color beige" title="Beige"></a>
                                                                            <a href="#" class="color orange" title="Orange"></a>
                                                                            <a href="#" class="color green" title="Green"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-description">
                                                                    <div class="product-groups">
                                                                        <div class="product-title">
                                                                            <a href="product-detail.html">Nulla et justo non augue</a>
                                                                        </div>
                                                                        <div class="rating">
                                                                            <div class="star-content">
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="product-group-price">
                                                                            <div class="product-price-and-shipping">
                                                                                <span class="price">£31.08</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-buttons d-flex justify-content-center">
                                                                        <form action="#" method="post" class="formAddToCart">
                                                                            <a class="add-to-cart" href="#" data-button-action="add-to-cart">
                                                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                            </a>
                                                                        </form>
                                                                        <a class="addToWishlist" href="#" data-rel="1" onclick="">
                                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
                                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item text-center col-md-4">
                                                            <div class="product-miniature js-product-miniature item-one first-item">
                                                                <div class="thumbnail-container border">
                                                                    <a href="product-detail.html">
                                                                        <img class="img-fluid image-cover" src="img/product/3.jpg" alt="img">
                                                                        <img class="img-fluid image-secondary" src="img/product/14.jpg" alt="img">
                                                                    </a>
                                                                    <div class="highlighted-informations">
                                                                        <div class="variant-links">
                                                                            <a href="#" class="color beige" title="Beige"></a>
                                                                            <a href="#" class="color orange" title="Orange"></a>
                                                                            <a href="#" class="color green" title="Green"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-description">
                                                                    <div class="product-groups">
                                                                        <div class="product-title">
                                                                            <a href="product-detail.html">Nulla et justo non augue</a>
                                                                        </div>
                                                                        <div class="rating">
                                                                            <div class="star-content">
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="product-group-price">
                                                                            <div class="product-price-and-shipping">
                                                                                <span class="price">£20.08</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-buttons d-flex justify-content-center">
                                                                        <form action="#" method="post" class="formAddToCart">
                                                                            <a class="add-to-cart" href="#" data-button-action="add-to-cart">
                                                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                            </a>
                                                                        </form>
                                                                        <a class="addToWishlist" href="#" data-rel="1" onclick="">
                                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
                                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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