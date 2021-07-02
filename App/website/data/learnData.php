<?php

$learn = new \App\Models\Learn();



if (isset($_GET['crop_id'])) {
    $learnId = $_GET['crop_id'];
    $learnData = $learn->getLearnByCrop($learnId);
} else {
    $learnData = $learn->getAllData();
}

if (!$learnData) $learnData = [];
