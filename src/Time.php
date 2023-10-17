<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

use Atk4\Ui\Form\Control\Input;

class Time extends Input
{
    public string $inputType = 'time';

    //needed, do not remove TODO really needed?
    public $type;
}
