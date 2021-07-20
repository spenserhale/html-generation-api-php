<?php

namespace SpenserHale\Html\Elements;

use SpenserHale\Html\BaseElement;
use SpenserHale\Html\Elements\Attributes\Disabled;

class Optgroup extends BaseElement
{
    use Disabled;

    protected $tag = 'optgroup';

    /**
     * @param string|null $href
     *
     * @return static
     */
    public function label($label)
    {
        return $this->attribute('label', $label);
    }
}
