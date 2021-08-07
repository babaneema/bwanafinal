<?php
require_once './data/sidebarLearn.php';
require_once './data/learnData.php';
require_once './data/getFarmerData.php';

if (session_status() === PHP_SESSION_NONE) session_start();
if (isset($_SESSION['learnSearch'])) {
    $learnData = $_SESSION['learnSearch'];
    // var_dump($agroData);
    unset($_SESSION['learnSearch']);
} else {
    header('Location: index.php');
    exit;
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
                                                <span>Horticulture</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Cash Crops</span>
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
                                    <div class="col-sm-8 col-lg-9 col-md-8 product-container">
                                        <!-- Sorting -->
                                        <?php include_once './main/learn_sorting.php' ?>
                                        <div class="tab-content product-items">
                                            <div id="grid" class="related tab-pane fade in active show">
                                                <div class="row">
                                                    <?php
                                                    foreach ($learnData as $data) {
                                                        $image = '../' . $data['picture_link'];
                                                    ?>
                                                        <div class="item text-center col-md-4">
                                                            <div class="product-miniature js-product-miniature item-one first-item">
                                                                <div class="thumbnail-container border">
                                                                    <a href="viewLearn.php?learn_id=<?= $data['learn_unique'] ?>">
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
                                                                                <?= $data['subject_name'] ?>
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
                                        <?php include_once './main/learn_pagination.php' ?>
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