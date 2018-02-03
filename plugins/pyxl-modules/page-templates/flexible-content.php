<?php
/**
 * Template Name: Modules
 */
get_header();

use Pyxl\Modules\FlexibleContent;

get_header();

while (have_posts()) :
    the_post();

    $modules = get_field(FlexibleContent::$field_key);

    if ($modules) {
        foreach ($modules as $module) {
            if (!isset($module['acf_fc_layout'])) {
                continue;
            }
            $path = get_template_directory() . "/modules/{$module['acf_fc_layout']}/{$module['acf_fc_layout']}.twig";

            if (!file_exists($path)) {
                continue;
            };

            $context = Timber::get_context();
            $post = new TimberPost();
            $data = [
                'acf'    => $module,
                'post'   => $post,
                'module' => $module['acf_fc_layout'],
            ];
            $context['pyxl'] = apply_filters("pyxl_{$module['acf_fc_layout']}", $data);
            Timber::render($path, $context);
        }
    }

endwhile;

get_footer();
