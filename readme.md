# OSQuery PHP SDK

![Build Status](http://img.shields.io/travis/formativ/query.svg?style=flat-square)
![Code Quality](http://img.shields.io/scrutinizer/g/formativ/query.svg?style=flat-square)
![Code Coverage](http://img.shields.io/scrutinizer/coverage/g/formativ/query.svg?style=flat-square)
![Version](http://img.shields.io/packagist/v/formativ/query.svg?style=flat-square)
![License](http://img.shields.io/packagist/l/formativ/query.svg?style=flat-square)

A PHP wrapper for [OSQuery](http://osquery.io).

## Example

```php
require "vendor/autoload.php";

use Formativ\Query\Builder;
use Formativ\Query\Runner;

$query = Builder::create()->select("path")->from("processes")->limit(5);

Runner::create()->runQuery($query, function($data) {
   print_r($data);
});
```

## Installation

```sh
❯ composer require "formativ/query:*"
```

## Testing

```sh
❯ composer create-project "formativ/query:*" .
❯ vendor/bin/phpunit
```
