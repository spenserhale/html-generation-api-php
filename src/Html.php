<?php

namespace SpenserHale\Html;

use DateTimeImmutable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;
use SpenserHale\Html\Elements\A;
use SpenserHale\Html\Elements\Button;
use SpenserHale\Html\Elements\Div;
use SpenserHale\Html\Elements\Element;
use SpenserHale\Html\Elements\Fieldset;
use SpenserHale\Html\Elements\File;
use SpenserHale\Html\Elements\Form;
use SpenserHale\Html\Elements\I;
use SpenserHale\Html\Elements\Img;
use SpenserHale\Html\Elements\Input;
use SpenserHale\Html\Elements\Label;
use SpenserHale\Html\Elements\Legend;
use SpenserHale\Html\Elements\Option;
use SpenserHale\Html\Elements\Select;
use SpenserHale\Html\Elements\Span;
use SpenserHale\Html\Elements\Textarea;

class Html
{
    use Macroable;

    protected const HTML_DATE_FORMAT = 'Y-m-d';
    protected const HTML_TIME_FORMAT = 'H:i:s';

    /**
     * @param string|null $href
     * @param string|null $contents
     *
     * @return \SpenserHale\Html\Elements\A
     */
    public function a($href = null, $contents = null)
    {
        return A::create()
            ->attributeIf($href, 'href', $href)
            ->html($contents);
    }

    /**
     * @param string|null $href
     * @param string|null $text
     *
     * @return \SpenserHale\Html\Elements\I
     */
    public function i($contents = null)
    {
        return I::create()
            ->html($contents);
    }

    /**
     * @param string|null $type
     * @param string|null $text
     *
     * @return \SpenserHale\Html\Elements\Button
     */
    public function button($contents = null, $type = null, $name = null)
    {
        return Button::create()
            ->attributeIf($type, 'type', $type)
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->html($contents);
    }

    /**
     * @param \Illuminate\Support\Collection|iterable|string $classes
     *
     * @return \Illuminate\Contracts\Support\Htmlable
     */
    public function class($classes): Htmlable
    {
        if ($classes instanceof Collection) {
            $classes = $classes->toArray();
        }

        $attributes = new Attributes();
        $attributes->addClass($classes);

        return new HtmlString(
            $attributes->render()
        );
    }

    /**
     * @param string|null $name
     * @param bool $checked
     * @param string|null $value
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function checkbox($name = null, $checked = null, $value = '1')
    {
        return $this->input('checkbox', $name, $value)
            ->attributeIf(! is_null($value), 'value', $value)
            ->attributeIf((bool) $checked, 'checked');
    }

    /**
     * @param \SpenserHale\Html\HtmlElement|string|null $contents
     *
     * @return \SpenserHale\Html\Elements\Div
     */
    public function div($contents = null)
    {
        return Div::create()->children($contents);
    }

    /**
     * @param string|null $name
     * @param string|null $value
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function email($name = null, $value = null)
    {
        return $this->input('email', $name, $value);
    }

    /**
     * @param string|null $name
     * @param string|null $value
     * @param bool $format
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function date($name = '', $value = null, $format = true)
    {
        $element = $this->input('date', $name, $value);

        if (! $format || empty($element->getAttribute('value'))) {
            return $element;
        }

        return $element->value($this->formatDateTime($element->getAttribute('value'), self::HTML_DATE_FORMAT));
    }

    /**
     * @param string|null $name
     * @param string|null $value
     * @param bool $format
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function datetime($name = '', $value = null, $format = true)
    {
        $element = $this->input('datetime-local', $name, $value);

        if (! $format || empty($element->getAttribute('value'))) {
            return $element;
        }

        return $element->value($this->formatDateTime(
            $element->getAttribute('value'),
            self::HTML_DATE_FORMAT.'\T'.self::HTML_TIME_FORMAT
        ));
    }

    /**
     * @param string|null $name
     * @param string|null $value
     * @param string|null $min
     * @param string|null $max
     * @param string|null $step
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function range($name = '', $value = '', $min = null, $max = null, $step = null)
    {
        return $this->input('range', $name, $value)
            ->attributeIfNotNull($min, 'min', $min)
            ->attributeIfNotNull($max, 'max', $max)
            ->attributeIfNotNull($step, 'step', $step);
    }

    /**
     * @param string|null $name
     * @param string|null $value
     * @param bool $format
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function time($name = '', $value = null, $format = true)
    {
        $element = $this->input('time', $name, $value);

        if (! $format || empty($element->getAttribute('value'))) {
            return $element;
        }

        return $element->value($this->formatDateTime($element->getAttribute('value'), self::HTML_TIME_FORMAT));
    }

    /**
     * @param string $tag
     *
     * @return \SpenserHale\Html\Elements\Element
     */
    public function element($tag)
    {
        return Element::withTag($tag);
    }

    /**
     * @param string|null $type
     * @param string|null $name
     * @param string|null $value
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function input($type = null, $name = null, $value = null)
    {
        $hasValue = $name && ($type !== 'password' && ! is_null($value) || ! is_null($value));

        return Input::create()
            ->attributeIf($type, 'type', $type)
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->attributeIf($name, 'id', $this->fieldName($name))
            ->attributeIf($hasValue, 'value', $value);
    }

    /**
     * @param \SpenserHale\Html\HtmlElement|string|null $legend
     *
     * @return \SpenserHale\Html\Elements\Fieldset
     */
    public function fieldset($legend = null)
    {
        return $legend ?
            Fieldset::create()->legend($legend) : Fieldset::create();
    }

