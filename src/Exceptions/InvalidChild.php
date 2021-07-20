<?php

namespace SpenserHale\Html\Exceptions;

use Exception;
use SpenserHale\Html\HtmlElement;

class InvalidChild extends Exception
{
    public static function childMustBeAnHtmlElementOrAString()
    {
        return new static('The given child should implement `'.HtmlElement::class.'` or be a string');
    }
}
