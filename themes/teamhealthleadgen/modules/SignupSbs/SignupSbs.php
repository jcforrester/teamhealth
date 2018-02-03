<?php

use function Pyxl\Modules\arrayPush;
use function Pyxl\Modules\gFormsChoices;

add_filter('pyxl_modules', function ($modules) {

    $forms = gFormsChoices();

    return arrayPush(
        $modules,
        [
            'slug'   => 'SignupSbs',
            'title'  => 'Sign Up (Side by Side)',
            'fields' => [
                [
                    'label' => 'Primary',
                    'slug'  => 'tab_1',
                    'type'  => 'tab',
                ],
                [
                    'label' => 'Lead In',
                    'slug'  => 'leadin_1',
                    'type'  => 'text',
                ],
                [
                    'label' => 'Title',
                    'slug'  => 'title_1',
                    'type'  => 'text',
                ],
                [
                    'label'   => 'Form',
                    'slug'    => 'form_1',
                    'type'    => 'select',
                    'choices' => $forms,
                ],
                [
                    'label' => 'Secondary',
                    'slug'  => 'tab_2',
                    'type'  => 'tab',
                ],
                [
                    'label' => 'Lead In',
                    'slug'  => 'leadin_2',
                    'type'  => 'text',
                ],
                [
                    'label' => 'Title',
                    'slug'  => 'title_2',
                    'type'  => 'text',
                ],
                [
                    'label'   => 'Form',
                    'slug'    => 'form_2',
                    'type'    => 'select',
                    'choices' => $forms,
                ],

            ],
        ]
    );
});
