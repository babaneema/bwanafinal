<?php
include_once './php/service/getServiceProviderData.php';
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
                            <h3>Service Provider</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Service Provider</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Crops Data
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <th>Function</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 0;
                                    foreach ($serviceData as $sericeP) {
                                    ?>
                                        <tr>
                                            <td><?= ++$n ?></td>
                                            <td><?= $sericeP['provider_name'] ?></td>
                                            <td><?= $sericeP['provider_email'] ?></td>
                                            <td><?= $sericeP[' service_offered '] ?></td>
                                            <td><?= $sericeP[' provider_reg_date '] ?></td>
                                            <td>
                                                <button class="btn btn-primary">Update</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>


        </div>
    </div>


    <?php include_once './includes/footer.php' ?>
</body>

</html>