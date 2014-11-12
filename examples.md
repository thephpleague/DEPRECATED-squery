---
layout: default
permalink: /examples/
title: Examples
---

# Examples

The simplest way to fetch data is using `BuilderProxy` and `RunnerProxy`:

~~~ php
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
~~~
