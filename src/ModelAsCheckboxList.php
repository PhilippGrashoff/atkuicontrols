<?php

declare(strict_types=1);

namespace atkuicontrols;


use atk4\data\Model;
use atk4\ui\Form\Control;
use atk4\ui\JsExpression;

/**
 * Creates a checkbox list based upon a model. Stores all selected data in a json string.
 */
class ModelAsCheckboxList extends Control\Input
{

    public $defaultTemplate = 'formfield/checkbox_list.html';

    public $descField = '';
    public $extraInfo = null;

    protected $_tRow;



    protected function init(): void
    {
        parent::init();
        $this->_tRow = $this->template->cloneRegion('Row');
        $this->template->del('Row');
    }



    protected function renderView(): void
    {
        if (is_array($this->field->get())) {
            $selectedValues = $this->field->get();
        } else {
            $selectedValues = [];
        }
        if ($this->model instanceof Model) {
            foreach ($this->model as $record) {
                $this->_tRow->set(
                    [
                        'name' => $this->field->short_name,
                        'record_id' => $record->get($record->id_field),
                        'label' => $record->get($record->title_field),
                    ]
                );
                if ($this->descField) {
                    $this->_tRow->setHTML(
                        'description',
                        nl2br(htmlspecialchars((string)$record->get($this->descField)))
                    );
                }
                if (is_callable($this->extraInfo)) {
                    $this->_tRow->set('extra_info', call_user_func($this->extraInfo, $record));
                }
                if (in_array($record->get($record->id_field), $selectedValues)) {
                    $this->_tRow->set('checked', 'checked="checked"');
                } else {
                    $this->_tRow->set('checked', '');
                }
                $this->template->appendHTML('Row', $this->_tRow->render());
            }
        }
        $this->template->set('value', json_encode($this->field->get()));
        $this->template->set('_id', $this->id);
        $this->template->set('name', $this->field->short_name);

    }

}