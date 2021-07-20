<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\I;
use SpenserHale\Html\Test\TestCase;

class ITest extends TestCase
{
    /** @test */
    public function it_can_create_an_i_element()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<i></i>',
            I::create()
        );
    }
}
