<?php
if(isset($_GET['delete'])) {
    require "../vendor/autoload.php";
    require "../template-parts/connection/api.php";
    $delete = $_GET['delete'];
    $headers = array(
        'Accept' => 'application/json',
        'Authorization' => $bexio,
    );
    $client = new \GuzzleHttp\Client();
    $url = 'https://api.bexio.com/2.0/contact/' . $delete . '/';
    
    try {
        $response = $client->request('DELETE', $url, array(
            'headers' => $headers,
        ));
        
        // print_r($response->getBody()->getContents());
        header('Location: ../../../../kunden/');
    }
    catch (\GuzzleHttp\Exception\BadResponseException $e) {
        // handle exception or api errors.
        print_r($e->getMessage());
    }
}
?>