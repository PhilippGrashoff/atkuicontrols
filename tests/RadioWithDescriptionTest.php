<?php declare(strict_types=1);

namespace atkuicontrols\tests;


use atkuicontrols\RadioWithDescription;
use atkuicontrols\tests\testclasses\ModelWithNameAndDescription;

class RadioWithDescriptionTest extends TestCase
{
    protected $sqlitePersistenceModels =
        [
            ModelWithNameAndDescription::class
        ];

    public function testWithModel(): void
    {
        $entity1 = new ModelWithNameAndDescription($this->persistence);
        $entity1->set('name', 'Lala');
        $entity1->set('description', 'Some sample desc');
        $entity1->save();
        $entity2 = new ModelWithNameAndDescription($this->persistence);
        $entity2->set('name', 'GuGu');
        $entity2->set('description', 'And another sample desc');
        $entity2->save();

        $form = $this->getDemoForm();
        $form->addControl(
            'radio',
            [
                RadioWithDescription::class,
                'model' => new ModelWithNameAndDescription($this->persistence),
                'plainDescriptionField' => 'description'
            ]
        );

        $renderedHtml = $form->getHtml();
        self::assertStringContainsString(
            '<b class="header">Lala</b>
                            <div class="description">Some sample desc</div>',
            $renderedHtml
        );
        self::assertStringContainsString(
            '<b class="header">GuGu</b>
                            <div class="description">And another sample desc</div>',
            $renderedHtml
        );
    }

    public function testValueArrayWithDescriptionArray(): void
    {
        $values = [];
        $values[] = [
            'id' => 1,
            'name' => 'Number1',
            'desc' => 'SomeDescription',
            'icon' => 'house'
        ];


        $form = $this->getDemoForm();
        $form->addControl(
            'radio',
            [
                RadioWithDescription::class,
                'values' => $values,
                'plainDescriptionField' => 'desc',
                'iconField' => 'icon'
            ]
        );

        $renderedHtml = $form->getHtml();
        self::assertStringContainsString(
            '<i class="large icon house"></i>',
            $renderedHtml
        );

        self::assertStringContainsString(
            '<b class="header">Number1</b>
                            <div class="description">SomeDescription</div>',
            $renderedHtml
        );

    }

    public function testIcon(): void
    {
        $entity = new ModelWithNameAndDescription($this->persistence);
        $entity->set('name', 'GuGu');
        $entity->set('icon', 'map');
        $entity->save();

        $form = $this->getDemoForm();
        $form->addControl(
            'radio',
            [
                RadioWithDescription::class,
                'model' => new ModelWithNameAndDescription($this->persistence),
                'iconField' => 'icon'
            ]
        );

        $renderedHtml = $form->getHtml();
        self::assertStringContainsString(
            '<i class="large icon map"></i>',
            $renderedHtml
        );

    }

    public function testHtmlDescription(): void
    {
        $entity = new ModelWithNameAndDescription($this->persistence);
        $entity->set('name', 'GuGu');
        $entity->set('description', '<p>And <b>another</b> sample desc</p>');
        $entity->save();

        $form = $this->getDemoForm();
        $form->addControl(
            'radio',
            [
                RadioWithDescription::class,
                'model' => new ModelWithNameAndDescription($this->persistence),
                'htmlDescriptionField' => 'description'
            ]
        );

        $renderedHtml = $form->getHtml();
        self::assertStringContainsString(
            '<b class="header">GuGu</b>
                            <div class="description"><p>And <b>another</b> sample desc</p></div>',
            $renderedHtml
        );
    }
}
