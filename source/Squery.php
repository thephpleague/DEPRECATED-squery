<?php

namespace League;

class Squery
{

    protected static $provider;

    protected static $shared = [];

    protected static $bound = [];

    protected function __construct()
    {

    }

    protected function __clone()
    {

    }

    protected static function getProvider()
    {
        if (static::$provider === null) {
            $provider = new Container(new Factory);

            $provider->params["squery.builder"]["provider"] = $provider->lazyNew("squery.select");

            $provider->params["squery.select"]["quoter"] = $provider->lazyNew("squery.quoter");

            $provider->params["squery.quoter"]["quote_name_prefix"] = '"';
            $provider->params["squery.quoter"]["quote_name_suffix"] = '"';

            static::$provider = $provider;
        }
    }

    public static function get($key)
    {
        return static::$provider->get($key);
    }

    public static function set($key, $value)
    {
    }
}
