<?php

namespace Pyxl\Modules;

use GFAPI;

function gFormsChoices()
{
    if (!class_exists('GFAPI')) {
        return;
    }
    $form_options = [];
    $forms = GFAPI::get_forms();
    foreach ($forms as $form) {
        $form_options[$form['id']] = $form['title'];
    };
    return $form_options;
}
