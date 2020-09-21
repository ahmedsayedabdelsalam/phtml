<?php


namespace PHTML\Facades;


use PHTML\Elements\Div as DivAlias;

class Div extends Facade
{
    public static function getFacadeAccessor()
    {
        return new DivAlias();
    }
}