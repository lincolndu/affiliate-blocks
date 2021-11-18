<?php
/**
 * AFFILIATE Block Helper.
 *
 * @package AFFILIATE
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'AFFILIATE_Block_js' ) ) {

	/**
	 * Class AFFILIATE_Block_js.
	 */
	class AFFILIATE_Block_js {

		/**
		 * Get Table of Contents Js
		 *
		 * @since 1.13.0
		 * @param array  $attr The block attributes.
		 * @param string $id The selector ID.
		 */
		public static function get_table_of_contents_js( $attr, $id ) {

			$defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-tableof-content']['attributes'];

			$attr          = array_merge( $defaults, (array) $attr );
			$base_selector = ( isset( $attr['classMigrate'] ) && $attr['classMigrate'] ) ? '.affiliate-block-' : '#affiliate-toc-';
			$selector      = $base_selector . $id;

			ob_start();
			?>
			jQuery( document ).ready(function() {
				AFFILIATETOC._run( <?php echo wp_json_encode( $attr ); ?>, '<?php echo esc_attr( $selector ); ?>' );
			});
			<?php
			return ob_get_clean();

		}
	}
}
