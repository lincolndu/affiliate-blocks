<?php
/**
 * Plugin Name: Affiliate Blocks
 * Plugin URI: 
 * Description: affiliate-blocks — is a Gutenberg plugin
 * Author: wpyork
 * Author URI: 
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('AFB_DOMAIN', 'affiliate-blocks');
define('AFB_DIR', plugin_dir_path(__FILE__));
define('AFB_URL', plugins_url('/', __FILE__));

/**
 * Initialize the blocks
 */ 
function affiliate_blocks_gutenberg_loader() {
    /**
     * Load the blocks functionality
     */
    require_once ( AFB_DIR . 'dist/init.php');
    // require_once ( AFB_DIR . 'disableblocks/class-abdisable-gutenberg-blocks.php');

    include_once ABSPATH . 'wp-admin/includes/plugin.php';

    if ( is_plugin_active( 'gutenberg/gutenberg.php' ) || version_compare( get_bloginfo( 'version' ), '4.9.9', '>' ) ) {
        // ABDisable_Gutenberg_Blocks::instance();
    }

}

add_action('plugins_loaded', 'affiliate_blocks_gutenberg_loader');

/**
 * Load the plugin text-domain
 */
function affiliate_blocks_gutenberg_init() {
    load_plugin_textdomain('affiliate-blocks', false, basename(dirname(__FILE__)) . '/languages');
}

add_action('init', 'affiliate_blocks_gutenberg_init');

/**
 * Load the plugin welcome page css
 */
function affiliate_blocks_load_admin_scripts( $hook ) {
    wp_enqueue_style( 'affiliatebooster-welcome', AFB_URL.'/assets/css/affiliatebooster-welcome.css', false, '' );
}
add_action( 'admin_enqueue_scripts', 'affiliate_blocks_load_admin_scripts' );


/**
 * Add a check for our plugin before redirecting
 */
function affiliate_blocks_gutenberg_activate() {
    add_option('affiliate_blocks_gutenberg_do_activation_redirect', true);
}

register_activation_hook(__FILE__, 'affiliate_blocks_gutenberg_activate');

/**
 * Redirect to the Affiliate Block page on single plugin activation
 */
function affiliate_blocks_gutenberg_redirect() {
    if ( get_option( 'affiliate_blocks_gutenberg_do_activation_redirect', false ) ) {
        delete_option( 'affiliate_blocks_gutenberg_do_activation_redirect' );
        if( !isset( $_GET['activate-multi'] ) ) {
            wp_redirect( "admin.php?page=affiliate_blocks" ); 
        }
    }
}
add_action( 'admin_init', 'affiliate_blocks_gutenberg_redirect' );

/**
 * Adds a menu item for the affiliate-blocks page.
 *
 * since 1.0.0
 */
function affiliate_blocks_getting_started_menu() {

    add_menu_page(
        __( 'Affiliate Blocks', 'affiliate-blocks' ),
        __( 'Affiliate Blocks', 'affiliate-blocks' ),
        'manage_options',
        'affiliate_blocks',
        'affiliate_blocks_welcome_page',
        AFB_URL.'/assets/images/icon.png'
    );

}
add_action( 'admin_menu', 'affiliate_blocks_getting_started_menu' );


/**
 * Outputs the markup used on the affiliate-blocks
 *
 * since 1.0.0
 */
function affiliate_blocks_welcome_page() {
    echo 'Welcome to this plugin';
    // require_once plugin_dir_path( __FILE__ ) . 'src/welcome.php';
}


/**
 * Create Affiliate Block Categories
 */
if ( version_compare( $GLOBALS['wp_version'], '5.8', '<' ) ) {
    add_filter( 'block_categories', 'affiliate_blocks_block_category', 10, 2 );
} else {
    add_filter( 'block_categories_all', 'affiliate_blocks_block_category', 10, 2 );
}

function affiliate_blocks_block_category( $categories, $post ) 
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'affiliate-blocks',
                'title' => __( 'Affiliate Block', 'affiliate-blocks' ),
            ),
        )
    );
   
}


/**
 * Add plugin action links.
 *
 * Add a link to the settings page on the plugins.php page.
 *
 * @since 1.0.0
 *
 * @param  array  $links List of existing plugin action links.
 * @return array         List of modified plugin action links.
 */
function ab_plugin_action_links( $links ) {

    $links = array_merge($links, array(
        '<a href="' . esc_url( admin_url( '/?page=affiliate_blocks' ) ) . '">' . __( 'Settings', 'affiliate-blocks' ) . '</a>',        
    ) );

    $links = array_merge($links, array(
        '<a target="_blank" href="' . esc_url( 'https://wpyork.com/support/' ) . '">' . __( 'Support', 'affiliate-blocks' ) . '</a>',        
    ) );
    return $links;

}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ab_plugin_action_links' );





