<?php

/*
 * UserMultiAuth package configuration
 */
return [

    "login_redirect" => "/",

    // Enable / Disable referral module
    "referral" => true,
    "referral_code_length" => 10,

     /*
     * Phone Status
     * email,phone,username
     */

    "login_type" => "email",
    "twilio_sid" => "AC336753576ed6dd20905d771c00e847b5",
    "twilio_token" =>"c942916bba31b45ed1593908b29a4414",
    "twilio_from" =>"+15704058916",


    /*
     * Phone Status
     */
    'phone_status' => false,
    /*
    * Registration Verification Status
    */
    'register_verification' => true,

    // crypto configuration files
    "crypto" => [
        "ciphering" => "AES-128-CTR",
        "options" => 0,
        "key" => "SparkoutUserMultiAuth",
        "iv" => "1234567891011121"
    ],

];
