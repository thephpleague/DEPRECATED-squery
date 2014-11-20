<?php

namespace League;

use Aura\SqlQuery\Quoter;
use Aura\SqlQuery\Sqlite\Select;
use League\Squery\Builder\AuraBuilder;
use League\Squery\Process\SymfonyProcess;
use League\Squery\Runner\ProcessRunner;
use Pimple\Container;
use Symfony\Component\Process\Process;

class Squery
{
    /**
     * @param Container $container
     */
    protected static function registerBuilder(Container $container)
    {
        $container["squery/builder/quoter"] = function () {
            return new Quoter('"', '"');
        };

        $container["squery/builder/select"] = function ($container) {
            return new Select(
                $container["squery/builder/quoter"]
            );
        };

        $container["squery/builder"] = function ($container) {
            return new AuraBuilder(
                $container["squery/builder/select"]
            );
        };
    }

    /**
     * @param Container $container
     */
    protected static function registerRunner(Container $container)
    {
        $container["squery/runner"] = function () {
            return new ProcessRunner();
        };
    }

    /**
     * @param Container $container
     */
    protected static function registerProcess(Container $container)
    {
        $container["squery/process"] = function ($container) {
            return new SymfonyProcess(
                $container["squery/process/process"]
            );
        };

        $container["squery/process/process"] = function () {
            return new Process("echo");
        };
    }

    /**
     * @return Container
     */
    public static function container()
    {
        static $container = null;

        if ($container === null) {
            $container = new Container();

            static::registerBuilder($container);
            static::registerRunner($container);
            static::registerProcess($container);
        }

        return $container;
    }

    /**
     * @param string $message
     */
    public static function depreciate($message)
    {
        trigger_error($message, E_USER_WARNING);
    }
}