    /**
     * @param string $method
     * @param string|null $action
     *
     * @return \SpenserHale\Html\Elements\Form
     */
    public function form($method = 'POST', $action = null)
    {
        $method = strtoupper($method);
        $form = Form::create();

        // If Laravel needs to spoof the form's method, we'll append a hidden
        // field containing the actual method
        if (in_array($method, ['DELETE', 'PATCH', 'PUT'])) {
            $form = $form->addChild($this->hidden('_method')->value($method));
        }

        return $form
            ->method($method === 'GET' ? 'GET' : 'POST')
            ->attributeIf($action, 'action', $action);
    }

    /**
     * @param string|null $name
     * @param string|null $value
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function hidden($name = null, $value = null)
    {
        return $this->input('hidden', $name, $value);
    }

    /**
     * @param string|null $src
     * @param string|null $alt
     *
     * @return \SpenserHale\Html\Elements\Img
     */
    public function img($src = null, $alt = null)
    {
        return Img::create()
            ->attributeIf($src, 'src', $src)
            ->attributeIf($alt, 'alt', $alt);
    }

    /**
     * @param \SpenserHale\Html\HtmlElement|iterable|string|null $contents
     * @param string|null $for
     *
     * @return \SpenserHale\Html\Elements\Label
     */
    public function label($contents = null, $for = null)
    {
        return Label::create()
            ->attributeIf($for, 'for', $this->fieldName($for))
            ->children($contents);
    }

    /**
     * @param \SpenserHale\Html\HtmlElement|string|null $contents
     *
     * @return \SpenserHale\Html\Elements\Legend
     */
    public function legend($contents = null)
    {
        return Legend::create()->html($contents);
    }

    /**
     * @param string $email
     * @param string|null $text
     *
     * @return \SpenserHale\Html\Elements\A
     */
    public function mailto($email, $text = null)
    {
        return $this->a('mailto:'.$email, $text ?: $email);
    }

    /**
     * @param string|null $name
     * @param iterable $options
     * @param string|iterable|null $value
     *
     * @return \SpenserHale\Html\Elements\Select
     */
    public function multiselect($name = null, $options = [], $value = null)
    {
        return Select::create()
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->attributeIf($name, 'id', $this->fieldName($name))
            ->options($options)
            ->value($value)
            ->multiple();
    }

    /**
     * @param string|null $name
     * @param string|null $value
     * @param string|null $min
     * @param string|null $max
     * @param string|null $step
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function number($name = null, $value = null, $min = null, $max = null, $step = null)
    {
        return $this->input('number', $name, $value)
                ->attributeIfNotNull($min, 'min', $min)
                ->attributeIfNotNull($max, 'max', $max)
                ->attributeIfNotNull($step, 'step', $step);
    }

    /**
     * @param string|null $text
     * @param string|null $value
     * @param bool $selected
     *
     * @return \SpenserHale\Html\Elements\Option
     */
    public function option($text = null, $value = null, $selected = false)
    {
        return Option::create()
            ->text($text)
            ->value($value)
            ->selectedIf($selected);
    }

    /**
     * @param string|null $value
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function password($name = null)
    {
        return $this->input('password', $name);
    }

    /**
     * @param string|null $name
     * @param bool $checked
     * @param string|null $value
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function radio($name = null, $checked = null, $value = null)
    {
        return $this->input('radio', $name, $value)
            ->attributeIf($name, 'id', $value === null ? $name : ($name.'_'.Str::slug($value)))
            ->attributeIf(! is_null($value), 'value', $value)
            ->attributeIf($checked, 'checked');
    }

    /**
     * @param string|null $name
     * @param iterable $options
     * @param string|iterable|null $value
     *
     * @return \SpenserHale\Html\Elements\Select
     */
    public function select($name = null, $options = [], $value = null)
    {
        return Select::create()
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->attributeIf($name, 'id', $this->fieldName($name))
            ->options($options)
            ->value($value);
    }

    /**
     * @param \SpenserHale\Html\HtmlElement|string|null $contents
     *
     * @return \SpenserHale\Html\Elements\Span
     */
    public function span($contents = null)
    {
        return Span::create()->children($contents);
    }

    /**
     * @param string|null $text
     *
     * @return \SpenserHale\Html\Elements\Button
     */
    public function submit($text = null)
    {
        return $this->button($text, 'submit');
    }

    /**
     * @param string|null $text
     *
     * @return \SpenserHale\Html\Elements\Button
     */
    public function reset($text = null)
    {
        return $this->button($text, 'reset');
    }

    /**
     * @param string $number
     * @param string|null $text
     *
     * @return \SpenserHale\Html\Elements\A
     */
    public function tel($number, $text = null)
    {
        return $this->a('tel:'.$number, $text ?: $number);
    }

    /**
     * @param string|null $name
     * @param string|null $value
     *
     * @return \SpenserHale\Html\Elements\Input
     */
    public function text($name = null, $value = null)
    {
        return $this->input('text', $name, $value);
    }

    /**
     * @param string|null $name
     *
     * @return \SpenserHale\Html\Elements\File
     */
    public function file($name = null)
    {
        return File::create()
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->attributeIf($name, 'id', $this->fieldName($name));
    }

    /**
     * @param string|null $name
     * @param string|null $value
     *
     * @return \SpenserHale\Html\Elements\Textarea
     */
    public function textarea($name = null, $value = null)
    {
        return Textarea::create()
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->attributeIf($name, 'id', $this->fieldName($name))
            ->value($value);
    }


    /**
     * @param string $name
     *
     * @return string
     */
    protected function fieldName($name)
    {
        return $name;
    }

    /**
     * @param string $value
     * @param string $format DateTime formatting string supported by date_format()
     * @return string
     */
    protected function formatDateTime($value, $format)
    {
        if (empty($value)) {
            return $value;
        }

        try {
            $date = new DateTimeImmutable($value);

            return $date->format($format);
        } catch (\Exception $e) {
            return $value;
        }
    }
}
