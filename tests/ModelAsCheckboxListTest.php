<?php declare(strict_types=1);

namespace atkuicontrols\tests;

use atkuicontrols\tests\testclasses\SimpleModel;
use traitsforatkdata\TestCase;

class ModelAsCheckboxListTest extends TestCase
{

    protected $sqlitePersistenceModels = [
        SimpleModel::class
    ];


}
