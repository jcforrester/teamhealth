<?php

namespace Pyxl\Modules;

class CompatibilityCheck
{

    public function __construct()
    {

        // todo: break this up

        if (!class_exists('Timber')) {
            add_action('admin_notices', function () {
                echo '<div class="error"><p><strong>Pyxl Modules: </strong>Timber not available. Make sure you install and activate the plugin in <a href="' . esc_url(admin_url('plugins.php')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
            });
        }
        if (!function_exists('acf_add_local_field_group')) {
            add_action('admin_notices', function () {
                echo '<div class="error"><p><strong>Pyxl Modules: </strong>ACF not available. Make sure you install and activate the plugin in <a href="' . esc_url(admin_url('plugins.php')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
            });
        }

        if (!class_exists('Timber')) {
            return;
        }

        if (!function_exists('acf_add_local_field_group')) {
            return;
        }
    }

}