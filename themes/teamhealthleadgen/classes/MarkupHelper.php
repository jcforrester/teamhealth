<?php

namespace Pyxl\Theme;

class MarkupHelper
{

    public function __construct()
    {
        add_action('init', [$this, 'init']);
    }

    public function init()
    {
        // add_action('pyxl_header_before', [$this, 'svgSprites']);

        add_action('pyxl_header_after', [$this, 'afterHeader']);
        add_action('pyxl_footer_before', [$this, 'beforeFooter']);

        add_action('pyxl_header_before', [$this, 'beforeHeader']);
        add_action('pyxl_footer_after', [$this, 'afterFooter']);
    }

    public function svgSprites()
    {
        include_once PATH . '/svg/font-awesome-sprites.svg';
    }

    public function afterHeader()
    {
        ?>
        <main id="content">
        <?php
    }

    public function beforeFooter()
    {
        ?>
        </main><!-- #content-->
        <?php
    }

    public function beforeHeader()
    {
        ?>
        <body <?php body_class() ?>>
        <a href="#content" class="sr-only">Skip to content</a>
        <div id="wrapper">
        <?php
        get_template_part('template-parts/top-bar');
    }

    public function afterFooter()
    {
        ?>
        </div><!-- #wrapper-->
        </body>
        <?php
    }
}
