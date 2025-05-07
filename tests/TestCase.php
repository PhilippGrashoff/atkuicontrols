<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls\Tests;

use Atk4\Ui\App;
use Atk4\Ui\Form;
use Atk4\Ui\Layout\Centered;
use Nyholm\Psr7\Factory\Psr17Factory;


class TestCase extends \Atk4\Data\Schema\TestCase
{

    protected function getDemoForm(): Form
    {
        $app = new App(
            [
                'alwaysRun' => false,
                'catchExceptions' => false,
                'request' => (new Psr17Factory())->createServerRequest('GET', '/')
            ]
        );
        $app->initLayout([Centered::class]);
        return Form::addTo($app);
    }
}
