<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls\Tests\Testclasses;

use Atk4\Data\Model;
use PhilippR\Atk4\UiControls\Color;
use PhilippR\Atk4\UiControls\GermanCalendar;
use PhilippR\Atk4\UiControls\Integer;
use PhilippR\Atk4\UiControls\Time;

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
