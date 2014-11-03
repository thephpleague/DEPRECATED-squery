<?php

require "vendor/autoload.php";

use Formativ\Query\Builder;
use Formativ\Query\Runner;

$query = Builder::create()->select("path")->from("processes")->limit(5);

Runner::create()->runQuery($query, function($data) {
   print_r($data);
});
