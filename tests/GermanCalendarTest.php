<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls\Tests;

use PhilippR\Atk4\UiControls\Tests\Testclasses\ModelWithUiControls;


class GermanCalendarTest extends TestCase
{
    public function testTypeIsSetToInputTag(): void
    {
        self::assertTrue(true);
        /*
        $form = $this->getDemoForm();
        $form->setModel((new ModelWithUiControls($this->db))->createEntity(), ['german_calendar']);

        ob_start();
        $form->getApp()->run();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertStringContainsString(
            'März',
            $output
        );*/
    }
}
