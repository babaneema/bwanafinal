<?php

namespace App\Models;

session_start();

include_once '../../vendor/autoload.php';
include_once './php/service/getServiceProviderData.php';

$pass = '';
isset($_GET['pass']) ? $pass = $_GET['pass'] : header('Location: ./index.php');
$provider_data = $serviceProvider->getAllByColumn('provider_unique', $pass);
if (!is_array($provider_data)) header('Location: ./index.php');

$address = new Address();
$regions = $address->getAllRegions();


$provider = new ServiceProvider();
$providerData = $provider->getAllData();
if (!$providerData) $providerData = [];

// check if there is an error
$saveError = '';
if (isset($_SESSION['serviceProductError'])) {
    $saveError = 'Fill all the data fields';
    unset($_SESSION['serviceProductError']);
}

if (isset($_SESSION['fileserviceproductError'])) {
    $saveError = 'Failes to upload images';
    unset($_SESSION['fileserviceproductError']);
}
if (isset($_SESSION['saveServiceProvideProductError'])) {
    $saveError = $_SESSION['saveServiceProvideProductError'];
    unset($_SESSION['saveServiceProvideProductError']);
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
                            <h3>
                                <?= $provider_data[0]['provider_name'] ?>
                            </h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="serviceprovider.php">Service Provider Product</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
                <form action="./php/service/addServiceProduct.php" method="post" enctype="multipart/form-data">

                    <!-- Education Information -->
                    <input type="hidden" name="check" value="<?= $pass ?>">
                    <section id="basic-input-groups">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Product Information</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row ">
                                                <h3 class="bg-danger text-white">
                                                    <?= $saveError ?>
                                                </h3>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                                        <input type="text" class="form-control" placeholder="Product name" required="required" name="name" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Product Type</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="business_type" required="required">
                                                            <option value="Input">Input</option>
                                                            <option value="Machines">Machines</option>
                                                            <option value="Tool">Tools</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Product Information</span>
                                                        <textarea name="info" required="required" id="" cols="30" rows="10" class="form-control"></textarea>
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
                                            <div class="row">
                                                <div class="col-lg-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Street</span>
                                                        <input type="text" class="form-control" placeholder="Street name" required="required" name="street" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">GPS</span>
                                                        <input type="text" class="form-control" placeholder="GPS name" name="gps" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Custom file input start -->
                    <section id="custom-file-input">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Product Images</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" name="image_1" accept="image/jpeg, image/jpg" required="required" class="form-file-input" id="inputGroupFile01" aria-describedby="picture">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">First</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    </fieldset>
                                                </div>

                                                <div class="col-md-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" name="image_2" accept="image/jpeg, image/jpg" required="required" class="form-file-input" id="inputGroupFile01" aria-describedby="picture">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">Second</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    </fieldset>
                                                </div>

                                                <div class="col-md-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" name="image_3" accept="image/jpeg, image/jpg" required="required" class="form-file-input" id="inputGroupFile01" aria-describedby="picture">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">Third</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    </fieldset>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" name="image_4" accept="image/jpeg, image/jpg" required="required" class="form-file-input" id="inputGroupFile01" aria-describedby="picture">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">Fourth</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" name="image_5" accept="image/jpeg, image/jpg" required="required" class="form-file-input" id="inputGroupFile01" aria-describedby="picture">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">Five</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    </fieldset>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Custom file input end -->

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