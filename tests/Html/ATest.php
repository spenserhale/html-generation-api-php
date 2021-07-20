<?php

namespace SpenserHale\Html\Test\Html;

class ATest extends TestCase
{
    /** @test */
    public function it_can_create_an_a_element()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a></a>',
            $this->html->a()
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a href="https://spatie.be"></a>',
            $this->html->a('https://spatie.be')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href_and_text_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a href="https://spatie.be">Spatie</a>',
            $this->html->a('https://spatie.be', 'Spatie')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href_and_html_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a href="https://spatie.be/open-source">Spatie <em>Open Source</em></a>',
            $this->html->a('https://spatie.be/open-source', 'Spatie <em>Open Source</em>')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_target()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a target="_blank"></a>',
            $this->html->a()->target('_blank')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href_and_a_target()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a href="https://spatie.be/open-source" target="_blank"></a>',
            $this->html->a('https://spatie.be/open-source')->target('_blank')
        );
    }
}
