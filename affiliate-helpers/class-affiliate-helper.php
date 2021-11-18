<?php
/**
 * AFFILIATE Helper.
 *
 * @package AFFILIATE
 */
if (!class_exists('AFFILIATE_Helper')) {

    /**
     * Class AFFILIATE_Helper.
     */
    final class AFFILIATE_Helper {

        /**
         * Member Variable
         *
         * @since 0.0.1
         * @var instance
         */
        private static $instance;

        /**
         * Member Variable
         *
         * @since 0.0.1
         * @var instance
         */
        public static $block_list;

        /**
         * Store Json variable
         *
         * @since 1.8.1
         * @var instance
         */
        public static $icon_json;

        /**
         * Page Blocks Variable
         *
         * @since 1.6.0
         * @var instance
         */
        public static $page_blocks;

        /**
		 * Current Block List
		 *
		 * @since 1.13.4
		 * @var current_block_list
		 */
		public static $current_block_list = array();

        /**
		 * AFF Block Flag
		 *
		 * @since 1.0.11
		 * @var aff_flag
		 */
        public static $aff_flag = false;
        
        /**
		 * Stylesheet
		 *
		 * @since 1.13.4
		 * @var stylesheet
		 */
		public static $stylesheet;

		/**
		 * Script
		 *
		 * @since 1.13.4
		 * @var script
		 */
		public static $script;

        /**
		 * Google fonts to enqueue
		 *
		 * @var array
		 */
		public static $gfonts = array();

        /**
         *  Initiator
         *
         * @since 0.0.1
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
            require( AFB_DIR . 'affiliate-helpers/class-affiliate-config.php' );
            require( AFB_DIR . 'affiliate-helpers/class-affiliate-block-helper.php' );
            require( AFB_DIR . 'affiliate-helpers/class-affiliate-blockjs.php' );
            self::$block_list = AFFILIATE_BOOSTER_Config::get_block_attributes();

            add_action( 'wp', array( $this, 'generate_assets' ), 99 );
            add_action('wp_head', array($this, 'generate_stylesheet'), 80);
            add_action('wp_head', array($this, 'frontend_gfonts'), 120);
            add_action('wp_footer', array( $this, 'generate_script' ), 1000 );
        }

        /**
         * Load the front end Google Fonts.
         */
        /**
		 * Load the front end Google Fonts.
		 */
		public function frontend_gfonts() {

			if ( empty( self::$gfonts ) ) {
				return;
			}
			$show_google_fonts = apply_filters( 'affiliate_blocks_show_google_fonts', true );
			if ( ! $show_google_fonts ) {
				return;
			}
			$link    = '';
			$subsets = array();
			foreach ( self::$gfonts as $key => $gfont_values ) {
				if ( ! empty( $link ) ) {
					$link .= '%7C'; // Append a new font to the string.
				}
				$link .= $gfont_values['fontfamily'];
				if ( ! empty( $gfont_values['fontvariants'] ) ) {
					$link .= ':';
					$link .= implode( ',', $gfont_values['fontvariants'] );
				}
				if ( ! empty( $gfont_values['fontsubsets'] ) ) {
					foreach ( $gfont_values['fontsubsets'] as $subset ) {
						if ( ! in_array( $subset, $subsets, true ) ) {
							array_push( $subsets, $subset );
						}
					}
				}
			}
			if ( ! empty( $subsets ) ) {
				$link .= '&amp;subset=' . implode( ',', $subsets );
			}
			if ( isset( $link ) && ! empty( $link ) ) {
				function affiliate_booster_add_google_fonts() {
 
                    wp_enqueue_style( 'affiliate-blocks-google-fonts', 'https://fonts.googleapis.com/css?family=' . esc_attr( str_replace( '|', '%7C', $link ) ) . '', false ); 
                }
                 
                add_action( 'wp_enqueue_scripts', 'affiliate_booster_add_google_fonts' );
			}
		}        

        /**
         * Parse CSS into correct CSS syntax.
         *
         * @param array  $selectors The block selectors.
         * @param string $id The selector ID.
         * @since 0.0.1
         */
        public static function generate_css($selectors, $id) {
            $styling_css = '';

			if ( empty( $selectors ) ) {
				return '';
			}

			foreach ( $selectors as $key => $value ) {

				$css = '';

				foreach ( $value as $j => $val ) {
                    
					if ( 'font-family' === $j && 'Default' === $val ) {
						continue;
					}
                    
					if ( ! empty( $val ) ) {
						if ( 'font-family' === $j ) {
							$css .= $j . ': "' . $val . '";';
						} else {
							$css .= $j . ': ' . $val . ';';
                        }
                    
					}
				}

				if ( ! empty( $css ) ) {
					$styling_css     .= $id;
					$styling_css     .= $key . '{';
					$styling_css .= $css . '}';
				}
			}

			return $styling_css;
		}

        /**
         * Get CSS value
         *
         * Syntax:
         *
         *  get_css_value( VALUE, UNIT );
         *
         * E.g.
         *
         *  get_css_value( VALUE, 'em' );
         *
         * @param string $value  CSS value.
         * @param string $unit  CSS unit.
         * @since x.x.x
         */
        public static function get_css_value( $value = '', $unit = '' ) {

            if ( '' == $value) {
                return $value;
            }

            $css_val = '';

            if ( !empty( $value ) ) {

                $css_val = esc_attr( $value ) . $unit;
            }

            return $css_val;
        }  


        public static function get_css_value1( $value = '', $unit = '' ) {

            if ( '' == $value) {
                return $value;
            }

            $css_val = '0';

            if ( !empty( $value ) ) {

                $css_val = esc_attr( $value ) . $unit;
            }

            return $css_val;
        }        

        /**
         * Generates CSS recurrsively.
         *
         * @param object $block The block object.
         * @since 0.0.1
         */
        public function get_block_css($block) {

            // @codingStandardsIgnoreStart

            $block = (array) $block;
            
            $name = $block['blockName'];
            $css  = array();
            $js   = '';
            $block_id = '';

            if ( ! isset( $name ) ) {
				return array(
					'css' => array(),
					'js'  => '',
				);
			}

            if (isset($block['attrs']) && is_array($block['attrs'])) {
                $blockattr = $block['attrs'];
                if (isset($blockattr['block_id'])) {
                    $block_id = $blockattr['block_id'];
                }
            }

            self::$current_block_list[] = $name;

            switch ($name) {

                case 'affiliate-blocks/propsandcons':
                    $css += AFFILIATE_Block_Helper::get_propcons_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_propcons_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-comparison-table':
                    $css += AFFILIATE_Block_Helper::get_comparison_table_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_comparison_table_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-callto-action':
                    $css += AFFILIATE_Block_Helper::get_cta_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_cta_gfont( $blockattr );
                    break;                
                case 'affiliate-blocks/ab-single-product':
                    $css += AFFILIATE_Block_Helper::get_sp_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_sp_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-notice-box':
                    $css += AFFILIATE_Block_Helper::get_abnotice_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_abnotice_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-advance-button':
                    $css += AFFILIATE_Block_Helper::get_abbutton_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_abbutton_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-notification-box':
                    $css += AFFILIATE_Block_Helper::get_abnotification_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_abnotification_gfont( $blockattr );
                    break;                    
                case 'affiliate-blocks/ab-toppick-box':
                    $css += AFFILIATE_Block_Helper::get_abtoppick_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_abtoppick_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-product-review':
                    $css += AFFILIATE_Block_Helper::get_abpr_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_abpr_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-tableof-content':
                    $css += AFFILIATE_Block_Helper::get_toc_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_toc_gfont( $blockattr );
                    $js .= AFFILIATE_Block_js::get_table_of_contents_js( $blockattr, $block_id );
                    break;
                case 'affiliate-blocks/ab-star-rating':
                    $css += AFFILIATE_Block_Helper::get_starating_css($blockattr, $block_id);
                    break;                
                case 'affiliate-blocks/ab-icon-list':
                    $css += AFFILIATE_Block_Helper::get_iconlist_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_iconlist_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-dynamic-block':
                    $css += AFFILIATE_Block_Helper::get_dynamicblock_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_iconlist_gfont( $blockattr );
                    break;
                case 'affiliate-blocks/ab-title-block':
                    $css += AFFILIATE_Block_Helper::get_title_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_title_gfont( $blockattr );
                    break;

                //@VICKY NEW BLOCKS   
                case 'affiliate-blocks/ab-coupon1':
                    $css += AFFILIATE_Block_Helper::get_coupon1_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_coupon1_gfont( $blockattr );
                    break;

                case 'affiliate-blocks/ab-coupon2':
                    $css += AFFILIATE_Block_Helper::get_coupon2_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_coupon2_gfont( $blockattr );
                    break;

                case 'affiliate-blocks/ab-coupon3':
                    $css += AFFILIATE_Block_Helper::get_coupon3_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_coupon3_gfont( $blockattr );
                    break;

                case 'affiliate-blocks/ab-coupon4':
                    $css += AFFILIATE_Block_Helper::get_coupon4_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_coupon4_gfont( $blockattr );
                    break;

                case 'affiliate-blocks/ab-ratingbar':
                    $css += AFFILIATE_Block_Helper::get_ratingbar_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_ratingbar_gfont( $blockattr );
                    break;

                case 'affiliate-blocks/ab-star-review':
                    $css += AFFILIATE_Block_Helper::get_star_review_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_star_review_gfont( $blockattr );
                    break;

                case 'affiliate-blocks/ab-product-table-1':
                    $css += AFFILIATE_Block_Helper::get_product_table_1_table_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_product_table_1_table_gfont( $blockattr );
                    break;

                case 'affiliate-blocks/ab-product-table-2':
                    $css += AFFILIATE_Block_Helper::get_product_table_2_table_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_product_table_2_table_gfont( $blockattr );
                    break;    

                case 'affiliate-blocks/ab-product-table-3':
                    $css += AFFILIATE_Block_Helper::get_product_table_3_table_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_product_table_3_table_gfont( $blockattr );
                    break;    

                case 'affiliate-blocks/ab-top-pick-specs':
                    $css += AFFILIATE_Block_Helper::get_abtoppickspecs_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_abtoppickspecs_gfont( $blockattr );
                    break;


                case 'affiliate-blocks/ab-single-product-pros-cons':
                    $css += AFFILIATE_Block_Helper::get_absingleproductproscons_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_absingleproductproscons_gfont( $blockattr );
                    break;


                case 'affiliate-blocks/ab-single-product-specs':
                    $css += AFFILIATE_Block_Helper::get_absingleproductspecs_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_absingleproductspecs_gfont( $blockattr );
                    break;          


                case 'affiliate-blocks/ab-key-points':
                    $css += AFFILIATE_Block_Helper::get_key_points_css($blockattr, $block_id);
                    AFFILIATE_Block_Helper::blocks_key_points_gfont( $blockattr );
                    break;


                default:
                    // Nothing to do here.
                    break;
            }

            if ( isset( $block['innerBlocks'] ) ) {
				foreach ( $block['innerBlocks'] as $j => $inner_block ) {
					if ( 'core/block' === $inner_block['blockName'] ) {
						$id = ( isset( $inner_block['attrs']['ref'] ) ) ? $inner_block['attrs']['ref'] : 0;

						if ( $id ) {
							$content = get_post_field( 'post_content', $id );

							$reusable_blocks = $this->parse( $content );

							$assets = $this->get_assets( $reusable_blocks );

							self::$stylesheet += $assets['css'];
							self::$script     += $assets['js'];
						}
					} else {
						// Get CSS for the Block.
						$inner_assets    = $this->get_block_css( $inner_block );
						$inner_block_css = $inner_assets['css'];

						$css_desktop = ( isset( $css['desktop'] ) ? $css['desktop'] : '' );
						$css_tablet  = ( isset( $css['tablet'] ) ? $css['tablet'] : '' );
						$css_mobile  = ( isset( $css['mobile'] ) ? $css['mobile'] : '' );

						if ( isset( $inner_block_css['desktop'] ) ) {
							$css['desktop'] = $css_desktop . $inner_block_css['desktop'];
							$css['tablet']  = $css_tablet . $inner_block_css['tablet'];
							$css['mobile']  = $css_mobile . $inner_block_css['mobile'];
						}

						$js .= $inner_assets['js'];
					}
				}
			}

            self::$current_block_list = array_unique( self::$current_block_list );

			return array(
				'css' => $css,
				'js'  => $js,
			);

            // @codingStandardsIgnoreEnd
        }

        /**
         * Adds Google fonts all blocks.
         *
         * @param array $load_google_font the blocks attr.
         * @param array $font_family the blocks attr.
         * @param array $font_weight the blocks attr.
         * @param array $font_subset the blocks attr.
         */
        public static function blocks_google_font($load_google_font, $font_family, $font_weight, $font_subset) {

            if (true === $load_google_font) {
                if (!array_key_exists($font_family, self::$gfonts)) {
                    $add_font = array(
                        'fontfamily' => $font_family,
                        'fontvariants' => ( isset($font_weight) && !empty($font_weight) ? array($font_weight) : array() ),
                        'fontsubsets' => ( isset($font_subset) && !empty($font_subset) ? array($font_subset) : array() ),
                    );
                    self::$gfonts[$font_family] = $add_font;
                } else {
                    if (isset($font_weight) && !empty($font_weight)) {
                        if (!in_array($font_weight, self::$gfonts[$font_family]['fontvariants'], true)) {
                            array_push(self::$gfonts[$font_family]['fontvariants'], $font_weight);
                        }
                    }
                    if (isset($font_subset) && !empty($font_subset)) {
                        if (!in_array($font_subset, self::$gfonts[$font_family]['fontsubsets'], true)) {
                            array_push(self::$gfonts[$font_family]['fontsubsets'], $font_subset);
                        }
                    }
                }
            }
        }        

        /**
         * Generates stylesheet and appends in head tag.
         *
         * @since 0.0.1
         */
        public function generate_stylesheet() {

            $this_post = array();
            if ( is_null( self::$stylesheet ) || '' === self::$stylesheet ) {
				return;
			}
            if (is_single() || is_page() || is_404()) {
                global $post;
                $this_post = $post;
                $this->_generate_stylesheet($this_post);
                if (!is_object($post)) {
                    return;
                }
            } elseif (is_archive() || is_home() || is_search()) {
                global $wp_query;

                foreach ($wp_query as $post) {
                    $this->_generate_stylesheet($post);
                }
            }
        }

        /**
         * Generates stylesheet in loop.
         *
         * @param object $this_post Current Post Object.
         * @since 1.7.0
         */
        public function _generate_stylesheet() {
           
			if ( is_null( self::$stylesheet ) || '' === self::$stylesheet ) {
				return;
			}
            ob_start();
			?>
			    <style id="affiliate-style-frontend"><?php echo self::$stylesheet; //phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?></style>
			<?php
			ob_end_flush();
        }

        /**
		 * Print the Script in footer.
		 */
		public function generate_script() {

			if ( is_null( self::$script ) || '' === self::$script ) {
				return;
			}

			ob_start();
			?>
			<script type="text/javascript" id="affiliate-script-frontend"><?php echo self::$script; //phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?></script>
			<?php
			ob_end_flush();
		}

        /**
		 * Generates stylesheet in loop.
		 *
		 * @param object $this_post Current Post Object.
		 * @since 1.7.0
		 */
		public function get_generated_stylesheet( $this_post ) {

			if ( ! is_object( $this_post ) ) {
				return;
			}

			if ( ! isset( $this_post->ID ) ) {
				return;
			}

			if ( has_blocks( $this_post->ID ) && isset( $this_post->post_content ) ) {

				$blocks            = $this->parse( $this_post->post_content );
				self::$page_blocks = $blocks;

				if ( ! is_array( $blocks ) || empty( $blocks ) ) {
					return;
				}

				$assets = $this->get_assets( $blocks );

				self::$stylesheet .= $assets['css'];
				self::$script     .= $assets['js'];
			}
        }
        
        /**
		 * Generates stylesheet and appends in head tag.
		 *
		 * @since 0.0.1
		 */
		public function generate_assets() {

			$this_post = array();

			if ( is_single() || is_page() || is_404() ) {

				global $post;
				$this_post = $post;

				if ( ! is_object( $this_post ) ) {
					return;
				}

				/**
				 * Filters the post to build stylesheet for.
				 *
				 * @param \WP_Post $this_post The global post.
				 */
				$this_post = apply_filters( 'affiliate_post_for_stylesheet', $this_post );

				$this->get_generated_stylesheet( $this_post );

			} elseif ( is_archive() || is_home() || is_search() ) {

				global $wp_query;
				$cached_wp_query = $wp_query;

				foreach ( $cached_wp_query as $post ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					$this->get_generated_stylesheet( $post );
				}
			}
		}

        /**
         * Parse Guten Block.
         *
         * @param string $content the content string.
         * @since 1.1.0
         */
        public function parse($content) {

            global $wp_version;

            return ( version_compare($wp_version, '5', '>=') ) ? parse_blocks($content) : gutenberg_parse_blocks($content);
        }

        /**
		 * Generates stylesheet for reusable blocks.
		 *
		 * @param array $blocks Blocks array.
		 * @since 1.1.0
		 */
		public function get_assets( $blocks ) {

			$desktop = '';
			$tablet  = '';
			$mobile  = '';

			$tab_styling_css = '';
			$mob_styling_css = '';

			$js = '';

			foreach ( $blocks as $i => $block ) {

				if ( is_array( $block ) ) {

					if ( '' === $block['blockName'] ) {
						continue;
					}
					if ( 'core/block' === $block['blockName'] ) {
						$id = ( isset( $block['attrs']['ref'] ) ) ? $block['attrs']['ref'] : 0;

						if ( $id ) {
							$content = get_post_field( 'post_content', $id );

							$reusable_blocks = $this->parse( $content );

							$assets = $this->get_assets( $reusable_blocks );

							self::$stylesheet .= $assets['css'];
							self::$script     .= $assets['js'];

						}
					} else {

                        $block_assets = $this->get_block_css( $block );
                        
						// Get CSS for the Block.
						$css = $block_assets['css'];

						if ( isset( $css['desktop'] ) ) {
							$desktop .= $css['desktop'];
							$tablet  .= $css['tablet'];
							$mobile  .= $css['mobile'];
						}

						$js .= $block_assets['js'];
					}
				}
			}

			if ( ! empty( $tablet ) ) {
				$tab_styling_css .= '@media only screen and (max-width: ' . AFFILIATE_TABLET_BREAKPOINT . 'px) {';
				$tab_styling_css .= $tablet;
				$tab_styling_css .= '}';
			}

			if ( ! empty( $mobile ) ) {
				$mob_styling_css .= '@media only screen and (max-width: ' . AFFILIATE_MOBILE_BREAKPOINT . 'px) {';
				$mob_styling_css .= $mobile;
				$mob_styling_css .= '}';
			}

			return array(
				'css' => $desktop . $tab_styling_css . $mob_styling_css,
				'js'  => $js,
			);
		}

         /**
         * Generates stylesheet in loop.
         *
         * @param array css Current Post Object.
         * @since 1.7.0
         */
        public static function regenerate_stylesheet($css) {
            $regenerate_css = array();
            foreach($css as $key => $value) {
                $mapping_value1 = '   ';
                $mapping_value2 = '';
                
                $value = array_filter($value, function ($element) use ($mapping_value1) { return ($element != $mapping_value1); } );
                $value = array_filter($value, function ($element) use ($mapping_value2) { return ($element != $mapping_value2); } );

                $regenerate_css[$key] = $value;
            }

            return $regenerate_css;
        }

        /**
         * Generates stylesheet for reusable blocks.
         *
         * @param array $blocks Blocks array.
         * @since 1.1.0
         */
        public function get_stylesheet( $blocks ) {

            $desktop = '';
            $tablet  = '';
            $mobile  = '';

            $tab_styling_css = '';
            $mob_styling_css = '';

            foreach ( $blocks as $i => $block ) {

                if ( is_array( $block ) ) {
                    if ( 'core/block' == $block['blockName'] ) {
                        $id = ( isset( $block['attrs']['ref'] ) ) ? $block['attrs']['ref'] : 0;

                        if ( $id ) {
                            $content = get_post_field( 'post_content', $id );

                            $reusable_blocks = $this->parse( $content );

                            $this->get_stylesheet( $reusable_blocks );

                        }
                    } else {
                        // Get CSS for the Block.
                        $css = $this->get_block_css( $block );

                        if ( isset( $css['desktop'] ) ) {
                            $desktop += $css['desktop'];
                            $tablet  += $css['tablet'];
                            $mobile  += $css['mobile'];
                        }
                    }
                }
            }

            if ( ! empty( $tablet ) ) {
                $tab_styling_css += '@media only screen and (max-width: ' . AFFILIATE_TABLET_BREAKPOINT . 'px) {';
                $tab_styling_css += $tablet;
                $tab_styling_css += '}';
            }

            if ( ! empty( $mobile ) ) {
                $mob_styling_css += '@media only screen and (max-width: ' . AFFILIATE_MOBILE_BREAKPOINT . 'px) {';
                $mob_styling_css += $mobile;
                $mob_styling_css += '}';
            }

            echo $desktop . $tab_styling_css . $mob_styling_css;
        }

        /**
         * Get size information for all currently-registered image sizes.
         *
         * @global $_wp_additional_image_sizes
         * @uses   get_intermediate_image_sizes()
         * @link   https://codex.wordpress.org/Function_Reference/get_intermediate_image_sizes
         * @since  1.9.0
         * @return array $sizes Data for all currently-registered image sizes.
         */
        public static function get_image_sizes() {

            global $_wp_additional_image_sizes;

            $sizes       = get_intermediate_image_sizes();
            $image_sizes = array();

            $image_sizes[] = array(
                'value' => 'full',
                'label' => esc_html__( 'Full'),
            );

            foreach ( $sizes as $size ) {
                if ( in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large','Custom-size' ) ) ) {
                    $image_sizes[] = array(
                        'value' => $size,
                        'label' => ucwords( trim( str_replace( array( '-', '_' ), array( ' ', ' ' ), $size ) ) ),
                    );
                } else {
                    $image_sizes[] = array(
                        'value' => $size,
                        'label' => sprintf(
                            '%1$s (%2$sx%3$s)',
                            ucwords( trim( str_replace( array( '-', '_' ), array( ' ', ' ' ), $size ) ) ),
                            $_wp_additional_image_sizes[ $size ]['width'],
                            $_wp_additional_image_sizes[ $size ]['height']
                        ),
                    );
                }
            }

            $image_sizes = apply_filters( 'affiliate_post_featured_image_sizes', $image_sizes );

            return $image_sizes;
        }
        
                /**
         * Get Post Types.
         *
         * @since 1.11.0
         * @access public
         */
        public static function get_post_types() {

            $post_types = get_post_types(
                    array(
                'public' => true,
                'show_in_rest' => true,
                    ), 'objects'
            );

            $options = array();

            foreach ($post_types as $post_type) {
                if ('product' === $post_type->name) {
                    continue;
                }

                if ('attachment' === $post_type->name) {
                    continue;
                }

                $options[] = array(
                    'value' => $post_type->name,
                    'label' => $post_type->label,
                );
            }

            return apply_filters('affiliate_loop_post_types', $options);
        }

        /**
         *  Get - RGBA Color
         *
         *  Get HEX color and return RGBA. Default return RGB color.
         *
         * @param  var   $color      Gets the color value.
         * @param  var   $opacity    Gets the opacity value.
         * @param  array $is_array Gets an array of the value.
         * @since   1.11.0
         */
        static public function hex2rgba($color, $opacity = false, $is_array = false) {

            $default = $color;

            // Return default if no color provided.
            if (empty($color)) {
                return $default;
            }

            // Sanitize $color if "#" is provided.
            if ('#' == $color[0]) {
                $color = substr($color, 1);
            }

            // Check if color has 6 or 3 characters and get values.
            if (strlen($color) == 6) {
                $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
            } elseif (strlen($color) == 3) {
                $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
            } else {
                return $default;
            }

            // Convert hexadec to rgb.
            $rgb = array_map('hexdec', $hex);

            // Check if opacity is set(rgba or rgb).
            if (false !== $opacity && '' !== $opacity) {
                if (abs($opacity) > 1) {
                    $opacity = $opacity / 100;
                }
                $output = 'rgba(' . implode(',', $rgb) . ',' . $opacity . ')';
            } else {
                $output = 'rgb(' . implode(',', $rgb) . ')';
            }

            if ($is_array) {
                return $rgb;
            } else {
                // Return rgb(a) color string.
                return $output;
            }
        }
    }

    /**
     *  Prepare if class 'AFFILIATE_Helper' exist.
     *  Kicking this off by calling 'get_instance()' method
     */
    AFFILIATE_Helper::get_instance();
}
