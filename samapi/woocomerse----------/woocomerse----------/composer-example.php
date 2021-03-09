<?php // Root namespace for now. See Issue #85

use WC_API_Client;
use WC_API_Client_Exception;

$options = array(
    'debug'           => true,
    'return_as_array' => false,
    'validate_url'    => false,
    'timeout'         => 30,
    'ssl_verify'      => false,
);

try {
    $client = new WC_API_Client(
        'http://localhost:88/phpprojects/careandcure',
        'ck_ed78ce9b88b1906cabee0fded8b3c3d45bb333b8',
        'cs_b4e6d86bfdcfc04c3812396b6912dba988a18046',
        $options
    );
	
	 

    // index
    //print_r($client->index->get());
    
    // For other endpoints, see example.php
    
} catch (WC_API_Client_Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;

    if ($e instanceof WC_API_Client_HTTP_Exception) {
        print_r($e->get_request());
        print_r($e->get_response());
    }
}
