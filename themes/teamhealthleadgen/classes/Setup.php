<?php

namespace Pyxl\Theme;

class Setup
{

    public function __construct()
    {
        add_action('init', [$this, 'init']);
    }

    /**
     * Initializer.
     */
    public function init()
    {
        $this->menus();
        $this->general();
        $this->registerSidebars();
        add_action('customize_register', [$this, 'customizerOptions'], 99);
    }

    /**
     * Customizer options.
     *
     * @param $wp_customize
     */
    public function customizerOptions($wp_customize)
    {
        $wp_customize->remove_section('themes');
        $wp_customize->remove_section('custom_css');
    }

    /**
     * General.
     */
    public function general()
    {

        add_theme_support('title-tag');

        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');

        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        );

        // add_theme_support( 'custom-logo' );
    }

    /**
     * Menus
     */
    public function menus()
    {

        register_nav_menus([
            'primary_menu' => __('Primary Menu'),
            'social'       => __('Social Menu'),
        ]);
    }

    /**
     * Register Sidebars.
     */
    public function registerSidebars()
    {
        register_sidebar([
            'name'          => esc_html__('Sidebar', 'pyxl-theme'),
            'id'            => 'sidebar',
            'description'   => esc_html__('Add widgets here.', 'pyxl-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]);
    }
}
