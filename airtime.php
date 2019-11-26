<?php
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
$username = "AT_USERNAME";
$apiKey   = "AT_KEY";

// Initialize the SDK
$AT       = new AfricasTalking($username, $apiKey);

// Get the airtime service
$airtime  = $AT->airtime();

// Set the phone number, currency code and amount in the format below
$recipients = [[
    "phoneNumber"  => "+254728874***",
    "currencyCode" => "KES",
    "amount"       => 1
]];

try {
    // That's it, hit send and we'll take care of the rest
    $results = $airtime->send([
        "recipients" => $recipients
    ]);

    print_r($results);
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
