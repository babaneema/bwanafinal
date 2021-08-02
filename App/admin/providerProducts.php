<?php
include_once '../../vendor/autoload.php';
include_once './php/service/getServiceProviderData.php';
$pass = '';
isset($_GET['pass']) ? $pass = $_GET['pass'] : header('Location: ./index.php');
$provider_data = $serviceProvider->getAllByColumn('provider_unique', $pass);
if (!is_array($provider_data)) header('Location: ./index.php');

include_once './php/service/getServiceProdiverProduct.php';
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
                                    <li class="breadcrumb-item"><a href="serviceprovider.php">Service Provider</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Product Data
                        </div>
                        <div class="card-body">
                            <a href="addServiceProduct.php?pass=<?= $provider_data[0]['provider_unique'] ?>" class="btn btn-sm btn-success">
                                Add
                            </a>
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>District</th>
                                        <th>Street</th>
                                        <th>GPS</th>
                                        <th>Function</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 0;
                                    foreach ($serviceProductData as $servProd) {
                                    ?>
                                        <tr>
                                            <td><?= ++$n ?></td>
                                            <td><?= $servProd['pro_name'] ?></td>
                                            <td><?= $servProd['pro_type'] ?></td>
                                            <td><?= $servProd['district_name'] ?></td>
                                            <td><?= $servProd['prod_street'] ?></td>
                                            <td><?= $servProd['prod_gps'] ?></td>
                                            <td>
                                                View | Update
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