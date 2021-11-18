<?php 
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Main ABDisable_Gutenberg_Blocks Class.
 */
class ABDisable_Gutenberg_Blocks {

	/**
	 * Array of blocks.
	 *
	 * @var ABDisable_Gutenberg_Blocks The one instance.
	 */
	private static $instance = null;

	/**
	 * The object is created from within the class itself
	 * only if the class has no instance.
	 */
	public static function instance() {

		if ( null === self::$instance ) {
			self::$instance = new ABDisable_Gutenberg_Blocks();
		}

		return self::$instance;

	}

	/**
	 * Initialize plugin.
	 */
	private function __construct() {

		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue' ) );
		require_once AFB_DIR . 'disableblocks/class-abdgb-admin-page.php';
		 
	}

	/**
	 * Enqueue the scripts.
	 */
	public function enqueue() {

		if ( function_exists( 'gutenberg_get_block_categories' ) ) {
				$scripts = 'js/scripts-old.js';
		} elseif ( function_exists( 'get_block_categories' ) ) {
				$scripts = 'js/scripts.js';
		}

		wp_enqueue_script( 'disable_affiliate_blocks', plugins_url( $scripts, __FILE__ ), array( 'wp-edit-post' ), '1.0.0', false );
		wp_localize_script( 'disable_affiliate_blocks', 'dgb_blocks', $this->get_disabled_blocks() );

	}

	/**
	 * Get all blocks.
	 */
	public function get_disabled_blocks() {

		return (array) get_option( 'dgb_disabled_blocks', array() );

	}

}
 