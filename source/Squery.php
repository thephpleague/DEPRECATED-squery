<?php

namespace League;

use Simple\Container;

class Squery
{
    /**
     * @return Container
     */
    public static function container()
    {
        static $container = null;

        if ($container === null) {
            $container = new Container();

            $defaults = require("defaults.php");

            foreach ($defaults as $key => $factory) {
                $container->bind($key, $factory);
            }
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
