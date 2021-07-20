<?php

namespace SpenserHale\Html\Facades;

use Illuminate\Support\Facades\Facade;
use SpenserHale\Html\Html as HtmlBuilder;

class Html extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @see \SpenserHale\Html\Html
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return HtmlBuilder::class;
    }
}
