<?php
session_start();
// namespace Verot\Upload;



// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



include_once '../../../../vendor/autoload.php';


$upload_image_location = '../../../Assets/agronomist/images';
$upload_pdf_location = '../../../Assets/agronomist/cvs';

if (
    isset($_FILES['agro_image']) && isset($_FILES['agro_cv']) &&
    isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) &&
    isset($_POST['dob'])  && isset($_POST['district']) &&
    isset($_POST['gender']) && isset($_POST['contact']) && isset($_POST['password']) &&
    isset($_POST['education']) && isset($_POST['certificate']) && isset($_POST['specialize'])
) {
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    // Handle for upload
    $image_handle = new  \Verot\Upload\Upload($_FILES['agro_image']);
    $pdf_handle = new  \Verot\Upload\Upload($_FILES['agro_cv']);

    $agronomist = new \App\Models\Agronomist();

    // Variables
    $name = $_POST['fname'] . " " . $_POST['mname'] . " " . $_POST['lname'];
    $date_birth = $_POST['dob'];
    $district = $_POST['district'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $education = $_POST['education'];
    $certificate = $_POST['certificate'];
    $specialize = $_POST['specialize'];

    $passwrd = password_hash($password, PASSWORD_DEFAULT);

    if ($image_handle->uploaded && $pdf_handle->uploaded) {
        // create rando name 
        $image_name = bin2hex(random_bytes(10));
        $pdf_name = bin2hex(random_bytes(10));

        // uploading files
        $image_handle->file_new_name_body   = $image_name;
        $pdf_handle->file_new_name_body   = $pdf_name;

        $image_handle->process($upload_image_location);
        $pdf_handle->process($upload_pdf_location);

        if ($image_handle->processed && $pdf_handle->processed) {
            // success image upload
            $image_handle->clean();
            $pdf_handle->clean();

            $img_path_full = 'Assets/agronomist/images/' . $image_name . '.' . $image_handle->file_src_name_ext;
            $pdf_path_full = 'Assets/agronomist/cvs/' . $pdf_name . '.' . $pdf_handle->file_src_name_ext;

            // save data to database
            $data = array(
                'agro_name' => $name,
                'agro_birthdate' => $date_birth,
                'agro_gender' => $gender,
                'agro_district' => $district,
                'agro_phone' => $contact,
                'agro_email' => $email,
                'password' => $passwrd,
                'agro_education' => $education,
                'agro_certificate' => $certificate,
                'agro_specialize' => $specialize,
                'agro_cv' => $pdf_path_full,
                'agro_picture' => $img_path_full,
            );

            $agronomist->setData($data);
            $savedData = $agronomist->create();

            if (is_array($savedData)) {
                $response['response_status'] = '501';
                $response['error_type'] = $savedData['error_type'];
                $response['code_number'] = $savedData['code_number'];
                $response['message'] = $savedData['message'];

                $erro = strstr($savedData['message'], 'Duplicate');

                $_SESSION['saveAgronomistError'] = $erro;
                header('Location: ../../addAgronomist.php');
                exit;
            }

            $_SESSION['saveAgronomistSuccess'] = True;
            header('Location: ../../viewAgronomists.php');
            exit;
        } else {
            // Error due to image upload
            // echo 'error : ' . $handle->error;
            $_SESSION['fileAgronomistError'] = True;
            header('Location: ../../addAgronomist.php');
            exit;
        }
    }
} else {
    $_SESSION['agronomistError'] = True;
    header('Location: ../../addAgronomist.php');
    exit;
}
