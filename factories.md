---
layout: default
permalink: /factories/
title: Factories
---

# Factories

<div class="message-warning">Factories were depreciated in 2.3.0. You should use <a href="/services/">services</a> to extend Squery.</div>

You can extend builders and runners by subclassing factories:

~~~ php
use League\Squery\Builder\Builder;
use League\Squery\BuilderProxy;
use League\Squery\Factory\BuilderFactory;
use League\Squery\Factory\RunnerFactory;
use League\Squery\Runner\Runner;
use League\Squery\RunnerProxy;

class CustomBuilderFactory extends BuilderFactory
{
    /**
     * @return Builder
     */
    public function newInstance()
    {
        // ...return a builder
    }
}

$builderFactory = new CustomBuilderFactory()

$builder = BuilderProxy::with($builderFactory)
    ->select("*")
    ->from("processes")
    ->limit(5);

class CustomRunnerFactory extends RunnerFactory
{
    /**
     * @return Runner
     */
    public function newInstance()
    {
        // ...return a runner
    }
}

$runnerFactory = new CustomRunnerFactory();

RunnerProxy::with($runnerFactory)
    ->run($builder, function(array $rows) {}, function($error) {});
~~~

`BuilderProxy` and `RunnerProxy` will check that the custom factories return implementations of `Builder` and `Runner` respectively.
