<?php
// Reads the variables sent via POST from our gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to Bank of Bla Bla \n";
    $response .= "1. My Account \n";
    $response .= "2. My Credit Limit";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Choose account information you want to view \n";
    $response .= "1. Account number \n";
    $response .= "2. Account balance";

} else if ($text == "2") {
  $creditLimit = 500000;
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Your Credit Limit is ".$creditLimit;

} else if($text == "1*1") {
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "ACC*********";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your account number is ".$accountNumber;

} else if ( $text == "1*2" ) {
    // This is a second level response where the user selected 1 in the first instance
    $balance  = "KES 100,000";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your balance is ".$balance;
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
