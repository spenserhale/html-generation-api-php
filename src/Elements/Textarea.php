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

class Textarea extends BaseElement
{
    use Autofocus;
    use Placeholder;
    use Name;
    use Required;
    use Disabled;
    use Readonly;
    use MinMaxLength;

    protected $tag = 'textarea';

    /**
     * @param string|null $value
     *
     * @return static
     * @throws \SpenserHale\Html\Exceptions\InvalidHtml
     */
    public function value($value)
    {
        return $this->html($value);
    }

    /**
     * @param int $rows
     *
     * @return static
     */
    public function rows(int $rows)
    {
        return $this->attribute('rows', $rows);
    }

    /**
     * @param int $cols
     *
     * @return static
     */
    public function cols(int $cols)
    {
        return $this->attribute('cols', $cols);
    }
}
