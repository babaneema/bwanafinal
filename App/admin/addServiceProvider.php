<?php

namespace App\Models;

session_start();

include_once '../../vendor/autoload.php';

$address = new Address();
$regions = $address->getAllRegions();


$provider = new ServiceProvider();
$providerData = $provider->getAllData();
if (!$providerData) $providerData = [];

// check if there is an error
$saveError = '';
if (isset($_SESSION['serviceProvider'])) {
    $saveError = 'Fill all the data fields';
    unset($_SESSION['serviceProvider']);
}

if (isset($_SESSION['saveServiceProviderError'])) {
    $saveError = $_SESSION['saveServiceProviderError'];
    unset($_SESSION['saveServiceProviderError']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once './includes/header.php' ?>
</head>

<body>
    <div id="app">
        <?php include_once './nav/sidebar.php' ?>
        <div id="main">
            <?php include_once './nav/navbar.php' ?>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Service Provider </h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="serviceprovider.php">Service Provider</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
                <form action="./php/service/addServiceProvider.php" method="post" enctype="multipart/form-data">

                    <!-- Education Information -->
                    <section id="basic-input-groups">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Basic Information</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row ">
                                                <h3 class="bg-danger text-white">
                                                    <?= $saveError ?>
                                                </h3>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                                        <input type="text" class="form-control" placeholder="Service Provider Name" required="required" name="name" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Business Type</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="business_type" required="required">
                                                            <option value="Company">Company</option>
                                                            <option value="Solo Proprietor">Solo Proprietor</option>
                                                            <option value="Partnership">Partnership</option>
                                                            <option value="Joint Venture">Joint Venture</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Service Type</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="service_type" required="required">
                                                            <option value="Service">Service based</option>
                                                            <option value="Product">Product based</option>
                                                            <option value="Service and Product">Both</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Phone</span>
                                                        <input type="text" class="form-control" placeholder="255xxxxxxxxx" required="required" name="phone" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">E-mail</span>
                                                        <input type="email" class="form-control" placeholder="info@agriedo.co.tz" required="required" name="email" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Region</label>
                                                        <select class="form-select" id="region">
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
                                                <div class="col-lg-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Districs</label>
                                                        <select class="form-select" id="districts" name="district" required="required">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section id="basic-input-groups">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Save Data</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-lg-3 mb-1">
                                                    <button class="btn btn-info btn-sm btn-block text-dark" type="reset">
                                                        Reset
                                                    </button>
                                                </div>
                                                <div class="col-lg-3 mb-1">
                                                    <button class="btn btn-success btn-sm btn-block text-dark" type="submit">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>


        </div>
    </div>
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
                url: './php/agronomist/getDistricts.php',
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
                    url: './php/agronomist/getDistricts.php',
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

</html>