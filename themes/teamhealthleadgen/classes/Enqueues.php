<?php

namespace Pyxl\Theme;

use function Pyxl\Modules\fileEnvCheck;
use function Pyxl\Modules\versionCacheBuster;

class Enqueues
{
    public function __construct()
    {
        add_action('init', [$this, 'init']);
    }

    public function init()
    {
        add_action('wp_enqueue_scripts', [$this, 'jQuerySwap']);
        add_action('wp_enqueue_scripts', [$this, 'globalEnqueues']);
    }

    public function jQuerySwap()
    {
        wp_deregister_script('jquery-migrate');
        wp_deregister_script('jquery');
        $jQueryMigCDN = '//code.jquery.com/jquery-migrate-1.4.1.js';
        wp_register_script('jquery-migrate', $jQueryMigCDN, null, '1.12.4', true);
        $jQueryCDN = '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js';
        wp_register_script('jquery', $jQueryCDN, null, '1.12.4', true);
    }

    public function globalEnqueues()
    {
        // JavaScript
        wp_enqueue_script('jquery');
        // wp_enqueue_script('jquery-migrate');

        $jsGlobal = '/dist/scripts/main.js';
        wp_enqueue_script('main', fileEnvCheck($jsGlobal), [], versionCacheBuster($jsGlobal), true);
        wp_localize_script(
            'main',
            'globals',
            [
                'urls'    => [
                    'root'  => home_url(),
                    'ajax'  => admin_url('admin-ajax.php'),
                    'theme' => URI,
                ],
                'post_id' => get_the_ID(),
            ]
        );

        // wp_enqueue_script('trackduck', '//cdn.trackduck.com/toolbar/prod/td.js');
        // <script src="//cdn.trackduck.com/toolbar/prod/td.js" async data-trackduck-id="5a5f92697182fe017443e863"></script>

        // CSS
        $cssGlobal = '/dist/styles/main.css';
        wp_enqueue_style('main', fileEnvCheck($cssGlobal), [], versionCacheBuster($cssGlobal), 'all');
    }

}