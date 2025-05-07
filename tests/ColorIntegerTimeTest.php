<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls\Tests;

use PhilippR\Atk4\UiControls\Tests\Testclasses\ModelWithUiControls;


class ColorIntegerTimeTest extends TestCase
{

    public function testTypeIsSetToInputTag(): void
    {
        $form = $this->getDemoForm();
        $form->setEntity((new ModelWithUiControls($this->db))->createEntity(), ['color', 'integer', 'time']);

        $output = $form->getHtml();
        self::assertStringContainsString(
            '<input form="atk_layout_centered_form_form" name="color" type="color" id="atk_layout_centered_form_form_layout_color_input" value="">',
            $output
        );
        self::assertStringContainsString(
            '<input form="atk_layout_centered_form_form" name="integer" type="number" id="atk_layout_centered_form_form_layout_integer_input" value="">',
            $output
        );
        self::assertStringContainsString(
            '<input form="atk_layout_centered_form_form" name="time" type="time" id="atk_layout_centered_form_form_layout_time_input" value="">',
            $output
        );
    }
}
