<?php

namespace SpenserHale\Html\Elements;

use SpenserHale\Html\BaseElement;
use SpenserHale\Html\Elements\Attributes\Autofocus;
use SpenserHale\Html\Elements\Attributes\Disabled;
use SpenserHale\Html\Elements\Attributes\MinMaxLength;
use SpenserHale\Html\Elements\Attributes\Name;
use SpenserHale\Html\Elements\Attributes\Placeholder;
use SpenserHale\Html\Elements\Attributes\Readonly;
use SpenserHale\Html\Elements\Attributes\Required;
use SpenserHale\Html\Elements\Attributes\Type;
use SpenserHale\Html\Elements\Attributes\Value;

class Input extends BaseElement
{
    use Autofocus;
    use Disabled;
    use MinMaxLength;
    use Name;
    use Placeholder;
    use Readonly;
    use Required;
    use Type;
    use Value;

    protected $tag = 'input';

    /**
     * @return static
     */
    public function unchecked()
    {
        return $this->checked(false);
    }

    /**
     * @param bool $checked
     *
     * @return static
     */
    public function checked($checked = true)
    {
        return $checked
            ? $this->attribute('checked', 'checked')
            : $this->forgetAttribute('checked');
    }

    /**
     * @param string|null $size
     *
     * @return static
     */
    public function size($size)
    {
        return $this->attribute('size', $size);
    }
}
