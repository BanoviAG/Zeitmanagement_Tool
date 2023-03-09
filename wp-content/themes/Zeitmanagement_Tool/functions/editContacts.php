<?php
if(isset($_POST['editContact_form'])) {
    require "../vendor/autoload.php";
    require '../template-parts/connection/api.php';
    $company = $_POST['txtCompany'];
    $adress = $_POST['txtAdress'];
    $plz = $_POST['txtPlz'];
    $city = $_POST['txtCity'];
    $edit = $_GET['edit'];
    $headers = array(
        'Accept' => 'application/json',
        'Authorization' => $bexio,
        'Content-Type' => 'application/json',
    );
    
    $client = new \GuzzleHttp\Client();
    
    $request_body = '{
        "contact_type_id": 1,
        "name_1": "' . $company .'",
        "salutation_id": 2,
        "address": "' . $adress .'",
        "postcode": "' . $plz .'",
        "city": "' . $city .'",
        "country_id": 1,
        "mail": "",
        "mail_second": "",
        "phone_fixed": "",
        "phone_fixed_second": "",
        "phone_mobile": "",
        "fax": "",
        "url": "",
        "skype_name": "",
        "remarks": "",
        "contact_group_ids": 1,
        "user_id": 1,
        "owner_id": 1,
        "nr": "' . $edit .'"
    }';
    
    $url = 'https://api.bexio.com/2.0/contact/' . $edit . '/';;
    
    try {
        $response = $client->request('POST', $url, array(
            'headers' => $headers,
            'body' => $request_body,
        ));
    
        print_r($response->getBody()->getContents());
    }
    catch (\GuzzleHttp\Exception\BadResponseException $e) {
        // handle exception or api errors.
        print_r($e->getMessage());
    }
}
?>