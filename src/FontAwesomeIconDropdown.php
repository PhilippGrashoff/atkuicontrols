<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

use Atk4\Data\Model;
use Atk4\Data\Persistence\Static_;
use Atk4\Ui\Form\Control\Dropdown;
use Atk4\Ui\Js\JsExpression;

/**
 * A Dropdown control that lets the user pick from all available
 * FontAwesome icon names (as shipped with Fomantic-UI / Atk4\Ui 6).
 *
 * Each item is displayed with a preview of the icon plus its name.
 * The stored/selected value is the icon name itself (e.g. "user"),
 * which can be used directly wherever Atk4\Ui expects an icon string,
 * for example, `Icon::addTo($app, [$value])` or `$button->icon = $value;`.
 *
 * @see FontAwesomeIconList for the list of available icon names
 */
class FontAwesomeIconDropdown extends Dropdown
{
    /** Icon used when no value is selected (yet). */
    public string $defaultPreviewIcon = 'circle outline';

    protected function init(): void
    {
        parent::init();

        $rows = [];
        foreach (FontAwesomeIconList::all() as $iconName) {
            $rows[$iconName] = ['name' => $iconName];
        }

        $model = new Model(new Static_($rows), ['idField' => 'name']);
        $this->setModel($model);

        $this->renderRowFunction = static function (Model $record): array {
            $name = (string) $record->get('name');

            return [
                'value' => $name,
                'title' => ucwords($name),
                'icon' => $name,
            ];
        };

        $initialIcon = $this->entityField->get() !== null && $this->entityField->get() !== ''
            ? (string) $this->entityField->get()
            : $this->defaultPreviewIcon;

        // Insert a dedicated preview icon as the very first child of the
        // Fomantic-UI dropdown element. It is deliberately NOT matched by
        // Fomantic's own selectors (which require classes ".dropdown.icon"
        // or ".remove.icon"), so it can never collide with the caret or the
        // "clear" (x) icon.
        $this->jsInput(true)
            ->closest('.ui.dropdown')
            ->prepend('<i class="icon-preview ' . $initialIcon . ' icon" style="margin-right: .5em;"></i>');

        //add left margin so when typing text does not start behind preview icon
        $this->js(true)
            ->find('input.search')
            ->css('margin-left', '2rem');

        // Keep the preview icon in sync whenever the selection changes
        // (including when cleared via the clearable "x" icon).
        // Value === icon name here, so no lookup table is needed.
        $this->jsInput(true)->on('change', new JsExpression(
            'function () {'
            . ' var val = $(this).val() || ' . json_encode($this->defaultPreviewIcon) . ';'
            . ' $(this).closest(".ui.dropdown").find("> i.icon-preview").attr("class", "icon-preview " + val + " icon");'
            . '}'
        ));
    }
}