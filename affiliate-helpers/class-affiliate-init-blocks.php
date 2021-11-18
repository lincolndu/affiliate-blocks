<?php

/**
 * AFFILIATE_Init_Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package AFFILIATE
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * AFFILIATE_Init_Blocks.
 *
 * @package AFFILIATE
 */
class AFFILIATE_Init_Blocks {

    /**
     * Member Variable
     *
     * @var instance
     */
    private static $instance;

    /**
     *  Initiator
     */
    public static function get_instance() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    public function __construct() {

        add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
        // Hook: Editor assets.
        add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );
        
    }

    /**
	 * Enqueue Gutenberg block assets for both frontend + backend.
	 *
	 * @since 1.0.0
	 */
	public function block_assets() {
        
		$blocks          = AFFILIATE_BOOSTER_Config::get_block_attributes();
		$block_assets    = AFFILIATE_BOOSTER_Config::get_block_assets();

		foreach ( $blocks as $slug => $value ) {
			$js_assets = ( isset( $blocks[ $slug ]['js_assets'] ) ) ? $blocks[ $slug ]['js_assets'] : array();

				foreach ( $js_assets as $asset_handle => $val ) {
					// Scripts.
					wp_register_script( $val, $block_assets[ $val ]['src'],$block_assets[ $val ]['dep'], '2.1.8');

					$skip_editor = isset( $block_assets[ $val ]['skipEditor'] ) ? $block_assets[ $val ]['skipEditor'] : false;

					// if ( is_admin() && false === $skip_editor ) {
						wp_enqueue_script( $val );
					// }
				}
	    	}

	} // End function editor_assets().

        // End function editor_assets().

    /**
     * Enqueue Gutenberg block assets for backend editor.
     *
     * @since 1.0.0
     */
    function editor_assets() {

        wp_localize_script(
            'affiliate-block-js', 'affiliate_blocks_info', array(
                'blocks' => AFFILIATE_BOOSTER_Config::get_block_attributes(),
                'category' => 'affiliate-blocks',
                'ajax_url' => admin_url('admin-ajax.php'),
                'tablet_breakpoint' => AFFILIATE_TABLET_BREAKPOINT,
                'mobile_breakpoint' => AFFILIATE_MOBILE_BREAKPOINT,                
                'image_sizes' => AFFILIATE_Helper::get_image_sizes(),
            )
        );
    }

// End function editor_assets().
}

/**
 *  Prepare if class 'AFFILIATE_Init_Blocks' exist.
 *  Kicking this off by calling 'get_instance()' method
 */
AFFILIATE_Init_Blocks::get_instance();
