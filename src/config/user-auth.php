<?php

/*
 * UserAuth package configuration
 */
return [

    "login_redirect" => "/",
    
    // Enable / Disable referral module
    "referral" => true,
    "referral_code_length" => 10,

    // crypto configuration files
    "crypto" => [
        "ciphering" => "AES-128-CTR",
        "options" => 0,
        "key" => "SparkoutUserAuth",
        "iv" => "1234567891011121"
    ],

];
