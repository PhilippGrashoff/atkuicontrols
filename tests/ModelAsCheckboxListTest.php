<?php declare(strict_types=1);

namespace atkuicontrols\tests;

use Atk4\Data\Persistence;
use atkuicontrols\tests\testclasses\ModelWithNameAndDescription;
use traitsforatkdata\TestCase;


/**
 * Currently ModelAsCheckboxList is not used, hence the tests for it are missing/commmented
 */
class ModelAsCheckboxListTest extends TestCase
{
    /*
   protected Persistence $persistence;
    protected $sqlitePersistenceModels = [
        ModelWithNameAndDescription::class
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->persistence = $this->getSqliteTestPersistence();
    }


    public function testModelIsUsed(): void {
        $simpleModel1 = new ModelWithNameAndDescription($this->persistence);
        $simpleModel1->set('name', 'Lala');
        $simpleModel1->save();
        $simpleModel2 = new ModelWithNameAndDescription($this->persistence);
        $simpleModel2->set('name', 'Lala');
        $simpleModel2->save();
    }
    */
}
