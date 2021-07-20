<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\Optgroup;
use SpenserHale\Html\Test\TestCase;

class OptgroupTest extends TestCase
{
    /** @test */
    public function it_can_create_an_optgroup()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<optgroup></optgroup>',
            Optgroup::create()
        );
    }

    /** @test */
    public function it_can_create_an_element_with_a_label()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<optgroup label="Cats"></optgroup>',
            Optgroup::create()->label('Cats')
        );
    }

    /** @test */
    public function it_can_disable_an_optgroup()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<optgroup disabled></optgroup>',
            Optgroup::create()->disabled()
        );
    }
}
