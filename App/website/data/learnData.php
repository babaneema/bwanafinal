<?php

$learn = new \App\Models\Learn();

$countData = $learn->count();
$pages = ceil($countData / 10);

var_dump($countData);

if (isset($_GET['crop_id'])) {
    $learnId = $_GET['crop_id'];
    $learnData = $learn->getLearnByCrop($learnId);
}elseif(isset($_GET['page'])){
    $page = $_GET['page'];
    $learnData = $learn->getAllData($page);
}
else {
    $learnData = $learn->getAllData();
}


if (!$learnData) $learnData = [];
