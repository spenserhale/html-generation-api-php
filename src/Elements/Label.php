<?php

namespace SpenserHale\Html\Elements;

use SpenserHale\Html\BaseElement;

class Label extends BaseElement
{
    protected $tag = 'label';

    /**
     * @param string|null $for
     *
     * @return static
     */
    public function for($for)
    {
        return $this->attribute('for', $for);
    }
}
