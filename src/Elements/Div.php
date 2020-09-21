<?php

namespace PHTML\Elements;


class Div extends Element
{
    public function render(): string
    {
        return "<div {$this->getAttributesString()}>{$this->innerHtml}</div>";
    }
}