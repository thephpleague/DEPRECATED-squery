---
layout: default
permalink: /runners/
title: Runners
---

# Runners

`RunnerProxy` builds objects which send builder queries to the [osquery](http://osquery.io) command-line utility:

~~~ php
use League\Squery\RunnerProxy;

RunnerProxy::run($builder, function(array $rows) {
    // inspect $rows
}, function($error) {
    // log $error
});
~~~

The underlying runner will get the SQL query and send it to the command-line utility, returning CSV data. You can construct runners directly:

~~~ php
use League\Squery;

$container = Squery::container();

$builder = $container->resolve("squery/runner");

$runner->run($builder, function(array $rows) {}, function($error) {});
~~~
