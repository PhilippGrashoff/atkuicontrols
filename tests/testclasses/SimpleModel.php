<?php declare(strict_types=1);

namespace atkuicontrols\tests\testclasses;

use Atk4\Data\Model;
use atkuicontrols\CheckboxWithHtmlLabel;
use atkuicontrols\Color;
use atkuicontrols\GermanCalendar;
use atkuicontrols\GermanMoney;
use atkuicontrols\Integer;
use atkuicontrols\RadioWithDescription;
use atkuicontrols\Time;

class SimpleModel extends Model
{

    protected function init(): void
    {
        $this->addField('name',);
    }
}
