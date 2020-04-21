# L2Encrypt
LineageII PHP Encryption Library

## Usage
```PHP
<?php

use Blueprint\L2encrypt;

$password = L2encrypt::userPassword('test');
echo $password;

//$b = 'test';
//$e = L2Encrypt::userPassword($b);
//echo $e;

//$userPassword = new L2Encrypt();
//$userEncryptedPassword = $userPassword->userPassword('test');
//echo $userEncryptedPassword;

//$userAnswer = new L2Encrypt();
//$userEncryptedAnswer = $userAnswer->userAnswer('test');
//echo $userEncryptedAnswer;
```
