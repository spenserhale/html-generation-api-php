<?php

namespace SpenserHale\Html;

use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Html::class);
    }
}
