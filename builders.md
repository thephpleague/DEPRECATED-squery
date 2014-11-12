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

The default builder is based on [Aura.Sql](https://github.com/auraphp/Aura.Sql). This builds SQLite-compatible queries, which make it compatible with [osquery](http://osquery.io). You can construct builders directly:

~~~ php
use League\Squery\Factory\BuilderFactory;

$factory = new BuilderFactory();

$builder = $factory->newInstance();

$builder
    ->select("*")
    ->from("etc_hosts");
~~~
