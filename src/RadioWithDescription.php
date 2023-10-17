<?php

declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

use Atk4\Data\Model;
use Atk4\Data\Persistence\Static_;
use Atk4\Ui\Form;
use Atk4\Ui\HtmlTemplate;

class RadioWithDescription extends Form\Control\Input
{
    public string $plainDescriptionField = '';
    public string $htmlDescriptionField = '';
    public string $iconField = '';
    public $selectedId; //TODO can possibly be removed as a field is always added when adding a control to a form
    public array $values = [];
    protected HtmlTemplate $_tRow;

    protected function init(): void
    {
        $this->defaultTemplate = dirname(__DIR__) . '/template/radio_with_description.html';
        parent::init();
        $this->_tRow = $this->template->cloneRegion('Row');
        $this->template->del('Row');
        $this->_tRow->set('_name', $this->shortName);
    }

    protected function renderView(): void
    {
        if (!$this->model) {
            $p = new Static_($this->values);
            $this->setModel(new Model($p));
        }
        $selectedId = $this->entityField ? $this->entityField->get() : $this->selectedId;

        if ($this->disabled) {
            $this->addClass('disabled');
        }

        foreach ($this->model as $record) {
            $this->_appendRow($record, $selectedId);
        }
    }

    protected function _appendRow(Model $record, $selectedId)
    {
        if ($this->readOnly) {
            $this->_tRow->set('disabled', $selectedId != $record->getId() ? 'disabled="disabled"' : '');
        } elseif ($this->disabled) {
            $this->_tRow->set('disabled', 'disabled="disabled"');
        }

        if ($this->plainDescriptionField && $record->hasField($this->plainDescriptionField)) {
            $this->_tRow->set('plain_description', $record->get($this->plainDescriptionField));
        }
        if ($this->htmlDescriptionField && $record->hasField($this->htmlDescriptionField)) {
            $this->_tRow->dangerouslySetHtml('html_description', $record->get($this->htmlDescriptionField));
        }
        if ($this->iconField && $record->hasField($this->iconField)) {
            $this->_tRow->set('icon', $record->get($this->iconField));
        }

        if ($record->getId() == $selectedId) {
            $this->_tRow->set('checked', 'checked="checked"');
        } else {
            $this->_tRow->set('checked', '');
        }
        $this->_tRow->set('id', (string)$record->getId());
        $this->_tRow->set('name', $record->getTitle());

        $this->template->dangerouslyAppendHtml('Row', $this->_tRow->renderToHtml());
    }
}
