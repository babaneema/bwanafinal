<?php

// var_dump($_GET['learn_id']);
// die();
$id = 0;
isset($_GET['learn_id']) ? $id = $_GET['learn_id'] : header('Location: index.php');

$agronomists = new \App\Models\Learn();
$singleData = $agronomists->singeleLearn($id);
$image = '../' . $singleData['picture_link'];
$video = '../' . $singleData['video_link'];
$pdf = '../' . $singleData['pdf_link'];
