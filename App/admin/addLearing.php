<?php

namespace App\Models;

session_start();

include_once '../../vendor/autoload.php';

$crop = new Crop();
$cropData = $crop->getAllData();
if (!$cropData) $cropData = [];


$provider = new ServiceProvider();
$providerData = $provider->getAllData();
if (!$providerData) $providerData = [];

// check if there is an error
$saveError = '';
if (isset($_SESSION['LearnError'])) {
    $saveError = 'Fill all the data fields';
    unset($_SESSION['LearnError']);
}

if (isset($_SESSION['saveLearnError'])) {
    $saveError = $_SESSION['saveLearnError'];
    unset($_SESSION['saveLearnError']);
}

if (isset($_SESSION['fileLearnError'])) {
    $saveError = 'Failded to upload video and picture';
    unset($_SESSION['fileLearnError']);
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
                            <h3>Learning </h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="learn.php">Learn</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
                <form action="./php/learn/processAddLearning.php" method="post" enctype="multipart/form-data">

                    <!-- Education Information -->
                    <section id="basic-input-groups">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Crop Information</h4>
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
                                                        <span class="input-group-text" id="basic-addon1">Subject</span>
                                                        <input type="text" class="form-control" placeholder="Upandaji wa mahindi" required="required" name="subject" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Crop Name</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="crop" required="required">
                                                            <option selected>Choose...</option>
                                                            <?php
                                                            foreach ($cropData as $crp) {
                                                            ?>
                                                                <option value="<?= $crp['id'] ?>">
                                                                    <?= $crp['name'] ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Provided By</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="provider" required="required">
                                                            <option selected>Choose...</option>
                                                            <?php
                                                            foreach ($providerData as $proData) {
                                                            ?>
                                                                <option value="<?= $proData['id'] ?>">
                                                                    <?= $proData['provider_name'] ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
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
                                        <h4 class="card-title">Pdf | Video & Picture</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" class="form-file-input" name="document_learn" required="required" accept="application/pdf" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">
                                                                    Crop Pdf
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
                                                            <input type="file" name="learn_video" required="required" accept="video/mp4" class="form-file-input" id="inputGroupFile01" aria-describedby="picture">
                                                            <label class="form-file-label" for="inputGroupFile01">
                                                                <span class="form-file-text">Choose file...</span>
                                                                <span class="form-file-button">Video</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    </fieldset>
                                                </div>

                                                <div class="col-md-4 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="inputGroupFileAddon01"><i data-feather="upload"></i></span>
                                                        <div class="form-file">
                                                            <input type="file" name="learn_picture" accept="image/jpeg, image/jpg" required="required" class="form-file-input" id="inputGroupFile01" aria-describedby="picture">
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


</body>

</html>