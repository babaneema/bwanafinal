<?php

namespace App\Models;

if (session_status() === PHP_SESSION_NONE) session_start();


include_once '../../vendor/autoload.php';
require_once './data/expertData.php';
require_once './data/getFarmerData.php';

// check if login
if (empty($farmer_data)) {
    header('Location: login.php');
    exit;
}

$address = new Address();
$regions = $address->getAllRegions();


$saveError = '';

// check if there is an error


$saveError = '';
if (isset($_SESSION['updateError'])) {
    $saveError = 'Fill all the data fields';
    unset($_SESSION['updateError']);
}

if (isset($_SESSION['updateFarmerError'])) {
    $saveError = $_SESSION['updateFarmerError'];
    unset($_SESSION['updateFarmerError']);
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
            <div class="container bg-light">
                <div class="row">
                    <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                        <div id="main">
                            <div id="content" class="page-content">
                                <div class="register-form ">
                                    <h1 class="text-center title-page">Update</h1>
                                    <form action="./process/updateUser.php" id="customer-form" class="js-customer-form" method="POST">
                                        <div>
                                            <div class="form-group">
                                                <h4 class="bg-danger text-center  text-white"> <?= $saveError ?></h4>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="">Full Name *</label>
                                                    <input class="form-control" value="<?= $farmer_data['farmer_name'] ?>" required="required" name="name" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group text-left row">
                                                <div class="col-sm-4">
                                                    <label for="" class="mr-2">Gender</label> <br>
                                                    <input class="mr-2" name="gender" value="Male" type="radio" checked>
                                                    <label for="" class="mr-2">Male</label>
                                                    <input class="mr-2" name="gender" value="Female" type="radio">
                                                    <label for="" class="mr-2">Female</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="" class="mr-2">Age Group</label> <br>
                                                    <input class="mr-2" name="age_group" value="18 - 35" type="radio" checked>
                                                    <label for="" class="mr-2">18 - 35 </label>
                                                    <input class="mr-2" name="age_group" value="36 - 45" type="radio">
                                                    <label for="" class="mr-2">36 - 45</label>
                                                    <input class="mr-2" name="age_group" value="46 - 100" type="radio">
                                                    <label for="" class="mr-2">46 - above</label>
                                                </div>
                                            </div>

                                            <hr class="mt-4 mb-4 bg-white">

                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="">Region</label>
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
                                                <div class="col-sm-6">
                                                    <label for="">District</label>
                                                    <select class="form-control" id="districts" name="district" required="required">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="">Activity Involved</label>
                                                    <select name="activity" required="required" id="" class="form-control">
                                                        <option value="Horticulture">Horticulture</option>
                                                        <option value="Cash Crops">Cash Crops</option>
                                                        <option value="Both">Both</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr class="mt-4 mb-4 bg-white">
                                            <div class="form-group row ">
                                                <div class="col-sm-6">
                                                    <label for="">Phone number *</label>
                                                    <input class="form-control" value="<?= $farmer_data['famer_phone'] ?>" required="required" name="phone" type="text" pattern="^[255]{3}[6,7]{1}[1-8]{1}[0-9]{7}$" minlength="10" maxlength="10">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="">Email</label>
                                                    <input class="form-control" value="<?= $farmer_data['farmer_email'] ?>" name="email" type="email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="">Password *</label>
                                                    <div class="input-group js-parent-focus">
                                                        <input min="8" class="form-control js-child-focus js-visible-password" name="password" type="password" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix text-center">
                                            <div>
                                                <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                                    Update
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
    <script>
        $(document).ready(() => {

        });
    </script>
</body>


<!-- user-register11:10-->

</html>