<?php
$hide = true;
$name = 'Welcome';
if (!empty($farmer_data)) {
    if ($agronomy) {
        $name = $farmer_data['agro_name'];
        $link = '../agronomist/index.php';
    } else {
        $name = $farmer_data['farmer_name'];
        $link = 'account.php';
    }

    $hide = true;
} else $hide = false;
?>
<header>
    <!-- header left mobie -->
    <div class="header-mobile d-md-none">
        <div class="mobile hidden-md-up text-xs-center d-flex align-items-left justify-content-around">

            <!-- menu left -->
            <!-- mobile_mainmenu -->
            <div id="" class="item-mobile-top">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>

            <!-- logo -->
            <div class="mobile-logo">
                <a href="index.php">
                    <h5 class="text-white">Bwanashamba App</h5>
                    <!-- <img class="logo-mobile img-fluid" src="../Assets/Website/img/logo/bwanashamba.png" alt="Prestashop_Furnitica"> -->
                </a>
            </div>

            <!-- menu right -->
            <div class="mobile-menutop" data-target="#mobile-pagemenu">
                <i class="zmdi zmdi-more"></i>
            </div>
        </div>

        <!-- search -->
        <div id="mobile_search" class="d-flex">
            <div id="mobile_search_content">
                <form method="get" action="#">

                    <input type="text" disabled class="disabled" name="" value="" placeholder="Search">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- header desktop -->
    <div class="header-top d-xs-none ">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-sm-2 col-md-2 d-flex align-items-center">
                    <div id="logo">
                        <a href="index.php">
                            <img src="../Assets/Website/img/logo/bwanashamba.png" alt="logo" class="img-fluid">

                        </a>
                    </div>
                </div>

                <!-- menu -->
                <div class="col-sm-5 col-md-5 align-items-center justify-content-center navbar-expand-md main-menu">
                    <div class="menu navbar collapse navbar-collapse">
                        <ul class="menu-top navbar-nav">
                            <!-- class="nav-link" -->
                            <li>
                                <a href="index.php" class="parent">Agronomists</a>
                            </li>
                            <li>
                                <a href="learn.php" class="parent">Learning</a>

                            </li>
                            <li>
                                <a href="#" class="parent">Service Provider</a>

                            </li>
                            <!-- <li>
                                <a href="contact.html" class="parent">Contact US</a>
                            </li> -->
                        </ul>
                    </div>
                </div>

                <!-- search and acount -->
                <div class="col-sm-5 col-md-5 d-flex align-items-center justify-content-end" id="search_widget">
                    <form method="get" action="#">

                        <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                        <input type="text" name="s" value="" placeholder="Search" class="ui-autocomplete-input" autocomplete="off">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>

                    <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                        <div class="myaccount-title ">
                            <a href="#acount" data-toggle="collapse" class="acount">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>
                                    <?php
                                    if ($hide) {
                                        echo $name;
                                    } else {
                                        echo 'Welcome';
                                    }
                                    ?>
                                </span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div id="acount" class="collapse">
                            <div class="account-list-content">
                                <div>
                                    <a class="login" href="<?= $link ?>" rel="nofollow" title="Log in to your customer account">
                                        <i class="fa fa-cog"></i>
                                        <span>My Account</span>
                                    </a>
                                </div>
                                <?php
                                if (!$hide) {
                                ?>
                                    <div>
                                        <a class="login" href="login.php" rel="nofollow" title="Log in to your customer account">
                                            <i class="fa fa-sign-in"></i>
                                            <span>Sign in</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="register" href="register.php" rel="nofollow" title="Register Account">
                                            <i class="fa fa-user"></i>
                                            <span>Register Account</span>
                                        </a>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div>
                                        <a class="login" href="logout.php" rel="nofollow" title="Log in to your customer account">
                                            <i class="fa fa-cog"></i>
                                            <span>Logout</span>
                                        </a>
                                    </div>

                                <?php
                                }
                                ?>

                                <!-- Language -->
                                <!-- <div id="desktop_language_selector" class="language-selector groups-selector hidden-sm-down">
                                    <ul class="list-inline">
                                        <li class="list-inline-itemcurrent">
                                            <a href="#">
                                                <img class="img-fluid" src="img/home/home1-flas.jpg" alt="English" width="16" height="11">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <img class="img-fluid" src="img/home/home1-flas2.jpg" alt="Italiano" width="16" height="11">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <img class="img-fluid" src="img/home/home1-flas3.jpg" alt="Français" width="16" height="11">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <img class="img-fluid" src="img/home/home1-flas4.jpg" alt="Español" width="16" height="11">
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>