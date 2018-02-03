<?php

use function Pyxl\Modules\arrayPush;
use function Pyxl\Modules\fileEnvCheck;
use function Pyxl\Modules\versionCacheBuster;

add_filter('pyxl_modules', function ($modules) {
    return arrayPush(
        $modules,
        [
            'slug'   => 'FeaturedContent',
            'title'  => 'Featured Content',
            'fields' => [
                [
                    'label' => 'Primary',
                    'slug'  => 'tab1',
                    'type'  => 'tab',
                ],
                [
                    'label' => 'Title',
                    'slug'  => 'title_1',
                    'type'  => 'text',
                ],
                [
                    'label' => 'Image ',
                    'slug'  => 'image_1',
                    'type'  => 'image',
                ],
                [
                    'label' => 'Date',
                    'slug'  => 'date_1',
                    'type'  => 'date_picker',
                    'display_format' => 'F j, Y',
                    'return_format' => 'F j, Y',
                ],
                [
                    'label'        => 'Content',
                    'slug'         => 'content_1',
                    'type'         => 'wysiwyg',
                    'toolbar'      => 'full',
                    'media_upload' => 0,
                    'delay'        => 1,
                ],
                [
                    'label' => 'Secondary',
                    'slug'  => 'tab_2',
                    'type'  => 'tab',
                ],
                [
                    'label' => 'Title',
                    'slug'  => 'title_2',
                    'type'  => 'text',
                ],
                [
                    'label' => 'Image ',
                    'slug'  => 'image_2',
                    'type'  => 'image',
                ],
                [
                    'label' => 'Date',
                    'slug'  => 'date_2',
                    'type'  => 'date_picker',
                    'display_format' => 'F j, Y',
                    'return_format' => 'F j, Y',
                ],
                [
                    'label'        => 'Content',
                    'slug'         => 'content_2',
                    'type'         => 'wysiwyg',
                    'toolbar'      => 'full',
                    'media_upload' => 0,
                    'delay'        => 1,
                ],
            ],
        ]
    );
});

add_action('get_footer', function () {
    $jsFile = '/dist/scripts/Hero.js';
    // wp_enqueue_script('hero', fileEnvCheck($jsFile), [], versionCacheBuster($jsFile), true);
});


add_filter('pyxl_Hero', function ($context) {
    return $context;
});
