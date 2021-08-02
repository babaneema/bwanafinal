<?php
session_start();
// namespace Verot\Upload;



// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



include_once '../../../../vendor/autoload.php';


$upload_video_location = '../../../Assets/Learn/videos';
$upload_image_location = '../../../Assets/Learn/images';
$upload_document_location = '../../../Assets/Learn/documents';



if (
    isset($_FILES['learn_video'])  && isset($_FILES['document_learn']) && isset($_FILES['learn_picture']) &&
    isset($_POST['subject']) && isset($_POST['crop']) && isset($_POST['provider'])
) {


    $pdf_handle = new  \Verot\Upload\Upload($_FILES['document_learn']);
    $picture_handle = new  \Verot\Upload\Upload($_FILES['learn_picture']);

    $learn = new \App\Models\Learn();

    // Variables
    $subject = $_POST['subject'];
    $crop = $_POST['crop'];
    $provider = $_POST['provider'];

    $video_name = bin2hex(random_bytes(10));
    $extention  = pathinfo($_FILES["learn_video"]['name'], PATHINFO_EXTENSION);
    $video_name .= '.' . $extention;
    $target_file = $upload_video_location . '/' . $video_name;



    if (
        move_uploaded_file($_FILES["learn_video"]["tmp_name"], $target_file) &&
        $pdf_handle->uploaded &&  $picture_handle->uploaded
    ) {
        // create rando name 
        $pdf_name = bin2hex(random_bytes(10));
        $pict_name = bin2hex(random_bytes(10));

        // uploading files
        $pdf_handle->file_new_name_body   = $pdf_name;
        $picture_handle->file_new_name_body   = $pict_name;

        $pdf_handle->process($upload_document_location);
        $picture_handle->process($upload_image_location);


        if ($pdf_handle->processed && $picture_handle->processed) {
            // success image upload
            $pdf_handle->clean();
            $picture_handle->clean();
            // $pdf_handle->clean();



            $img_path_full = 'Assets/Learn/images/' . $pict_name . '.' . $picture_handle->file_src_name_ext;
            $pdf_path_full = 'Assets/Learn/documents/' . $pdf_name . '.' . $pdf_handle->file_src_name_ext;
            $video_path_full = 'Assets/Learn/videos/' . $video_name;

            // save data to database
            $data = array(
                'subject_name' => $subject,
                'crop_id' => $crop,
                'provider_id' => $provider,
                'video_link' => $video_path_full,
                'picture_link' =>  $img_path_full,
                'pdf_link' => $pdf_path_full,
            );


            $savedData = $learn->create($data);

            if (is_array($savedData)) {

                $_SESSION['saveLearnError'] = $savedData[2];
                header('Location: ../../addLearing.php');
                exit;
            }

            $_SESSION['saveLearnSuccess'] = True;
            header('Location: ../../learn.php');
            exit;
        } else {
            // Error due to image upload
            // echo 'error : ' . $handle->error;
            $_SESSION['fileLearnError'] = True;
            header('Location: ../../addLearing.php');
            exit;
        }
    }
} else {
    $_SESSION['LearnError'] = True;
    header('Location: ../../addLearing.php');
    exit;
}
