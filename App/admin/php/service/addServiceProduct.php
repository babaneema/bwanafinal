<?php
session_start();
// namespace Verot\Upload;



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include_once '../../../../vendor/autoload.php';

// include_once '../../../sms/sendSms.php';



$upload_image_location = '../../../Assets/serviceProvider/images';


if (
    isset($_FILES['image_1']) && isset($_FILES['image_2']) && isset($_FILES['image_3']) &&
    isset($_FILES['image_4']) && isset($_FILES['image_5']) &&  isset($_POST['check']) &&
    isset($_POST['name']) && isset($_POST['business_type']) && isset($_POST['info']) &&
    isset($_POST['district'])  && isset($_POST['street']) && isset($_POST['gps'])
) {
    // $email = isset($_POST['email']) ? $_POST['email'] : null;

    // Handle for upload

    $image_handle_1 = new  \Verot\Upload\Upload($_FILES['image_1']);
    $image_handle_2 = new  \Verot\Upload\Upload($_FILES['image_2']);
    $image_handle_3 = new  \Verot\Upload\Upload($_FILES['image_3']);
    $image_handle_4 = new  \Verot\Upload\Upload($_FILES['image_4']);
    $image_handle_5 = new  \Verot\Upload\Upload($_FILES['image_5']);

    $serviceProvider = new \App\Models\ServiceProvider();
    $serviceProviderProduct = new \App\Models\ServiceProviderProduct();

    // Variables
    $check = $_POST['check'];
    $name = $_POST['name'];
    $business_type = $_POST['business_type'];
    $info = $_POST['info'];
    $district = $_POST['district'];
    $street = $_POST['street'];
    $gps = $_POST['gps'];

    // check if not temper
    $provider_data = $serviceProvider->getAllByColumn('provider_unique', $check);
    if (!is_array($provider_data)) header('Location: ../../index.php');

    if (
        $image_handle_1->uploaded && $image_handle_2->uploaded &&
        $image_handle_3->uploaded && $image_handle_4->uploaded && $image_handle_5->uploaded
    ) {

        // create rando name 
        $image_name_1 = bin2hex(random_bytes(20));
        $image_name_2 = bin2hex(random_bytes(20));
        $image_name_3 = bin2hex(random_bytes(20));
        $image_name_4 = bin2hex(random_bytes(20));
        $image_name_5 = bin2hex(random_bytes(20));

        // uploading files
        $image_handle_1->file_new_name_body   = $image_name_1;
        $image_handle_2->file_new_name_body   = $image_name_2;
        $image_handle_3->file_new_name_body   = $image_name_3;
        $image_handle_4->file_new_name_body   = $image_name_4;
        $image_handle_5->file_new_name_body   = $image_name_5;

        $image_handle_1->process($upload_image_location);
        $image_handle_2->process($upload_image_location);
        $image_handle_3->process($upload_image_location);
        $image_handle_4->process($upload_image_location);
        $image_handle_5->process($upload_image_location);


        if (
            $image_handle_1->processed && $image_handle_2->processed &&
            $image_handle_3->processed && $image_handle_4->processed &&
            $image_handle_5->processed
        ) {
            // success image upload
            $image_handle_1->clean();
            $image_handle_2->clean();
            $image_handle_3->clean();
            $image_handle_4->clean();
            $image_handle_5->clean();


            $img_path_1 = 'Assets/serviceProvider/images/' . $image_name_1 . '.' . $image_handle_1->file_src_name_ext;
            $img_path_2 = 'Assets/serviceProvider/images/' . $image_name_2 . '.' . $image_handle_2->file_src_name_ext;
            $img_path_3 = 'Assets/serviceProvider/images/' . $image_name_3 . '.' . $image_handle_3->file_src_name_ext;
            $img_path_4 = 'Assets/serviceProvider/images/' . $image_name_4 . '.' . $image_handle_4->file_src_name_ext;
            $img_path_5 = 'Assets/serviceProvider/images/' . $image_name_5 . '.' . $image_handle_5->file_src_name_ext;

            $allImages = $img_path_1 . ',' . $img_path_2 . ',' . $img_path_3 . ',';
            $allImages .= $img_path_4 . ',' . $img_path_5;

            $token = uniqid();

            // save data to database

            $data = array(
                'provider_id' => $provider_data[0]['provider_id'],
                'pro_name' => $name,
                'pro_type' => $business_type,
                'prod_district' => $district,
                'prod_street' => $street,
                'prod_gps' => $gps,
                'prod_info' => $info,
                'prod_images' => $allImages,
                'agro_certificate' => $certificate,
                'agro_specialize' => $specialize,
                'agro_cv' => $pdf_path_full,
                'agro_picture' => $img_path_full,
                'agro_unique' => $token,
            );

            $savedData = $serviceProviderProduct->create($data);

            if (is_array($serviceProviderSavedData)) {
                $_SESSION['saveServiceProvideProductError'] = $savedData[2];
                header('Location: ../../addServiceProduct.php');
                exit;
            }


            $_SESSION['saveServiceProvideProductSuccess'] = True;
            header('Location: ../../providerProducts.php?pass=' . $check);
            exit;
        } else {
            $_SESSION['fileserviceproductError'] = True;
            header('Location: ../../addServiceProduct.php');
            exit;
        }
    }
} else {
    $_SESSION['serviceProductError'] = True;
    header('Location: ../../addServiceProduct.php');
    exit;
}
