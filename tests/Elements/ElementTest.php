<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\Element;
use SpenserHale\Html\Exceptions\MissingTag;
use SpenserHale\Html\Test\TestCase;

class ElementTest extends TestCase
{
    /** @test */
    public function it_can_create_an_element_with_a_tag()
    {
        $this->assertEquals(
            '<foo></foo>',
            Element::withTag('foo')
        );
    }

    /** @test */
    public function it_cant_create_an_element_without_a_tag()
    {
        $this->expectException(MissingTag::class);

        Element::create();
    }
}
