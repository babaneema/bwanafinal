<?php

// var_dump($_GET['learn_id']);
// die();
$id = 0;
isset($_GET['learn_id']) ? $id = $_GET['learn_id'] : header('Location: index.php');

$learn = new \App\Models\Learn();
$singleData = $learn->singeleLearn($id);
$image = '../' . $singleData[0]['picture_link'];
$video = '../' . $singleData[0]['video_link'];
$pdf = '../' . $singleData[0]['pdf_link'];
