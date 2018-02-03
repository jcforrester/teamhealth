<?php

use function Pyxl\Modules\arrayPush;

add_filter('pyxl_modules', function ($modules) {
    return arrayPush(
        $modules,
        [
            'slug'   => 'HeroForm',
            'title'  => 'Hero Form',
            'fields' => [
                [
                    'label' => 'Title',
                    'slug'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'label' => 'Date',
                    'slug'  => 'date',
                    'type'  => 'date',
                ],
                [
                    'label'        => 'Content',
                    'slug'         => 'content',
                    'type'         => 'wysiwyg',
                    'toolbar'      => 'full',
                    'media_upload' => 0,
                    'delay'        => 1,
                ],
            ],
        ]
    );
});
