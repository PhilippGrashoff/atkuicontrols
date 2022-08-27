<?php


declare(strict_types=1);

namespace atkuicontrols;


/**
 * TODO: THis is temporary until ATK can handle Thousands seperator
 */
class Money extends \atk4\ui\Form\Control\Money
{

    public function getValue(): ?string
    {
        $v = $this->field ? $this->field->get() : ($this->content ?: null);

        if (is_null($v)) {
            return null;
        }

        return number_format($v, 2, '.', '');
    }
}