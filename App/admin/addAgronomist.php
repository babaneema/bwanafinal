<?php

namespace App\Models;

session_start();

include_once '../../vendor/autoload.php';

$address = new Address();
$regions = $address->getAllRegions();
$saveError = '';

// check if there is an error


$saveError = '';
if (isset($_SESSION['agronomistError'])) {
    $saveError = 'Fill all the data fields';
    unset($_SESSION['agronomistError']);
}

if (isset($_SESSION['saveAgronomistError'])) {
    $saveError = $_SESSION['saveAgronomistError'];
    unset($_SESSION['saveAgronomistError']);
}

if (isset($_SESSION['fileAgronomistError'])) {
    $saveError = 'Failded to upload picture and Cv';
    unset($_SESSION['fileAgronomistError']);
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
                            <h3>Agronomists</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="viewAgronomists.php">Agromomists</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
                <form action="php/agronomist/processAddAgronomist.php" method="post" enctype="multipart/form-data">
                    <!-- Basic Information -->
                    <section id="basic-input-groups">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Personal Information</h4>
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
                                                        <span class="input-group-text" id="basic-addon1">First Name</span>
                                                        <input type="text" class="form-control" placeholder="Noel" required="required" name="fname" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Middle Name</span>
                                                        <input type="text" class="form-control" placeholder="John" required="required" name="mname" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Last Name</span>
                                                        <input type="text" class="form-control" placeholder="Makundi" required="required" name="lname" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Date of Birth</span>
                                                        <input type="date" class="form-control" aria-label="dateOfBirth" required="required" name="dob">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
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
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Districs</label>
                                                        <select class="form-select" id="districts" name="district" required="required">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <div class=" mb-3">
                                                        <input class="form-check-input mr-3" type="radio" name="gender" value="Male" id="gender" checked>
                                                        <label class="form-check-label" for="Primary">
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class=" mb-3">
                                                        <input class="form-check-input mr-3" type="radio" value="Female" name="gender" id="gender">
                                                        <label class="form-check-label" for="Primary">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Phone</span>
                                                        <input type="text" class="form-control" placeholder="+2557xxx" min="10" max="12" name="contact" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Email</span>
                                                        <input type="text" class="form-control" placeholder="noel@gmail.com" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Password</span>
                                                        <input type="password" class="form-control" min="8" name="password" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Education Information -->
                    <section id="basic-input-groups">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Education Information</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Education</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="education" required="required">
                                                            <option selected>Choose...</option>
                                                            <option value="Primary Education">Primary Education</option>
                                                            <option value="Ordinary level">Ordinary level</option>
                                                            <option value="Advanced leve">Advanced level</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Certificate</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="certificate">
                                                            <option selected>Choose...</option>
                                                            <option value="Certificate">Certificate</option>
                                                            <option value="Diploma">Diploma</option>
                                                            <option value="Degree">Degree</option>
                                                            <option value="Masters">Masters</option>
                                                            <option value="Phd">Phd</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Specialize</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="specialize" required="required">
                                                            <option selected>Choose...</option>
                                                            <option value="Horticulture">Horticulture</option>
                                                            <option value="Cash Crops">Cash Crops</option>
                                                            <option value="Veterinarian">Veterinarian</option>
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



                    <!-- Custom file input start -->
                    <section id="custom-file-input">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Picture & Cv Upload</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" class="form-file-input" name="agro_cv" required="required" accept="application/pdf" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">
                                                                    Curriculum Vitae (CV)
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    </fieldset>
                                                </div>

                                                <div class="col-md-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" name="agro_image" accept="image/jpeg, image/jpg" required="required" class="form-file-input" id="inputGroupFile01" aria-describedby="picture">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">Picture</span>
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
                    <!-- Education Information -->
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