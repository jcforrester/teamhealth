<?php

namespace Pyxl\Modules;

class FlexibleContent
{

    public static $title = 'Modules';

    public static $group_key = 'group_modules';

    public static $field_key = 'field_flexible_content';

    public $modules;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        // Searching the theme for a folder called modules.
        // Returning an array of strings with the paths we'll be requiring.
        $folders = $this->getModuleFolderPaths();
        if (!$folders) {
            return;
        }

        // Okay, now let's iterate through and require those modules.
        $this->requireModules($folders);

        // Each module will likely contain an associative array.
        // We'll be adding to the filter `pyxl_modules` and storing to $modules.
        $modules = apply_filters('pyxl_modules', []);

        // Iterate through associative array and tell ACF
        array_map(function ($module) {
            $this->registerFieldGroup($module);
        }, $modules);

        $this->addMainFieldGroup($modules);
    }

    public function generateNamesAndKeys($fields)
    {
        $fields = array_map(function ($field) {
            if (isset($field['slug'])) {
                $slug = $field['slug'];
                $field['name'] = $slug;
                $field['key'] = $slug;
            }
            return $field;
        }, $fields);
        return $fields;
    }

    public function registerFieldGroup($group)
    {
        acf_add_local_field_group([
            'key'                   => 'group_' . $group['slug'],
            'title'                 => $group['title'],
            'fields'                => $this->generateNamesAndKeys($group['fields']),
            'label_placement'       => 'left',
            'instruction_placement' => 'label',
            'description'           => '',
        ]);
    }

    public function getModuleFolderPaths()
    {
        return glob(get_stylesheet_directory() . '/modules/*', GLOB_ONLYDIR);
    }

    public function requireModules($folders = [])
    {
        return array_map(function ($folder) {
            $mock_filename = basename($folder);
            $path = trailingslashit($folder) . $mock_filename . '.php';
            require $path;
        }, $folders);
    }

    public function createLayout($array = [])
    {
        return [
            'key'        => $array['slug'],
            'name'       => $array['slug'],
            'label'      => $array['title'],
            'display'    => 'row',
            'sub_fields' => [
                [
                    'key'          => $array['slug'],
                    'name'         => $array['slug'],
                    'label'        => $array['title'],
                    'type'         => 'clone',
                    'instructions' => '',
                    'clone'        => [
                        0 => 'group_' . $array['slug'],
                    ],
                    'display'      => 'seamless',
                    'layout'       => 'row',
                ],
            ],
        ];
    }

    public function layouts($layouts)
    {
        $new_layouts = [];

        foreach ($layouts as $layout) {
            $new_layouts[$layout['slug']] = $this->createLayout([
                'title' => $layout['title'],
                'slug'  => $layout['slug'],
            ]);
        }

        return $new_layouts;
    }

    public function addMainFieldGroup($modules = [])
    {
        acf_add_local_field_group([
            'key'                   => self::$group_key,
            'title'                 => self::$title,
            'fields'                => [
                [
                    'key'          => 'field_flexible_content',
                    'label'        => '',
                    'name'         => 'modules',
                    'type'         => 'flexible_content',
                    'layouts'      => $this->layouts($modules),
                    'button_label' => 'Add Module',
                    'min'          => '',
                    'max'          => '',
                ],
            ],
            'location'              => [
                [
                    [
                        'param'    => 'page_template',
                        'operator' => '==',
                        'value'    => 'flexible-content.php',
                    ],
                ],
            ],
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => [
                0 => 'the_content',
            ],
            'active'                => 1,
            'description'           => '',
        ]);
    }
}