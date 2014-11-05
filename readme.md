# Query

![Build Status](http://img.shields.io/travis/formativ/query.svg?style=flat-square)
![Code Quality](http://img.shields.io/scrutinizer/g/formativ/query.svg?style=flat-square)
![Code Coverage](http://img.shields.io/scrutinizer/coverage/g/formativ/query.svg?style=flat-square)
![Version](http://img.shields.io/packagist/v/formativ/query.svg?style=flat-square)
![License](http://img.shields.io/packagist/l/formativ/query.svg?style=flat-square)

A PHP wrapper for [OSQuery](http://osquery.io).

## Example

Simple usage:

```php
use Formativ\Query\BuilderProxy;
use Formativ\Query\RunnerProxy;

$builder = BuilderProxy::select("*")->from("processes")->limit(5);

RunnerProxy::run($builder, function(array $data) {
    // use $data
}, function($error) {
    // log $error
});
```

Custom factories:

```php
use Formativ\Query\BuilderProxy;
use Formativ\Query\Factory\BuilderFactory;
use Formativ\Query\Factory\RunnerFactory;
use Formativ\Query\RunnerProxy;

class CustomBuilderFactory extends BuilderFactory
{
    public function newInstance()
    {
        // ...
    }
}

$builder = BuilderProxy::with(new CustomBuilderFactory())->select("*")->from("processes")->limit(5);

class CustomRunnerFactory extends RunnerFactory
{
    public function newInstance()
    {
        // ...
    }
}

RunnerProxy::with(new CustomRunnerFactory())->run($builder, function(array $data) {
    // use $data
}, function($error) {
    // log $error
});
```

- `BuilderProxy::with()` and `BuilderProxy::select()` create new instances of `BuilderProxy`.
- `BuilderProxy::with($factory)` is the same as `new BuilderProxy($factory)`
- `RunnerProxy::with()` and `RunnerProxy::run()` create new instances of `RunnerProxy`.
- `RunnerProxy::with($factory)` is the same as `new RunnerProxy($factory)`

## Installation

```sh
❯ composer require "formativ/query:*"
```

## Testing

```sh
❯ composer create-project "formativ/query:*" .
❯ vendor/bin/phpunit
```
