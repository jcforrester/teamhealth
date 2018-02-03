<?php

use Pyxl\Theme\Navwalkers\WP_Bootstrap_Navwalker;

get_template_part('header-head');
do_action('pyxl_header_before');
?>
    <header class="c-site-header">
        <div class="fluid-container">
            <a class="c-site-header__logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo-mobile.svg"
                     class="c-site-header__logo-mobile" alt="TeamHealth Logo Mobile">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo.svg"
                     class="c-site-header__logo-desktop" alt="TeamHealth Logo">
            </a>
            <button class="c-site-header__nav-icon js-menu-trigger">
                <i class="fal fa-bars"></i>
            </button>
            <div class="c-site-header__menu js-menu">
                <div class="c-main-menu">
                    <?php
                    wp_nav_menu([
                        'menu'            => 'primary',
                        'theme_location'  => 'top',
                        'container'       => 'div',
                        'container_id'    => 'bs4navbar',
                        'container_class' => false,
                        'menu_id'         => false,
                        'menu_class'      => false,
                        'depth'           => 2,
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ]);
                    ?>
                </div>
                <div class="c-site-header__menu-close js-menu-close">
                    <i class="far fa-times"></i>
                </div>
            </div>
        </div>
    </header>
    <h1>LIJ:HLHKSDSDFS:H:</h1>
<?php
do_action('pyxl_header_after');