<?php

use function Pyxl\Modules\arrayPush;
use function Pyxl\Modules\fileEnvCheck;
use function Pyxl\Modules\versionCacheBuster;

add_filter('pyxl_modules', function ($modules) {
    return arrayPush(
        $modules,
        [
            'slug'   => 'Hero',
            'title'  => 'Hero',
            'fields' => [
                [
                    'label' => 'Title',
                    'slug'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'label'        => 'Content',
                    'slug'         => 'content',
                    'type'         => 'wysiwyg',
                    'toolbar'      => 'full',
                    'media_upload' => 0,
                    'delay'        => 1,
                ],
                [
                    'label' => 'Button Link',
                    'slug'  => 'button_link',
                    'type'  => 'link',
                ],
                [
                    'label' => 'Mobile Image',
                    'slug'  => 'mobile_image',
                    'type'  => 'image',
                ],
                [
                    'label' => 'Desktop Image',
                    'slug'  => 'desktop_image',
                    'type'  => 'image',
                ],
            ],
        ]
    );
});


add_filter('pyxl_Hero', function ($context) {
    return $context;
});
