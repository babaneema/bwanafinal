<?php
function sendSms($number, $massage)
{
    $request = new HTTP_Request2();
    $request->setUrl('https://messaging-service.co.tz/api/sms/v1/text/single');
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
        'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
        'Authorization' => 'Basic anVtYXBpbGk5OkxvdmVANjgwOQ==',
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
    ));

    $data = array(
        "from" => "NEXTSMS",
        "to" => $number,
        "text" => $massage
    );

    $send = json_encode($data);
    $request->setBody($send);
    try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
            // echo $response->getBody();
            return true;
        } else {
            // echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            //     $response->getReasonPhrase();
            return false;
        }
    } catch (HTTP_Request2_Exception $e) {
        // echo 'Error: ' . $e->getMessage();
        return false;
    }
}
