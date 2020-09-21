<?php


namespace PHTML\Facades;


use PHTML\Elements\Button as ButtonElement;

class Button extends Facade
{
    public static function getFacadeAccessor()
    {
        return new ButtonElement();
    }
}