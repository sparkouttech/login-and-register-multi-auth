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
