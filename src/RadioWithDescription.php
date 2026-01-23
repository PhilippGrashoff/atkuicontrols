<?php declare(strict_types=1);

namespace PhilippR\Atk4\UiControls;

use Atk4\Data\Model;
use Atk4\Data\Persistence\Static_;
use Atk4\Ui\Form;
use Atk4\Ui\HtmlTemplate;

class RadioWithDescription extends Form\Control
{
    public string $plainDescriptionField = '';
    public string $htmlDescriptionField = '';
    public string $iconField = '';
    public array $values = [];
    protected HtmlTemplate $_tRow;

    protected ?Model $model = null;

    //needed to overcome call in View::init() in ATK UI 6.0.0, see TODO
    protected function setModel(Model $model)
    {
    }

    protected function init(): void
    {
        $this->defaultTemplate = dirname(__DIR__) . '/template/radio_with_description.html';
        parent::init();

        // radios are annoying because they don't send value when they are not ticked
        if ($this->form !== null) {
            $this->form->onHook(Form::HOOK_LOAD_POST, function (Form $form, array &$postRawData) {
                if (!isset($postRawData[$this->shortName])) {
                    $postRawData[$this->shortName] = '';
                }
            });
        }

        $this->_tRow = $this->template->cloneRegion('Row');
        $this->template->del('Row');
        $this->_tRow->set('_name', $this->shortName);
    }

    protected function renderView(): void
    {
        if (!$this->model) {
            $p = new Static_($this->values);
            $this->model = (new Model($p));
        }
        $selectedId = $this->entityField->get();

        if ($this->disabled) {
            $this->addClass('disabled');
        }

        foreach ($this->model as $record) {
            $this->_appendRow($record, $selectedId);
        }

        $this->js(true, null, '.ui.checkbox.radio')->checkbox([
            'uncheckable' => $this->entityField === null || ($this->entityField->getField()->nullable || !$this->entityField->getField()->required),
        ]);
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
