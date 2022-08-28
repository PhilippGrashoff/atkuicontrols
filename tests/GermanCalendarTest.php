<?php declare(strict_types=1);

namespace atkuicontrols\tests;

use atkuicontrols\tests\testclasses\ModelWithUiControls;


class GermanCalendarTest extends TestCase
{
    public function testTypeIsSetToInputTag(): void
    {
        $form = $this->getDemoForm();
        $form->setModel(new ModelWithUiControls($this->persistence), ['german_calendar']);

        ob_start();
        $form->getApp()->run();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertStringContainsString(
            'März',
            $output
        );
    }
}
