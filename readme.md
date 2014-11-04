# Query

![Build Status](http://img.shields.io/travis/formativ/query.svg?style=flat-square)
![Code Quality](http://img.shields.io/scrutinizer/g/formativ/query.svg?style=flat-square)
![Code Coverage](http://img.shields.io/scrutinizer/coverage/g/formativ/query.svg?style=flat-square)
![Version](http://img.shields.io/packagist/v/formativ/query.svg?style=flat-square)
![License](http://img.shields.io/packagist/l/formativ/query.svg?style=flat-square)

A PHP wrapper for [OSQuery](http://osquery.io).

## Example

```php
require "vendor/autoload.php";

use Formativ\Query\BuilderProxy;
use Formativ\Query\RunnerProxy;

$builder = BuilderProxy::select("*")->from("processes")->limit(5);

RunnerProxy::run($builder, function(array $data) {
    // use $data
}, function($error) {
    // log $error
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
