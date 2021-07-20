<?php

namespace SpenserHale\Html\Elements;

use SpenserHale\Html\BaseElement;
use SpenserHale\Html\Elements\Attributes\Disabled;

class Fieldset extends BaseElement
{
    use Disabled;

    protected $tag = 'fieldset';

    /**
     * @param \SpenserHale\Html\HtmlElement|string $text
     *
     * @return static
     */
    public function legend($contents)
    {
        return $this->prependChild(
            Legend::create()->text($contents)
        );
    }
}
