<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls\Tests;

use Atk4\Ui\HtmlTemplate;
use PhilippR\Atk4\UiControls\CheckboxWithHtmlLabel;

class CheckboxWithHtmlLabelTest extends TestCase
{
    public function testWithLabelTemplate(): void
    {
        $labelTemplate = new HtmlTemplate('<div>Some simple <b>{$testvar}</b> Template</div>');
        $labelTemplate->set('testvar', 'but good enough');
        $form = $this->getDemoForm();
        $checkbox = $form->addControl('testfield', [CheckboxWithHtmlLabel::class]);
        $checkbox->labelTemplate = $labelTemplate;

        $output = $form->getHtml();
        self::assertStringContainsString(
            '<div>Some simple <b>but good enough</b> Template</div>',
            $output
        );
    }

    public function testWithoutLabelTemplate(): void
    {
        $form = $this->getDemoForm();
        $form->addControl('testfield', [CheckboxWithHtmlLabel::class]);

        $output = $form->getHtml();
        self::assertStringContainsString(
            '>Testfield</label>',
            $output
        );
    }
}
