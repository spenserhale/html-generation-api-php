<?php

namespace SpenserHale\Html\Test\Html;

class TelTest extends TestCase
{
    /** @test */
    public function it_can_create_a_tel_link()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a href="tel:+19999999999">+19999999999</a>',
            $this->html->tel('+19999999999')
        );
    }

    /** @test */
    public function it_can_create_a_tel_link_with_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a href="tel:+19999999999">Call me</a>',
            $this->html->tel('+19999999999', 'Call me')
        );
    }
}
