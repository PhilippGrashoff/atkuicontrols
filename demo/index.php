<?php declare(strict_types=1);

/**
 * Simple demo page to try out the UI controls from this package in a browser.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Atk4\Ui\App;
use Atk4\Ui\Form;
use Atk4\Ui\Header;
use Atk4\Ui\HtmlTemplate;
use Atk4\Ui\Js\JsToast;
use Atk4\Ui\Layout\Centered;
use PhilippR\Atk4\UiControls\CheckboxWithHtmlLabel;
use PhilippR\Atk4\UiControls\Color;
use PhilippR\Atk4\UiControls\FontAwesomeIconDropdown;
use PhilippR\Atk4\UiControls\GermanCalendar;
use PhilippR\Atk4\UiControls\Integer;
use PhilippR\Atk4\UiControls\RadioWithDescription;
use PhilippR\Atk4\UiControls\Time;

$app = new App(['title' => 'PhilippR/Atk4-UiControls Demo']);
$app->initLayout([Centered::class]);

Header::addTo($app, ['UI Controls Demo']);

$form = Form::addTo($app);

// Color
$form->addControl('color', [Color::class], ['caption' => 'Color']);

// Integer (renders as <input type="number">)
$form->addControl('integer', [Integer::class], ['caption' => 'Integer']);

// Time (renders as <input type="time">)
$form->addControl('time', [Time::class], ['caption' => 'Time']);

// GermanCalendar: needs de.js from flatpickr loaded to fully localize,
// see comment in GermanCalendar.php
$form->addControl('german_calendar', [GermanCalendar::class], ['caption' => 'German Calendar']);

// CheckboxWithHtmlLabel with a custom HTML label template
$labelTemplate = new HtmlTemplate('I agree to the <b>{$link}</b>');
$labelTemplate->set('link', 'Terms & Conditions');
$checkbox = $form->addControl('checkbox', [CheckboxWithHtmlLabel::class], ['caption' => 'Checkbox with HTML label']);
$checkbox->labelTemplate = $labelTemplate;

// FontAwesomeIconDropdown
$form->addControl('icon', [FontAwesomeIconDropdown::class], ['caption' => 'FontAwesome Icon']);

// RadioWithDescription using a static array of values
$values = [];
$values[] = ['id' => 1, 'name' => 'Option A', 'desc' => 'This is a plain-text description for option A.', 'icon' => 'house'];
$values[] = ['id' => 2, 'name' => 'Option B', 'desc' => 'This is a plain-text description for option B.', 'icon' => 'star'];
$values[] = ['id' => 3, 'name' => 'Option C', 'desc' => 'This is a plain-text description for option C.', 'icon' => 'heart'];
$form->addControl(
    'radio',
    [
        RadioWithDescription::class,
        'values' => $values,
        'plainDescriptionField' => 'desc',
        'iconField' => 'icon',
    ],
    ['caption' => 'Radio with description']
);

$form->onSubmit(static function (Form $form) {
    return new JsToast('Submitted: ' . json_encode($form->model->get(), JSON_THROW_ON_ERROR));
});
