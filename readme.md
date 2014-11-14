# League\Squery

![Build Status](http://img.shields.io/travis/thephpleague/squery.svg?style=flat-square)
![Code Quality](http://img.shields.io/scrutinizer/g/thephpleague/squery.svg?style=flat-square)
![Code Coverage](http://img.shields.io/scrutinizer/coverage/g/thephpleague/squery.svg?style=flat-square)
![Version](http://img.shields.io/packagist/v/league/squery.svg?style=flat-square)
![License](http://img.shields.io/packagist/l/league/squery.svg?style=flat-square)

PHP wrapper for [osquery](http://osquery.io).

## Example

```php
use League\Squery\BuilderProxy;
use League\Squery\RunnerProxy;

$builder = BuilderProxy::select("*")
    ->from("processes")
    ->limit(5);

RunnerProxy::run($builder, function(array $rows) {
    $headings = array_shift($rows);

    foreach ($rows as $row) {
        foreach ($row as $i => $column) {
            print $headings[$i] . ": " . $column . "\n";
        }
    }
}, function($error) {
    print "error: " . $error . "\n";
});
```

More at [squery.thephpleague.com](http://squery.thephpleague.com/examples).

## Installation

```sh
❯ composer require "league/squery:~2.0.0"
```

## Testing

```sh
❯ composer create-project "league/squery:~2.0.0" .
❯ vendor/bin/phpunit
```
