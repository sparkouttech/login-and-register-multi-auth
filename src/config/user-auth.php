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

    "login_type" => "phone",
    "twilio_sid" => "AC5ecccf66454d3cf4cdd102dcd049790a",
    "twilio_token" =>"6a1d37fec1bd7a3cff603242211e183d",
    "twilio_from" =>"+919500878623",


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
