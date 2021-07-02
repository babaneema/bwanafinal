<?php

namespace App\Models;

include_once '../../../../vendor/autoload.php';

$address = new Address();


if (isset($_POST['region_id'])) {

    $districs = $address->geDistrictsByRegion($_POST['region_id']);
    if (array_key_exists('error_type', $districs)) {
        echo json_encode(array());
    } else {
        echo json_encode($districs);
    }
} else {
    header('Location: ../../index.php');
}
