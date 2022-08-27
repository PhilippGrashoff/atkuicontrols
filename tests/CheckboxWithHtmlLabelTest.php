<?php declare(strict_types=1);

namespace atkuicontrols\tests;

use Atk4\Data\Persistence;
use Atk4\Ui\App;
use Atk4\Ui\Form;
use Atk4\Ui\HtmlTemplate;
use Atk4\Ui\Layout\Centered;
use Atk4\Ui\Template;
use atkuicontrols\CheckboxWithHtmlLabel;
use atkuicontrols\tests\testclasses\ModelWithUiControls;
use atkuicontrols\tests\testclasses\SimpleModel;
use traitsforatkdata\TestCase;


class CheckboxWithHtmlLabelTest extends TestCase
{
    protected Persistence $persistence;
    protected $sqlitePersistenceModels = [
        ModelWithUiControls::class
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->persistence = $this->getSqliteTestPersistence();
    }

    public function testWithLabelTemplate(): void
    {
        $labelTemplate = new HtmlTemplate('<div>Some simple <b>{$testvar}</b> Template</div>');
        $labelTemplate->set('testvar', 'but good enough');

        $app = new App(['always_run' => false]); //'layout' => ['layout' => Centered::class]]);
        $app->initLayout([Centered::class]);
        $form = Form::addTo($app);
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
        $app = new App(['always_run' => false]); //'layout' => ['layout' => Centered::class]]);
        $app->initLayout([Centered::class]);
        $form = Form::addTo($app);
        $checkbox = $form->addControl('testfield', [CheckboxWithHtmlLabel::class]);

        $output = $form->getHtml();
        self::assertStringContainsString(
            '>Testfield</label>',
            $output
        );
    }

}
