<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\Button;
use SpenserHale\Html\Test\TestCase;

class ButtonTest extends TestCase
{
    /** @test */
    public function it_can_create_a_button()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button></button>',
            Button::create()
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button type="submit"></button>',
            Button::create()->type('submit')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button value="1"></button>',
            Button::create()->value(1)
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button name="foo"></button>',
            Button::create()->name('foo')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_name_and_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button name="foo" value="bar"></button>',
            Button::create()->name('foo')->value('bar')
        );
    }

    /** @test */
    public function it_can_disable_a_button()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button disabled></button>',
            Button::create()->disabled()
        );
    }
}
