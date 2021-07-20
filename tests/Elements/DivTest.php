<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\Div;
use SpenserHale\Html\Test\TestCase;

class DivTest extends TestCase
{
    /** @test */
    public function it_can_create_a_div()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::create()
        );
    }
}
