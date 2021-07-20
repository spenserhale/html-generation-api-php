<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\Img;
use SpenserHale\Html\Test\TestCase;

class ImgTest extends TestCase
{
    /** @test */
    public function it_can_create_an_img()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<img>',
            Img::create()
        );
    }

    /** @test */
    public function it_can_create_an_img_with_an_alt_attribute()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<img alt="Sleepy koala">',
            Img::create()->alt('Sleepy koala')
        );
    }

    /** @test */
    public function it_can_create_an_img_with_a_src_attribute()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<img src="sleepy-koala.jpg">',
            Img::create()->src('sleepy-koala.jpg')
        );
    }
}
