<?php

function GetContacts(){
    require 'wp-content/themes/Zeitmanagement_Tool/template-parts/connection/api.php';
    require "wp-content/themes/Zeitmanagement_Tool/vendor/autoload.php";
    $headers = array(
        'Accept' => 'application/json',
        'Authorization' => $bexio,
    );
    $client = new \GuzzleHttp\Client();
    $url = 'https://api.bexio.com/2.0/contact';
    try {
    $response = $client->request('GET', $url, array(
        'headers' => $headers,
    ));
    class Contacts{
        public $id;
        public $name;
    }
    $output = $response->getBody()->getContents();
    $output_decoded = json_decode($output);
    $output_filtered = array_filter($output_decoded, function($item){
        if($item->contact_type_id == 1){
            return $item;
        }
    });
    $Array = array_map(function($Obj){
        $Contact = new Contacts();
        $Contact->id=$Obj->id;
        $Contact->name=$Obj->name_1;
        if (!empty($Obj->name_2)) {
            $Contact->name=$Obj->name_2;
            return $Contact;
        } else {
            return $Contact;
        }
    }, $output_filtered);
    return $Array;
    }
    catch (\GuzzleHttp\Exception\BadResponseException $e) {
        // handle exception or api errors.
        print_r($e->getMessage());
    }
}
?>