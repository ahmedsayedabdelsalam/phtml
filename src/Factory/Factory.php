<?php

namespace PHTML\Factory;

use PHTML\Elements\Button;
use PHTML\Elements\Div;
use PHTML\Elements\Element;
use PHTML\Elements\P;

class Factory
{
    /**
     * @param string $element
     * @param string $text
     * @return Element
     */
    public static function make(string $element, string $text = ''): Element
    {
        switch ($element) {
            case 'div':
                return new Div($text);
            case 'p':
                return new P($text);
            case 'button':
                return new Button($text);
        }
    }

    /**
    * @param string $provider
    * @param string $locale
    * @return string
    */
    protected static function findProviderClassname($provider, $locale = '')
    {
        $providerClass = 'Faker\\' . ($locale ? sprintf('Provider\%s\%s', $locale, $provider) : sprintf('Provider\%s', $provider));
        if (class_exists($providerClass, true)) {
            return $providerClass;
        }
    }
}