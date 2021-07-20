<?php

namespace SpenserHale\Html\Elements;

use SpenserHale\Html\BaseElement;
use SpenserHale\Html\Elements\Attributes\Target;

class A extends BaseElement
{
    use Target;

    protected $tag = 'a';

    /**
     * @param string|null $href
     *
     * @return static
     */
    public function href($href)
    {
        return $this->attribute('href', $href);
    }
}
