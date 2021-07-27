<?php
require_once '../../vendor/autoload.php';
require_once './data/getAgronomyData.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once './includes/header.php' ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bwanashamba App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="index.php" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../website/index.php">Website</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container ">
        <div class="card m-5 p-2" style="width: 20rem;">
            <img src="<?= $image ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <?= $data['agro_name'] ?>
                </h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Gender : <?= $data['agro_gender'] ?>
                </li>
                <li class="list-group-item">
                    Date of birth : <?= $data['agro_birthdate'] ?>
                </li>
                <li class="list-group-item">
                    Phone : <?= $data['agro_phone'] ?>
                </li>
                <li class="list-group-item">
                    Email : <?= $data['agro_email'] ?>
                </li>
                <li class="list-group-item">
                    Education : <?= $data['agro_education'] ?>
                </li>
                <li class="list-group-item">
                    Certificate : <?= $data['agro_certificate'] ?>
                </li>
                <li class="list-group-item">
                    Specialize : <?= $data['agro_specialize'] ?>
                </li>
            </ul>
            <div class="card-body">
                <a href="./viewPdf.php?view=<?= $pdf ?>" class="card-link btn btn-sm btn-info">View CV</a>
                <a href="#" class="card-link btn btn-sm btn-success">Update</a>
            </div>
        </div>
    </section>
</body>
<?php include_once './includes/footer.php' ?>

</html>