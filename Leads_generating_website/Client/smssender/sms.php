<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC4cc2922f3eee3f69f3196ce3efa304bf';
$token = '15bc9e00802046199fdf40db64e9d4db';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+923402866885',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+12054635741',
        // the body of the text message you'd like to send
        'body' => 'Hello world! Good luck on the bar exam!'
    )
);
?>