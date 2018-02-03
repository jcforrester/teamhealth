<?php

use function Pyxl\Modules\arrayPush;

add_filter('pyxl_modules', function ($modules) {
    return arrayPush(
        $modules,
        [
            'slug'   => 'FeaturedJobs',
            'title'  => 'Featured Jobs',
            'fields' => [
                [
                    'label' => 'Title',
                    'slug'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'label'        => 'Jobs',
                    'slug'         => 'jobs',
                    'type'         => 'repeater',
                    'layout'       => 'row',
                    'button_label' => 'Add Job',
                    'sub_fields'   => [
                        [
                            'label' => 'Title',
                            'name'  => 'title',
                            'key'   => 'title',
                            'type'  => 'text',
                        ],
                        [
                            'label' => 'Position',
                            'name'  => 'position',
                            'key'   => 'position',
                            'type'  => 'text',
                        ],
                        [
                            'label' => 'Department',
                            'name'  => 'department',
                            'key'   => 'department',
                            'type'  => 'text',
                        ],
                        [
                            'label' => 'Type',
                            'name'  => 'type',
                            'key'   => 'type',
                            'type'  => 'text',
                        ],
                        [
                            'label' => 'Location',
                            'name'  => 'location',
                            'key'   => 'location',
                            'type'  => 'text',
                        ],
                        [
                            'label' => 'Link',
                            'name'  => 'link',
                            'key'   => 'link',
                            'type'  => 'link',
                        ],
                    ],
                ],
                [
                    'label' => 'Button (view more)',
                    'slug'  => 'button',
                    'type'  => 'link',
                ],
            ],
        ]
    );
});