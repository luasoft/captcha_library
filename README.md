Introduction
============

Captcha package for Laravel framework 4.x

![Captcha Examples](https://lh4.googleusercontent.com/-fiXbHMhiZCg/VGyz4AlbnPI/AAAAAAAAC1s/ihyOGOAy5iY/h88/captcha_examples.png)


Installation
============

Modify composer.json :

```
{
    ...
    "require": {
        "luacap/captcha": "dev-master"
    }
}
```

Usage
=====

Show captcha image:

```php
<?php

use Luacap\Captcha\LuacapCaptcha;

$captcha = new LuacapCaptcha;
$captcha->getCaptchaImage();
```

Validation captcha:

```php
<?php

if ($_SESSION['luacap_captcha_code'] == Input::get('input_code') {
	// passed
} else {
	// wrong
}
```
