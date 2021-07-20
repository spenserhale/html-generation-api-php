<?php

namespace SpenserHale\Html\Test\Html;

class FormTest extends TestCase
{
    /** @test */
    public function it_can_create_a_form()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="POST"></form>',
            $this->html->form()
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_custom_action()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit">'.
                '
            </form>',
            $this->html->form('POST', '/submit')
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_target()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit" target="_blank">'.
            '
            </form>',
            $this->html->form('POST', '/submit')->target('_blank')
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_custom_method_that_gets_spoofed()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form action="/submit" method="POST">'.
                '<input type="hidden" name="_method" id="_method" value="DELETE">'.
                ''.
            '</form>',
            $this->html->form('DELETE', '/submit')
        );
    }

    /** @test */
    public function it_doesnt_render_a_token_field_when_using_a_get_method()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form action="/submit" method="GET"></form>',
            $this->html->form('GET', '/submit')
        );
    }
}
