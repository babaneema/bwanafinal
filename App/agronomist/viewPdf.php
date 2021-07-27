<?php

// Store the file name into variable
(isset($_GET['view'])) ? $file = $_GET['view'] : header('Location: index.php');
// $file = 'filename.pdf';
$filename = 'filename.pdf';

// Header content type
header('Content-type: application/pdf');

header('Content-Disposition: inline; filename="' . $filename . '"');

header('Content-Transfer-Encoding: binary');

header('Accept-Ranges: bytes');

// Read the file
@readfile($file);
