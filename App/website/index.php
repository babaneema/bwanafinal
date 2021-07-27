<?php
require_once './data/sidebarRegions.php';
require_once './data/expertData.php';
require_once './data/getFarmerData.php';


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
        width: 260px !important;
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

                                    </ol>
                                </div>
                            </div>
                        </nav>

                        <div class="container">
                            <div class="content">
                                <div class="row">
                                    <!-- Sidebar -->
                                    <?php include_once './navigation/sidebar.php' ?>
                                    <div class="col-sm-8 col-lg-9 col-md-8 product-container">
                                        <!-- Sorting -->
                                        <?php include_once './main/sorting.php' ?>
                                        <div class="tab-content product-items">
                                            <div id="grid" class="related tab-pane fade in active show">
                                                <div class="row">
                                                    <?php
                                                    foreach ($agroData as $data) {
                                                        $image = '../' . $data['agro_picture'];
                                                    ?>
                                                        <div class="item text-center col-md-4">
                                                            <div class="product-miniature js-product-miniature item-one first-item">
                                                                <div class="thumbnail-container border">
                                                                    <a href="viewExpert.php?agrod_id=<?= $data['agro_unique'] ?>">
                                                                        <img class="img-fluid image-cover image-modi" src="<?= $image ?>" alt="img">
                                                                        <img class="img-fluid image-secondary image-modi" src="<?= $image ?>" alt="img">
                                                                    </a>
                                                                    <!-- <div class="highlighted-informations">
                                                                    <div class="variant-links">
                                                                        <a href="#" class="color beige" title="Beige"></a>
                                                                        <a href="#" class="color orange" title="Orange"></a>
                                                                        <a href="#" class="color green" title="Green"></a>
                                                                    </div>
                                                                </div> -->
                                                                </div>
                                                                <div class="product-description">
                                                                    <div class="product-groups">
                                                                        <div class="product-title">
                                                                            <a href="product-detail.html">
                                                                                <?= $data['agro_name'] ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="rating">
                                                                            <div class="star-content">
                                                                                <div class="star"></div>
                                                                                <div class="star"></div>
                                                                                <!-- <div class="star"></div>
                                                                            <div class="star"></div>
                                                                            <div class="star"></div> -->
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price">£28.08</span>
                                                                        </div>
                                                                    </div> -->
                                                                    </div>
                                                                    <!-- <div class="product-buttons d-flex justify-content-center">
                                                                    <form action="#" method="post" class="formAddToCart">
                                                                        <input type="hidden" name="id_product" value="1">
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
                                                                </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                        </div>

                                        <!-- pagination -->
                                        <?php include_once './main/pagination.php' ?>
                                    </div>

                                    <!-- end col-md-9-1 -->
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