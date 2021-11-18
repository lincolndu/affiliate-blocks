<?php

/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package Affiliate
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * PHP version fail error
 *
 * @since 1.0.0
 * @package Affiliate
 */
function affiliate_blocks_fail_php_version() {
    /* translators: %s: PHP version */
    $message = sprintf(esc_html__('Affiliate block for Gutenberg requires PHP version %s+, plugin is currently NOT RUNNING.', AFB_DOMAIN), '5.6');
    $html_message = sprintf('<div class="error">%s</div>', wpautop($message));
    echo wp_kses_post($html_message);
}

/**
 * Enqueue assets for frontend and backend
 *
 * @since 1.0.0
 * @package Affiliate
 */
function affiliate_booster_block_assets() {

    // Load the compiled styles
    wp_enqueue_style('affiliate-block-style-css', plugins_url('dist/blocks.style.build.css', dirname(__FILE__)), array(), filemtime(plugin_dir_path(__FILE__) . 'blocks.style.build.css'));

    // Load the FontAwesome icon library
    wp_enqueue_style('affiliate-block-fontawesome', plugins_url('dist/assets/fontawesome/css/all.css', dirname(__FILE__)), array(), filemtime(plugin_dir_path(__FILE__) . 'assets/fontawesome/css/all.css'));
}

add_action('enqueue_block_assets', 'affiliate_booster_block_assets');

/**
 * Enqueue assets for backend editor
 *
 * @since 1.0.0
 * @package Affiliate Booster
 */
function affiliate_block_editor_assets() {

    // Load the compiled blocks into the editor
    wp_enqueue_script('affiliate-block-js', plugins_url('/dist/blocks.build.js', dirname(__FILE__)), array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor', 'wp-api-fetch' ), '1.0.1');
    // wp_enqueue_script('affiliate-block-js', plugins_url('/dist/blocks.test.js', dirname(__FILE__)), array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor', 'wp-api-fetch' ), '1.0.7');

    // Load the compiled styles into the editor
    wp_enqueue_style('affiliate-block-editor-css', plugins_url('dist/blocks.editor.build.css', dirname(__FILE__)), array('wp-edit-blocks'), filemtime(plugin_dir_path(__FILE__) . 'blocks.editor.build.css'));
}

add_action('enqueue_block_editor_assets', 'affiliate_block_editor_assets');

/**
 * Enqueue assets for backend editor
 *
 * @since 1.0.0
 * @package Affiliate Booster
 */
function affiliate_admin_assets() {

    // Load admin css
    wp_enqueue_style('affiliate-admin-css', plugins_url('dist/assets/admin-style.css', dirname(__FILE__)));
}
add_action('admin_enqueue_scripts', 'affiliate_admin_assets');

/**
 * Load the plugin textdomain
 */
function affiliate_blocks_init() {

    load_plugin_textdomain('affiliate-blocks-textdomain', false, basename(dirname(__FILE__)) . '/languages');
}

add_action('init', 'affiliate_blocks_init');

// Add custom block category
function affiliate_register_category( $categories, $post ) {
    return array_merge(
        $categories, array(
            array(
                'slug' => 'affiliate-blocks',
                'title' => __('Affiliate Block', AFB_DOMAIN),
            ),
        )
    );
}

//PHP version compare
if ( ! version_compare( PHP_VERSION, '5.6', '>=' ) ) {
    add_action('admin_notices', 'affiliate_blocks_fail_php_version');
} else {
    require_once ( AFB_DIR . 'affiliate-helpers/class-affiliate-loader.php');
}


//remove noreferrer on the frontend, *will still show up in the editor.*
function afffiliate_formatter($content) {
    $replace = array("noreferrer " => "" );
    $new_content = strtr($content, $replace);
    return $new_content;
}

//remove noopener on the frontend, *will still show up in the editor.*
function afffiliate_noopener_formatter($content) {
    $replace = array("noopener " => "" );
    $new_content = strtr($content, $replace);
    return $new_content;
}

// add_filter('the_content', 'afffiliate_noopener_formatter', 999);
// add_filter('the_content', 'afffiliate_formatter', 999);