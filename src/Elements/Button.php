<?php

namespace PHTML\Elements;


class Button extends Element
{
    public function render(): string
    {
        return "<button {$this->getAttributesString()}>{$this->innerHtml}</button>";
    }
}