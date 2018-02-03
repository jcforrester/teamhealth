<?php

// https://wordpress.stackexchange.com/questions/3396/create-custom-page-templates-with-plugins
// https://github.com/wpexplorer/page-templater/blob/master/pagetemplater.php

namespace Pyxl\Modules;

class PageTemplateLoader
{

    public static $template_path = PATH . 'page-templates/';

    public static $templates = [
        'flexible-content.php' => 'Modules',
    ];

    public function __construct()
    {
        add_action('init', [$this, 'init']);
    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    public function init()
    {

        // Add a filter to the save post to inject out template into the page cache
        add_filter('wp_insert_post_data', [$this, 'register_project_templates']);

        // Add a filter to the template include to determine if the page has our template assigned and return it's path
        add_filter('template_include', [$this, 'view_project_template']);

        // Add a filter to the wp 4.7 version attributes metabox
        add_filter('theme_page_templates', [$this, 'add_new_template']);

    }

    /**
     * Adds our template to the page dropdown for v4.7+
     *
     */
    public function add_new_template($posts_templates)
    {

        return array_merge($posts_templates, self::$templates);
    }

    /**
     * Adds our template to the pages cache in order to trick WordPress
     * into thinking the template file exists where it doesn't really exist.
     */
    public function register_project_templates($atts)
    {

        // Create the key used for the themes cache
        $cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());

        // Retrieve the cache list.
        // If it doesn't exist, or it's empty prepare an array
        $templates = wp_get_theme()->get_page_templates();
        if (empty($templates)) {
            $templates = [];
        }

        // New cache, therefore remove the old one
        wp_cache_delete($cache_key, 'themes');

        // Now add our template to the list of templates by merging our templates
        // with the existing templates array from the cache.
        $templates = array_merge($templates, self::$templates);

        // Add the modified cache to allow WordPress to pick it up for listing
        // available templates
        wp_cache_add($cache_key, $templates, 'themes', 1800);

        return $atts;

    }

    /**
     * Checks if the template is assigned to the page
     */
    public function view_project_template($template)
    {

        // Return the search template if we're searching (instead of the template for the first result)
        if (is_search()) {
            return $template;
        }

        // Get global post
        global $post;

        // Return template if post is empty
        if (!$post) {
            return $template;
        }

        // todo: Evaluate this if statement
        // Return default template if we don't have a custom one defined
        $page_template_slug = get_post_meta($post->ID, '_wp_page_template', true);

        if (!array_key_exists($page_template_slug, self::$templates)) {
            return $template;
        }

        $file = self::$template_path . $page_template_slug;

        // Just to be safe, we check if the file exist first
        if (file_exists($file)) {
            return $file;
        }
        // Note... the original author of the class ended with an else { echo $file }. I have no clue why.

        // Return template
        return $template;
    }
}