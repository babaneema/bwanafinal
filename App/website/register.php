<?php

namespace App\Models;

session_start();

include_once '../../vendor/autoload.php';

$address = new Address();
$regions = $address->getAllRegions();
// var_dump($regions);
$saveError = '';

// check if there is an error


$saveError = '';
if (isset($_SESSION['farmerError'])) {
    $saveError = 'Fill all the data fields';
    unset($_SESSION['farmerError']);
}

if (isset($_SESSION['saveFarmerError'])) {
    $saveError = $_SESSION['saveFarmerError'];
    unset($_SESSION['saveFarmerError']);
}



?>


<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- user-register11:10-->

<head>
    <?php include_once './includes/header.php' ?>
</head>

<body class="user-register blog">
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
                                    <span>Registration</span>
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
                    <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                        <div id="main">
                            <div id="content" class="page-content">
                                <div class="register-form text-center">
                                    <h1 class="text-center title-page">Register</h1>
                                    <form action="./process/processRegistration.php" id="customer-form" class="js-customer-form" method="POST">
                                        <div>
                                            <div class="form-group">
                                                <h4 class="bg-danger text-center  text-white"> <?= $saveError ?></h4>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" required="required" name="fname" type="text" placeholder="First name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" required="required" name="mname" type="text" placeholder="Middle name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" required="required" name="lname" type="text" placeholder="Last name">
                                                </div>
                                            </div>
                                            <div class="form-group text-left">
                                                <div>
                                                    <input class="mr-2" name="gender" value="Male" type="radio" checked>
                                                    <label for="" class="mr-2">Male</label>
                                                    <input class="mr-2" name="gender" value="Female" type="radio">
                                                    <label for="" class="mr-2">Female</label>
                                                </div>
                                            </div>
                                            <div class="form-group text-left">
                                                <div>
                                                    <label for="" class="mr-2">Age Group</label> <br>
                                                    <input class="mr-2" name="age_group" value="18 - 35" type="radio" checked>
                                                    <label for="" class="mr-2">18 - 35 </label>
                                                    <input class="mr-2" name="age_group" value="36 - 45" type="radio">
                                                    <label for="" class="mr-2">36 - 45</label>
                                                    <input class="mr-2" name="age_group" value="46 - 100" type="radio">
                                                    <label for="" class="mr-2">46 - above</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <select name="activity" required="required" id="" class="form-control">
                                                        <option value="" selected> Type of activities you are involved</option>
                                                        <option value="Horticulture">Horticulture</option>
                                                        <option value="Cash Crops">Cash Crops</option>
                                                        <option value="Both">Both</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <select class="form-control" id="region">
                                                        <?php
                                                        foreach ($regions as $rdata) {
                                                        ?>
                                                            <option value="<?= $rdata['id'] ?>">
                                                                <?= $rdata['region_name'] ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <select class="form-control" id="districts" name="district" required="required">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" required="required" name="phone" type="text" placeholder="Phone number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <input class="form-control" name="email" type="email" placeholder="Email">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div>
                                                    <div class="input-group js-parent-focus">
                                                        <input min="8" class="form-control js-child-focus js-visible-password" name="password" type="password" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div>
                                                <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                                    Create Account
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
        </div>
    </div>

    <!-- footer -->
    <?php include_once './footer/footer.php' ?>

    <?php include_once './navigation/mobileNav.php' ?>

    <?php include_once './includes/footer.php' ?>

    <script>
        $(document).ready(() => {
            var $region = $('#region');
            var $district = $('#districts');
            $district.empty();
            var current_region = $region.val();

            $.ajax({
                type: "POST",
                data: {
                    'region_id': current_region
                },
                dataType: "json",
                url: './data/getDistricts.php',
                success: function(response) {
                    // console.log(response);
                    $.each(response, function(i, item) {
                        $('#districts').append($('<option>', {
                            value: item.id,
                            text: item.district_name
                        }));
                    });
                }
            });
            // on change region
            $region.change(() => {
                optionSelected = $region.find("option:selected").val();
                $district.empty();
                // console.log(optionSelected)
                $.ajax({
                    type: "POST",
                    data: {
                        'region_id': optionSelected
                    },
                    dataType: "json",
                    url: './data/getDistricts.php',
                    success: function(response) {
                        // console.log(response);
                        $.each(response, function(i, item) {
                            $('#districts').append($('<option>', {
                                value: item.id,
                                text: item.district_name
                            }));
                        });
                    }
                });

            });
        });
    </script>
</body>


<!-- user-register11:10-->

</html>