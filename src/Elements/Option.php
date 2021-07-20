<?php

namespace SpenserHale\Html\Elements;

use SpenserHale\Html\BaseElement;
use SpenserHale\Html\Elements\Attributes\Disabled;
use SpenserHale\Html\Elements\Attributes\Value;
use SpenserHale\Html\Selectable;

class Option extends BaseElement implements Selectable
{
    use Disabled;
    use Value;

    /** @var string */
    protected $tag = 'option';

    /**
     * @return static
     */
    public function selected()
    {
        return $this->attribute('selected', 'selected');
    }

    /**
     * @param bool $condition
     *
     * @return static
     */
    public function selectedIf($condition)
    {
        return $condition ?
            $this->selected() :
            $this->unselected();
    }

    /**
     * @return static
     */
    public function unselected()
    {
        return $this->forgetAttribute('selected');
    }
}
