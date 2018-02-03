<?php
/**
 * Plugin Name: (custom) Team Health Lead Generation Core
 * Plugin URI: http://mizner.io
 * Description:
 * Version: 1.0
 * Author: Michael Mizner
 * Author URI: http://mizner.io
 * License: GPL
 */

namespace Pyxl\TeamHealth;

defined('WPINC') || die;

// WP Offload S3
define('AS3CFPRO_LICENCE', 'c8fd10a6-a45e-49b2-b7e4-5315e0086808');

// For Amazon S3
define('DBI_AWS_ACCESS_KEY_ID', 'AKIAISNRZNFLRRNTGADA');
define('DBI_AWS_SECRET_ACCESS_KEY', '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');
define('GF_LICENSE_KEY', '1cf5a7b29d70a1e86fdf3ac3e137eb53');

define(__NAMESPACE__ . '\PATH', plugin_dir_path(__FILE__));
define(__NAMESPACE__ . '\URI', plugin_dir_url(__FILE__));

require_once 'lib/autoload.php';

add_action('plugins_loaded', function () {
    new Timber\Functions\GravityForms();
});
