---
layout: default
permalink: /builders/
title: Builders
---

# Builders

`BuilderProxy` builds objects which build SQL queries against system data. You can see these queries by inspecting a builder instance:

~~~ php
use League\Squery\BuilderProxy;

$builder = BuilderProxy::select("*")
    ->from("processes")
    ->limit(5);

print $builder; // SELECT * FROM "processes" LIMIT 5
~~~

The default builder is based on [Aura.SqlQuery](https://github.com/auraphp/Aura.SqlQuery). This builds SQLite-compatible queries, which make it compatible with [osquery](http://osquery.io). You can construct builders directly:

~~~ php
use League\Squery;

$container = Squery::container();

$builder = $container->resolve("squery/builder");

$builder
    ->select("*")
    ->from("etc_hosts");
~~~
