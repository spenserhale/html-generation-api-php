<?php

namespace SpenserHale\Html\Test\Html;

class FileTest extends TestCase
{
    /** @test */
    public function it_can_create_a_file_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file">',
            $this->html->file()
        );
    }

    /** @test */
    public function it_can_create_a_file_input_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="archives" type="file" name="archives">',
            $this->html->file('archives')
        );
    }
}
