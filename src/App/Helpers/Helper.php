<?php


namespace Sparkouttech\UserMultiAuth\App\Helpers;


class Helper
{

    private $ciphering;
    private $encryption_iv;
    private $encryption_key;
    private $options;

    public function __construct()
    {
        $this->ciphering = config('user-auth.crypto.ciphering');
        $this->encryption_iv = config('user-auth.crypto.iv');
        $this->encryption_key = config('user-auth.crypto.key');
        $this->options = config('user-auth.crypto.options');
    }
    public function encrypt($string)
    {
        return openssl_encrypt($string, $this->ciphering, $this->encryption_key, $this->options, $this->encryption_iv);
    }

    public function decrypt($encryptedString)
    {
        return openssl_decrypt ($encryptedString, $this->ciphering,$this->encryption_key, $this->options, $this->encryption_iv);
    }
}
