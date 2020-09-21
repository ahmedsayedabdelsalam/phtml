<?php


namespace PHTML\Facades;


use PHTML\Elements\P as PElement;

class P extends Facade
{
    public static function getFacadeAccessor()
    {
        return new PElement();
    }
}