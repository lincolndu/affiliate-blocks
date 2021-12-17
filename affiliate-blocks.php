<?php
/**
 * Plugin Name: Affiliate Blocks Gutenberg - Ultimate Addons for Affiliate
 * Plugin URI: https://github.com/wpyork/affiliate-blocks
 * Description: Affiliate Blocks is a Gutenberg plugin that gives you the functionality to add conversion-optimized elements in your blog posts. Increase your CTR and improve your sales by using this plugin.
 * Author: wpyork
 * Author URI: https://profiles.wordpress.org/wpyork/
 * Version: 1.0.1
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
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
    wp_enqueue_style( 'affiliate-blocks', AFB_URL.'/assets/css/affiliateblocks.css', false, '' );
}
add_action( 'admin_enqueue_scripts', 'affiliate_blocks_load_admin_scripts' );

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
        '<a target="_blank" href="' . esc_url( 'https://profiles.wordpress.org/wpyork/' ) . '">' . __( 'Support', 'affiliate-blocks' ) . '</a>',        
    ) );
    return $links;

}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ab_plugin_action_links' );

final class AffiliateBlocksYork {
    /**
     * construct method
     * */
    public function __construct ( ) {
        add_filter( 'plugin_row_meta', array( $this, '_row_meta'), 10, 2 );
    }
    /**
     * row meta defination
     * */
    public function _row_meta ( $meta_fields, $file ) 
    {
        if ( $file != 'affiliate-blocks/affiliate-blocks.php' ) {
          return $meta_fields;
        }
  
        echo "<style>.affiliate-blocks-rate-stars { display: inline-block; color: #ffb900; position: relative; top: 3px; }.affiliate-blocks-rate-stars svg{ fill:#ffb900; } .affiliate-blocks-rate-stars svg:hover{ fill:#ffb900 } .affiliate-blocks-rate-stars svg:hover ~ svg{ fill:none; } </style>";
  
        $plugin_rate   = "https://wordpress.org/support/plugin/affiliate-blocks/reviews/?rate=5#new-post";
        $plugin_filter = "https://wordpress.org/support/plugin/affiliate-blocks/reviews/?filter=5";
        $plugin_support = "https://wordpress.org/support/plugin/affiliate-blocks/";
        $svg_xmlns     = "https://www.w3.org/2000/svg";
        $svg_icon      = '';
  
        for ( $i = 0; $i < 5; $i++ ) {
            $svg_icon .= "<svg xmlns='" . esc_url( $svg_xmlns ) . "' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>";
        }
        $meta_fields[] = '<a href="' . esc_url( $plugin_support ) . '" target="_blank">' . __( 'Support', 'affiliate-blocks' ) . '</a>';
        // Set icon for thumbsup.
        $meta_fields[] = '<a href="' . esc_url( $plugin_filter ) . '" target="_blank"><span class="dashicons dashicons-thumbs-up"></span>' . __( 'Vote!', 'affiliate-blocks' ) . '</a>';
  
        // Set icon for 5-star reviews. v1.1.22
        $meta_fields[] = "<a href='" . esc_url( $plugin_rate ) . "' target='_blank' title='" . esc_html__( 'Rate', 'affiliate-blocks' ) . "'><i class='affiliate-blocks-rate-stars'>" . $svg_icon . "</i></a>";
  
        return $meta_fields;
    }
}

new AffiliateBlocksYork;

