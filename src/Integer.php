<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

use Atk4\Ui\Form\Control\Input;

class Integer extends Input
{
    public string $inputType = 'number';

    protected function renderView(): void
    {
        $value = $this->entityField?->get();
        if ($value !== null) {
            // type="number" requires a raw, unformatted numeric string.
            // The locale number formatting inserts a NBSP thousands separator
            // (e.g. "1 999"), which makes the value invalid -> the browser
            // clears the field. In here, $value is a raw value, but by explicitly setting it,
            // we avoid later number formatting
            $this->setInputAttr('value', $value);
        }

        parent::renderView();
    }
}