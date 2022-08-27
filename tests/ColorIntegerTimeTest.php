<?php declare(strict_types=1);

namespace atkuicontrols\tests;

use atkuicontrols\tests\testclasses\ModelWithUiControls;


class ColorIntegerTimeTest extends TestCase
{

    public function testTypeIsSetToInputTag(): void
    {
        $form = $this->getDemoForm();
        $form->setModel(new ModelWithUiControls($this->persistence), ['color', 'integer', 'time']);

        $output = $form->getHtml();
        self::assertStringContainsString(
            '<input form="atk_layout_centered_form_form" name="color" type="color" placeholder="" id="atk_layout_centered_form_form_layout_color_input" value="">',
            $output
        );
        self::assertStringContainsString(
            '<input form="atk_layout_centered_form_form" name="integer" type="number" placeholder="" id="atk_layout_centered_form_form_layout_integer_input" value="">',
            $output
        );
        self::assertStringContainsString(
            '<input form="atk_layout_centered_form_form" name="time" type="time" placeholder="" id="atk_layout_centered_form_form_layout_time_input" value="">',
            $output
        );
    }
}
