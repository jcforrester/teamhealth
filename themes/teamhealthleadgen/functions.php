<?php
/**
 *
 */

namespace Pyxl\Theme;

define(__NAMESPACE__ . '\PATH', get_template_directory());
define(__NAMESPACE__ . '\URI', get_template_directory_uri());

require_once 'lib/autoload.php';

add_action('after_setup_theme', function () {
    new Setup();
    new MarkupHelper();
    new Enqueues();
    new Navwalkers\WP_Bootstrap_Navwalker();
});
