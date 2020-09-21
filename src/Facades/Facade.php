<?php

namespace PHTML\Facades;

abstract class Facade
{
    abstract static function getFacadeAccessor();

    public static function __callStatic($method, $arguments)
    {
        $instance = static::getFacadeAccessor();

        return $instance->{$method}(...$arguments);
    }
}