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

class ModelWithUiControls extends Model
{

    protected function init(): void
    {
        $this->addField(
            'integer',
            [
                'type' => 'checkboxwithhtmllabel',
                'ui' => ['form' => CheckboxWithHtmlLabel::class]
            ]
        );
        $this->addField(
            'integer',
            [
                'type' => 'string',
                'ui' => ['form' => Color::class]
            ]
        );
        $this->addField(
            'germancalendar',
            [
                'type' => 'date',
                'ui' => ['form' => GermanCalendar::class]
            ]
        );
        $this->addField(
            'germanmoney',
            [
                'type' => 'money',
                'ui' => ['form' => GermanMoney::class]
            ]
        );
        $this->addField(
            'integer',
            [
                'type' => 'integer',
                'ui' => ['form' => Integer::class]
            ]
        );
        $this->addField(
            'radiowithdescription',
            [
                'type' => 'integer',
                'ui' => ['form' => RadioWithDescription::class]
            ]
        );
        $this->addField(
            'time',
            [
                'type' => 'time',
                'ui' => ['form' => Time::class]
            ]
        );
    }
}
