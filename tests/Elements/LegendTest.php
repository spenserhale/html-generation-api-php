<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\Legend;
use SpenserHale\Html\Test\TestCase;

class LegendTest extends TestCase
{
    /** @test */
    public function it_can_create_a_legend()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<legend></legend>',
            Legend::create()
        );
    }
}
