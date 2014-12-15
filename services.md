---
layout: default
permalink: /services/
title: Services
---

# Services

<div class="message-notice">Services have replaced factories in 2.3.0.</div>

Squery uses [Simple Container](https://github.com/assertchris/simple-container) to create new dependency instances. You can access the contain with:

~~~ php
use League\Squery;

$container = Squery::container();
~~~

If you would like to substitute your own builders or runners, you can replace their container bindings:


~~~ php
use League\Squery;

$container = Squery::container();

$container->bind("squery/builder", function($container) {
    return new CustomBuilder();
});

$container->bind("squery/runner", function($container) {
    return new CustomRunner();
});
~~~

<div class="message-notice">Squery binds other dependencies but they are implementation details of the default runner and builder. These are the only keys you should need to override.</div>
