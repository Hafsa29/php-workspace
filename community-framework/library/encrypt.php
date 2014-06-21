<?php

class Encrypt{
	private $securekey, $iv;
    
    public function __construct($key = '') {
    	if($key === ''){
    		global $config;
    		$key = $config['encryption_key'];
    	}
        $this->securekey = hash('sha256',$key,TRUE);
        $this->iv = mcrypt_create_iv(10);
    }
    public function encode($input) {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->securekey, $input, MCRYPT_MODE_ECB, $this->iv));
    }
    public function decode($input) {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->securekey, base64_decode($input), MCRYPT_MODE_ECB, $this->iv));
    }
}