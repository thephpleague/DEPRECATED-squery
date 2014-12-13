<?php

use Simple\Interfaces\Container;

return [
    "squery/builder/quoter" => function () {
        return new Aura\SqlQuery\Quoter('"', '"');
    },
    "squery/builder/select" => function (Container $container) {
        return new Aura\SqlQuery\Sqlite\Select(
            $container->resolve("squery/builder/quoter")
        );
    },
    "squery/builder" => function (Container $container) {
        return new League\Squery\Builder\AuraBuilder(
            $container->resolve("squery/builder/select")
        );
    },
    "squery/runner" => function () {
        return new League\Squery\Runner\ProcessRunner();
    },
    "squery/process" => function (Container $container) {
        return new League\Squery\Process\SymfonyProcess(
            $container->resolve("squery/process/process")
        );
    },
    "squery/process/process" => function () {
        return new Symfony\Component\Process\Process("echo");
    }
];
