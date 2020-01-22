# WPNonce OOPS 

Simple WordPress Nonce package that serves the purpose of working with Wordpress Nonces in an object oriented way. Package also comes with Unit Tests to test the nonces. The tests use Brain\Monkey to run and pass in isolation.

## Table Of Contents

* [Installation](#installation)
* [Usage](#usage)
* [License](#license)
* [Contributing](#contributing)

## Installation

The best way to use this package is through Composer:
Extract the files and copy in vendor folder

```BASH
$ composer install or update
```

Run the tests:

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
$action = 'url-post';
$nonce = $wn->generateNonce($action);

// get nonce url
$actionurl = 'test.php?';
$url = $wn->createNonceUrl( $actionurl, $action, '_wpnonce' );

// verify nonce
$verify_nonce =  $wn->verifyNonce( $nonce, $action);

// get nonce form field
$field = 'form_generate_nonce';
$field = $wn->creatNonceField($action, $field);

```

## License

Copyright (c) 2020 Skumar


## Contributing

All feedback / bug reports / pull requests are welcome.



