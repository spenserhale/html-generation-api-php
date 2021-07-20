<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\Label;
use SpenserHale\Html\Test\TestCase;

class LabelTest extends TestCase
{
    /** @test */
    public function it_can_create_a_label()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<label></label>',
            Label::create()
        );
    }

    /** @test */
    public function it_can_create_a_label_with_a_custom_for_attribute()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<label for="some_input_id"></label>',
            Label::create()->for('some_input_id')
        );
    }
}
