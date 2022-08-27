<?php declare(strict_types=1);

namespace atkuicontrols\tests;

use Atk4\Data\Persistence;
use Atk4\Ui\App;
use Atk4\Ui\Form;
use Atk4\Ui\Layout\Centered;
use atkuicontrols\CheckboxWithHtmlLabel;
use atkuicontrols\tests\testclasses\ModelWithUiControls;


class TestCase extends \traitsforatkdata\TestCase
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

    protected function getDemoForm(): Form
    {
        $app = new App(['always_run' => false]);
        $app->initLayout([Centered::class]);
        return Form::addTo($app);
    }
}
