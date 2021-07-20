<?php

namespace SpenserHale\Html\Elements;

use SpenserHale\Html\BaseElement;
use SpenserHale\Html\Elements\Attributes\Disabled;
use SpenserHale\Html\Elements\Attributes\Name;
use SpenserHale\Html\Elements\Attributes\Type;
use SpenserHale\Html\Elements\Attributes\Value;

class Button extends BaseElement
{
    use Disabled;
    use Value;
    use Name;
    use Type;

    protected $tag = 'button';
}
