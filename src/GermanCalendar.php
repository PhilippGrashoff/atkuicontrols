<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

use Atk4\Ui\Form\Control\Calendar;
use Atk4\Ui\Js\JsExpression;

class GermanCalendar extends Calendar
{

    protected function init(): void
    {
        parent::init();
        $this->setOption(
            'firstDayOfWeek',
            1
        );

        $this->setOption(
            'monthFirst',
            false
        );

        $this->options['text']['days'] = new JsExpression(
            "['S', 'M', 'D', 'M', 'D', 'F', 'S'],
                      months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
                      monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
                      today: 'Heute',
                      now: 'Jetzt',"
        );
    }
}
