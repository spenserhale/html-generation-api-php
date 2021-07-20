<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\Select;
use SpenserHale\Html\Test\TestCase;

class SelectTest extends TestCase
{
    /** @test */
    public function it_can_render_an_empty_version_itself()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select></select>',
            Select::create()->render()
        );
    }

    /** @test */
    public function it_can_render_options()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
            </select>',
            Select::create()->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_have_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
                <option selected value="value2">text2</option>
            </select>',
            Select::create()
                ->options(['value1' => 'text1', 'value2' => 'text2'])
                ->value('value2')
                ->render()
        );
    }

    /** @test */
    public function it_can_have_a_placeholder_option()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="" selected="selected">Placeholder</option>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::create()
                ->options(['value1' => 'text1', 'value2' => 'text2'])
                ->placeholder('Placeholder')
                ->render()
        );
    }

    /** @test */
    public function it_doesnt_select_the_placeholder_if_something_has_already_been_selected()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="">Placeholder</option>
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::create()
                ->options(['value1' => 'text1', 'value2' => 'text2'])
                ->value('value1')
                ->placeholder('Placeholder')
                ->render()
        );
    }

    /** @test */
    public function it_can_have_a_multiple_option()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3">text3</option>
            </select>',
            Select::create()
                ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                ->multiple()
                ->render()
        );
    }

    /** @test */
    public function it_can_convert_multiple_select_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple" name="foo[]">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3">text3</option>
            </select>',
            Select::create()
                  ->name('foo')
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->multiple()
                  ->render()
        );
    }

    /** @test */
    public function it_can_have_multiple_values()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
            Select::create()
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->value(['value1', 'value3'])
                  ->multiple()
                  ->render()
        );
    }

    /** @test */
    public function it_can_have_one_multiple_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
            Select::create()
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->value('value3')
                  ->multiple()
                  ->render()
        );
    }

    /** @test */
    public function it_can_have_an_optgroup()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <optgroup label="Cats">
                    <option value="leopard">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel">Spaniel</option>
                </optgroup>
            </select>',
            Select::create()
                ->options(['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']])
                ->render()
        );
    }

    /** @test */
    public function it_can_select_an_item_in_an_optgroup()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <optgroup label="Cats">
                    <option value="leopard" selected="selected">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel">Spaniel</option>
                </optgroup>
            </select>',
            Select::create()
                ->options(['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']])
                ->value('leopard')
                ->render()
        );
    }

    /** @test */
    public function it_can_create_a_disabled_select()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select disabled>
                <option value="value1">text1</option>
            </select>',
            Select::create()->disabled()->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_create_a_select_that_is_disabled_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select disabled>
                <option value="value1">text1</option>
            </select>',
            Select::create()->disabled(true)->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_wont_create_a_select_that_is_disabled_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
            </select>',
            Select::create()->disabled(false)->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_create_a_select_that_has_autofocus()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select autofocus>
                <option value="value1">text1</option>
            </select>',
            Select::create()->autofocus()->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_create_a_select_that_has_autofocus_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select autofocus>
                <option value="value1">text1</option>
            </select>',
            Select::create()->autofocus(true)->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_wont_create_a_select_that_has_autofocus_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
            </select>',
            Select::create()->autofocus(false)->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_create_a_select_that_is_required()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select required>
                <option value="value1">text1</option>
            </select>',
            Select::create()->required()->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_create_a_select_that_is_required_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select required>
                <option value="value1">text1</option>
            </select>',
            Select::create()->required(true)->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_wont_create_a_select_that_is_required_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
            </select>',
            Select::create()->required(false)->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_create_a_select_that_is_readonly()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select readonly>
                <option value="value1">text1</option>
            </select>',
            Select::create()->readonly()->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_create_a_select_that_is_readonly_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select readonly>
                <option value="value1">text1</option>
            </select>',
            Select::create()->readonly(true)->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_wont_create_a_select_that_is_readonly_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
            </select>',
            Select::create()->readonly(false)->options(['value1' => 'text1'])->render()
        );
    }
}
