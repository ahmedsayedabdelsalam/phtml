<?php

namespace PHTML\Elements;


class P extends Element
{
    public function render(): string
    {
        return "<p {$this->getAttributesString()}>{$this->innerHtml}</p>";
    }
}