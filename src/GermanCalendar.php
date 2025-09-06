<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

use Atk4\Ui\Form\Control\Calendar;


/**
 * Needs an external JS included: https://npmcdn.com/flatpickr/dist/l10n/de.js
 * See https://flatpickr.js.org/localization/
 */
class GermanCalendar extends Calendar
{

    protected function init(): void
    {
        parent::init();
        $this->setOption(
            'locale',
            'de'
        );
    }
}
