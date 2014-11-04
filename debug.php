<?php

require "vendor/autoload.php";

use Formativ\Query\BuilderProxy;
use Formativ\Query\RunnerProxy;

$builder = BuilderProxy::select("*")->from("processes")->limit(5);

RunnerProxy::run($builder, function(array $data) {
    print_r($data);
}, function($error) {
    print $error;
});
