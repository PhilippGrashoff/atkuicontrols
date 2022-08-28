<?php declare(strict_types=1);

namespace atkuicontrols\tests\testclasses;

use Atk4\Data\Model;
use atkuicontrols\Color;
use atkuicontrols\GermanCalendar;
use atkuicontrols\GermanMoney;
use atkuicontrols\Integer;
use atkuicontrols\Time;

class ModelWithUiControls extends Model
{

    public $table = 'sometable';

    protected function init(): void
    {
        parent::init();

        $this->addField(
            'color',
            [
                'type' => 'string',
                'ui' => ['form' => [Color::class]]
            ]
        );
        $this->addField(
            'german_calendar',
            [
                'type' => 'date',
                'ui' => ['form' => [GermanCalendar::class]]
            ]
        );
        $this->addField(
            'german_money',
            [
                'type' => 'money',
                'ui' => ['form' => [GermanMoney::class]]
            ]
        );
        $this->addField(
            'integer',
            [
                'type' => 'integer',
                'ui' => ['form' => [Integer::class]]
            ]
        );
        $this->addField(
            'time',
            [
                'type' => 'time',
                'ui' => ['form' => [Time::class]]
            ]
        );
    }
}
