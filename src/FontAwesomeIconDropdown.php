<?php

declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

use Atk4\Data\Model;
use Atk4\Data\Persistence\Static_;
use Atk4\Ui\Form\Control\Dropdown;

/**
 * A Dropdown control that lets the user pick from all available
 * FontAwesome icon names (as shipped with Fomantic-UI / Atk4\Ui 6).
 *
 * Each item is displayed with a preview of the icon plus its name.
 * The stored/selected value is the icon name itself (e.g. "user"),
 * which can be used directly wherever Atk4\Ui expects an icon string,
 * for example, `Icon::addTo($app, [$value])` or `$button->icon = $value;`.
 *
 * @see FontAwesomeIcons for the list of available icon names
 */
class FontAwesomeIconDropdown extends Dropdown
{
    protected function init(): void
    {
        parent::init();

        $rows = [];
        foreach (FontAwesomeIconList::all() as $iconName) {
            $rows[$iconName] = ['name' => $iconName];
        }

        $model = new Model(new Static_($rows), ['idField' => 'name']);
        $model->addField('name');

        $this->setModel($model, ['name']);


        $this->renderRowFunction = static function (Model $record): array {
            $name = (string)$record->get('name');

            return [
                'value' => $name,
                'title' => ucwords($name),
                'icon' => $name,
            ];
        };
    }
}
