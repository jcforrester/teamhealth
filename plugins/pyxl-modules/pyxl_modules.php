<?php
/**
 * Plugin Name: (custom) Pyxl Modules
 * Plugin URI: https://pyxl.com
 * Description:
 * Version: 1.0
 * Author: Michael Mizner
 * Author URI: https://mizner.io
 * License: GPLv2+
 */

namespace Pyxl\Modules;

defined('WPINC') || die;

define(__NAMESPACE__ . '\PATH', plugin_dir_path(__FILE__));
define(__NAMESPACE__ . '\URI', plugin_dir_url(__FILE__));

require_once 'lib/autoload.php';

add_action('plugins_loaded', function () {
    new HelpersLoader();
    new FlexibleContent();
    new PageTemplateLoader();
});
