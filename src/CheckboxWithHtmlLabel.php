<?php

declare(strict_types=1);

namespace atkuicontrols;

use Atk4\Ui\Form\Control\Checkbox;
use Atk4\Ui\Template;

class CheckboxWithHtmlLabel extends Checkbox
{

    public Template $labelTemplate;

    protected function renderView(): void
    {
        if ($this->labelTemplate) {
            $this->template->setHtml('Content', $this->labelTemplate->render());
        }

        if ($this->field ? $this->field->get() : $this->content) {
            $this->template->set('checked', 'checked');
        }

        // We don't want this displayed, because it can only affect "checked" status anyway
        $this->content = null;

        // take care of readonly status
        if ($this->readonly) {
            $this->addClass('read-only');
        }

        // take care of disabled status
        if ($this->disabled) {
            $this->addClass('disabled');
            $this->template->set('disabled', 'disabled="disabled"');
        }

        $this->js(true)->checkbox();

        $this->content = null; // no content again

        parent::renderView();
    }
}