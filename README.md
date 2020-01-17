# WPNonce OOPS 

Simple WordPress Nonce object.

## Table Of Contents

* [Installation](#installation)
* [Usage](#usage)
* [License](#license)
* [Contributing](#contributing)

## Installation

The best way to use this package is through Composer:
Extract the files and copy in vendor folder

```BASH
$ composer dumpautoload
```

Run the tests:
Change the WordPress in WpnonceOopsTest.php
require('../../wp-blog-header.php');

```sh
$ vendor/bin/phpunit
```

### Requirements

This package requires PHP 7.0 or higher.

## Usage

```php
<?php

namespace WpnonceOops;

$wn = new WpnonceOops;

// create nonce object
//public function generateNonce($action);

$action = 'url-post';
$field = 'form_generate_nonce';
$nonce = $wn->generateNonce($action);

// get nonce form field
//public function creatNonceField($action, $field);

// get nonce url
//public function createNonceUrl( $actionurl, $action, $name );
$actionurl = 'test.php?';
$url = $wn->createNonceUrl( $actionurl, $action, '_wpnonce' );

// verify nonce
//public function verifyNonce($action, $field);
$verify_nonce =  $wn->verifyNonce( $nonce, $action);

```

## License

Copyright (c) 2020 Skumar


## Contributing

All feedback / bug reports / pull requests are welcome.



