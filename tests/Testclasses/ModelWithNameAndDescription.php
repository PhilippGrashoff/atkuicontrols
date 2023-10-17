<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls\Tests\Testclasses;

use Atk4\Data\Model;

class ModelWithNameAndDescription extends Model
{
    public $table = 'model_with_name_and_description';

    protected function init(): void
    {
        parent::init();
        $this->addField('name');
        $this->addField('description');
        $this->addField('icon');
    }
}
