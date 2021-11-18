<?php 
// Get the list table class. 
require_once AFB_DIR . 'disableblocks/class-abdgb-list-table.php';

/**
 * [DGB_ADMIN_MENU description]
 */
class ABDGB_Admin_Page {

	/**
	 * Autoload method
	 */
	public function __construct() {

		// Register the submenu.
		add_action( 'load-settings_page_affiliate_blocks', array( $this, 'process_bulk_action' ) ); 
		add_action( 'admin_menu', array( $this, 'register_sub_menu' ), 50 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

	}

	/**
	 * Enqueue the scripts and styles.
	 *
	 * @param string $hook The current page ID.
	 */
	public function enqueue( $hook ) {


		if ( 'settings_page_affiliate_blocks' !== $hook) {
			return;
		}		

		wp_enqueue_style( 'dgb-admin', plugins_url( 'css/style.css', __FILE__ ), array(), '1.0.0' );

		$block_categories = array();
		if ( function_exists( 'gutenberg_get_block_categories' ) ) {
				$block_categories = gutenberg_get_block_categories( get_post() );
		} elseif ( function_exists( 'get_block_categories' ) ) {
				$block_categories = get_block_categories( get_post() );
		}

		wp_add_inline_script(
			'wp-blocks',
			sprintf( 'wp.blocks.setCategories( %s );', wp_json_encode( $block_categories ) ),
			'after'
		);

		do_action( 'enqueue_block_editor_assets' );
		wp_dequeue_script( 'disable_affiliate_blocks' );

		$local_arr = array(
			'disabledBlocks' => get_option( 'dgb_disabled_blocks', array() ),
			'nonce'          => wp_create_nonce( 'dgb_nonce' ),
		);

		$block_registry = WP_Block_Type_Registry::get_instance();
		 
		foreach ( $block_registry->get_all_registered() as $block_name => $block_type ) {
			// Front-end script.
			if ( ! empty( $block_type->editor_script ) ) {
				wp_enqueue_script( $block_type->editor_script );
			}
		}

		wp_enqueue_script( 'dgb-admin', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery', 'wp-blocks', 'wp-element', 'wp-data', 'wp-components', 'wp-block-library' ), '1.1.0' );
		wp_localize_script( 'dgb-admin', 'dgb_object', $local_arr );
		wp_localize_script(
			'dgb-admin',
			'dgb_strings',
			array(
				'enable'  => __( 'Enabled', 'disable_affiliate_blocks' ),
				'disable' => __( 'Disabled', 'disable_affiliate_blocks' ),
			)
		);

	}

	/**
	 * [disable_gutenberg_blocks_add_menu description]
	 */
	public function register_sub_menu() {

		add_submenu_page(
			'options-general.php',
			esc_html__( 'Enable/Disable Affiliate Block Blocks', 'disable_affiliate_blocks' ),
			esc_html__( 'Enable/Disable Affiliate Block Blocks', 'disable_affiliate_blocks' ),
			'activate_plugins',
			'affiliate_blocks',
			array( $this, 'submenu_page_callback' )
		);

	}

	/**
	 * [admin description]
	 */
	public function submenu_page_callback() {

		$table = new ABDGB_List_Table();
		$table->prepare_items();
		?>

		<div class="gutenberg-free-container">
			<div class="top-banner-block" style="background-image: url('<?php echo AFB_URL.'/assets/images/top-banner-blog.png'; ?>');">
				<img src="<?php echo AFB_URL.'/assets/images/logo.png'; ?>" alt="Affiliate Block">		
			</div>
			<div class="tab-block" style="margin-top: 0px;">
				<ul class="custon-tab-list" style="background: #002c51;margin: 0;padding-left: 46px;">
					<li class="custon-tab-li">
						<a class="custon-tab-link tab" data-id="home" href="admin.php?page=affiliate_booster">Affiliate Block</a>
					</li>		
					<li class="custon-tab-li">
						<a class="custon-tab-link tab active" data-id="home" href="options-general.php?page=affiliate_blocks">Enable/Disable Blocks</a>
					</li>		
					<li class="custon-tab-li">
						<a class="custon-tab-link tab" data-id="menu1" href="admin.php?page=affiliate_booster">How to use this plugin</a>
					</li>
					<li class="custon-tab-li">
						<a class="custon-tab-link tab" data-id="themetab" href="admin.php?page=affiliate_booster">Affiliate Block Theme</a>
					</li>
					<!-- <li class="custon-tab-li">
						<a class="custon-tab-link tab" data-id="ab_amazon" href="admin.php?page=affiliate_booster">Amazon Product Advertising API</a>
					</li> -->
				</ul>
				<div class="custom-tab-content">
					<div class="custom-tab-pane custom-container tab-active" data-id="home">
						<div class="custom-row">
							<div class="custom-col-md-12">
								<div class="white-brdr-box left-side-content" style="padding: 15px;">
									<div class="custom-row">
										<div class="custom-col-md-8" style="padding: 0 1%;box-sizing: border-box;">
											<h3 style="margin-top: 20px;">Enable & Disable Blocks</h3>
											<p style="margin-bottom: 0px;">We have more than 25 blocks in AffiliateBooster. The good news is, you can disable the blocks which you do not want. This will improve the speed of your blog and you will have less clutter.</p>
											<p><strong style="font-weight: bold;">Note:</strong> If you have added the block previously, and disable the block here, you previously added block will stop working; so please enable/disable carefully.</p>
										</div>
										<div class="custom-col-md-4" style="padding: 0 1%;box-sizing: border-box; text-align: center;">
											<form action="">
												<input type="hidden" name="allblocks" id="allblocks">
												<input type="hidden" name="action" value="all">
												<input type="hidden" name="page" value="affiliate_blocks">
												<input type="submit" class="btn_enb_disb enb" name="enable" value="Enabled All">
												<input type="submit" class="btn_enb_disb disb" name="disable" value="Disabled All">
											</form>
										</div>
									</div>
									<ul id="ab_enable_disable"></ul>
								</div>
		 					</div>							 
						</div>
					</div>
				</div>
			</div>
		</div> 
		<?php

	} 

	/**
	 * [process_bulk_action description]
	 */
	public function process_bulk_action() {

		if ( isset( $_GET['action'] ) && 'all' == $_GET['action'] ) {
			$allblocks = explode(',',$_GET['allblocks']);
			if(isset($_GET['disable']) && $_GET['disable'] == 'Disabled All'){
				foreach ($allblocks as $key => $value) {
					$this->disable_block( $value );
				}				
			}
			if(isset($_GET['enable']) && $_GET['enable'] == 'Enabled All'){
				foreach ($allblocks as $key => $value) {
					$this->enable_block( $value );
				}
			}
			wp_safe_redirect( admin_url( 'options-general.php?page=affiliate_blocks' ) );
			exit();			
		}

		// Detect when a bulk action is being triggered...
		if ( isset( $_GET['action'] ) && 'disable' === $_GET['action'] ) {

			// In our file that handles the request, verify the nonce.
			$nonce = ( isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '' );
			$block = ( isset( $_GET['block'] ) ? sanitize_text_field( wp_unslash( $_GET['block'] ) ) : '' );

			if ( ! wp_verify_nonce( $nonce, 'dgb_nonce' ) ) {
				die( 'Not today.' );
			} else {
				$this->disable_block( $block );
				wp_safe_redirect( admin_url( 'options-general.php?page=affiliate_blocks' ) );
				exit();
			}
		}

		// Detect when a bulk action is being triggered...
		if ( isset( $_GET['action'] ) && 'enable' === $_GET['action'] ) {

			// In our file that handles the request, verify the nonce.
			$nonce = ( isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '' );
			$block = ( isset( $_GET['block'] ) ? sanitize_text_field( wp_unslash( $_GET['block'] ) ) : '' );

			if ( ! wp_verify_nonce( $nonce, 'dgb_nonce' ) ) {
				die( 'Not today.' );
			} else {
				$this->enable_block( $block );
			}

			wp_safe_redirect( admin_url( 'options-general.php?page=affiliate_blocks' ) );
			exit();
		}

		// If the disable enable action is triggered.
		if ( ( isset( $_POST['action'] ) && 'bulk-enable' === $_POST['action'] )
		|| ( isset( $_POST['action2'] ) && 'bulk-enable' === $_POST['action2'] )
		) {

			$bulk_change_ids = ( isset( $_POST['bulk-change'] ) ? $_POST['bulk-change'] : array() );

			// loop over the array of record IDs and enable them.
			foreach ( $bulk_change_ids as $id ) {
				$this->enable_block( $id );
			}
		}

		// If the disable bulk action is triggered.
		if ( ( isset( $_POST['action'] ) && 'bulk-disable' === $_POST['action'] )
		|| ( isset( $_POST['action2'] ) && 'bulk-disable' === $_POST['action2'] )
		) {

			$bulk_change_ids = ( isset( $_POST['bulk-change'] ) ? $_POST['bulk-change'] : array() );

			// loop over the array of record IDs and disable them.
			foreach ( $bulk_change_ids as $id ) {
				$this->disable_block( $id );
			}
		}

	}

	/**
	 * [disable_block description]
	 *
	 * @param string $name Name of block to disable.
	 */
	public function disable_block( $name ) {

		$blocks = (array) get_option( 'dgb_disabled_blocks', array() );
		if ( ! in_array( $name, $blocks, true ) ) {
			$blocks[] = $name;
		}
		update_option( 'dgb_disabled_blocks', $blocks );

	}

	/**
	 * [disable_block description]
	 *
	 * @param string $name Name of block to enable.
	 */
	public function enable_block( $name ) {

		$blocks     = (array) get_option( 'dgb_disabled_blocks', array() );
		$new_blocks = array();
		if ( in_array( $name, $blocks, true ) ) {
			$new_blocks = array_diff( $blocks, array( $name ) );
		}
		update_option( 'dgb_disabled_blocks', $new_blocks );

	}

}

new ABDGB_Admin_Page();
