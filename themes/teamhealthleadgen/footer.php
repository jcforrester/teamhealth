<?php
do_action('pyxl_footer_before');
?>
    <footer class="c-page-footer fluid-container text-center">
        <h3 class="c-page-footer__title">Connect With Us</h3>
        <div class="c-page-footer__social">
            <?php
            if (has_nav_menu('social')) {
                wp_nav_menu([
                    'theme_location'  => 'social',
                    'container'       => 'div',
                    'container_id'    => 'menu-social',
                    'container_class' => 'menu-social',
                    'menu_id'         => 'menu-social-items',
                    'menu_class'      => 'menu-items navbar-nav',
                    'depth'           => 1,
                    'link_before'     => '<span class="screen-reader-text">',
                    'link_after'      => '</span>',
                    'fallback_cb'     => '',
                ]);
            }
            ?>
        </div>
        <p class="c-page-footer__small">
        <span class="c-page-footer__small-text">
            <?php echo wp_kses_post(sprintf('%s &copy; %s', date('Y'), get_bloginfo('name'))); ?>
        </span>
            <span class="c-page-footer__small-text">
                <a href="//teamhealth.com/our-company/human-resources/terms-and-conditions" target="_blank">Terms and Conditions</a>
            </span>
            <span class="c-page-footer__small-text">
                <a href="//teamhealth.com/our-company/human-resources/privacy" target="_blank">Privacy</a>
            </span>
        </p>
    </footer>
    <h1>i used the termninal!</h1>
    <script src="//cdn.trackduck.com/toolbar/prod/td.js" async data-trackduck-id="5a5f92697182fe017443e863"></script>
<?php
wp_footer();
do_action('pyxl_footer_after');

