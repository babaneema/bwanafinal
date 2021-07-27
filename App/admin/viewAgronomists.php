<?php
require_once '../../vendor/autoload.php';
require_once './php/agronomist/getAllAgromistData.php';
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
                            <h3>Agronomist</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="viewAgronomists.php">Agronomist</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Agronomists Data
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Specialization</th>
                                        <th>Function</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 0;
                                    foreach ($agromonistData as $agroData) {
                                    ?>
                                        <tr>
                                            <td><?= ++$n ?></td>
                                            <td><?= $agroData['agro_name'] ?></td>
                                            <td><?= $agroData['agro_gender'] ?></td>
                                            <td><?= $agroData['agro_specialize'] ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-info">
                                                    rate
                                                </button>
                                                <button class="btn btn-sm btn-success">
                                                    Update
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    Deactivate
                                                </button>
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