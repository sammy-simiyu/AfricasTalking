<?php

require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
$username   = "nakurucluster";
$apiKey     = "43deb3f082a21775f30004805af8fe5c01f59d04a0496707126ed219f51ba45b";

// Initialize the SDK
$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms        = $AT->sms();

// Set the numbers you want to send to in international format
$recipients = $_POST['recipient'];

// Set your message
$message    = $_POST['message'];

// Set your shortCode or senderId
$from       = NULL;

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        'from'    => $from
    ]);

    print_r($result);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}
