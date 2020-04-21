# L2encrypt

LineageII PHP Encryption Library.

## Installation

```
composer require blueprint/l2encrypt
```

## Usage

```PHP
<?php

require __DIR__ . '/vendor/autoload.php';

use Blueprint\L2encrypt;

$value = 'EncryptMe';

$encryptedValue = L2encrypt::encrypt($value);
echo $encryptedValue; // Output: 0x35d069fe4fe03fe6f7dbb4b578e2c4c4
```

### Aliases 

```userPassword``` & ```userAnswer``` is a alias for the main method ```encrypt```.

```PHP
<?php

require __DIR__ . '/vendor/autoload.php';

use Blueprint\L2encrypt;

$_POST['password'] = 'test';
$password = $_POST['password'];

$encryptedPassword = L2encrypt::userPassword($password);
echo $encryptedPassword; // Output: 0xb53b56edac3b1d1d28b197975ac0e6e6
```

```PHP
<?php

require __DIR__ . '/vendor/autoload.php';

use Blueprint\L2encrypt;

$_POST['answer'] = 'LineageLover';
$answer = $_POST['answer'];

$encryptedAnswer = L2encrypt::userAnswer($answer);
echo $encryptedAnswer; // Output: 0xa51f521f9e296f8a57d71d65a8321414
```

## Credits
- Unknown Author

## License
[MIT](https://choosealicense.com/licenses/mit/)
