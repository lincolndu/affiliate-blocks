<?php

/**
 * AFFILIATE Loader.
 *
 * @package AFFILIATE
 */
if (!class_exists('AFFILIATE_Loader')) {

    /**
     * Class AFFILIATE_Loader.
     */
    final class AFFILIATE_Loader {

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

            $this->loader();

            add_action('plugins_loaded', array($this, 'load_plugin'));
            $this->define_constants();
        }

        /**
         * Loads Other files.
         *
         * @since 1.0.0
         *
         * @return void
         */
        public function loader() {
            require( AFB_DIR . 'affiliate-helpers/class-affiliate-helper.php' );
            require( AFB_DIR . 'affiliate-helpers/class-affiliate-core-plugin.php' );
        }

        /**
         * Defines all constants
         *
         * @since 1.0.0
         */
        public function define_constants() {
            define( 'AFFILIATE_TABLET_BREAKPOINT', '1024' );
            define( 'AFFILIATE_MOBILE_BREAKPOINT', '767' );
        }        

    }

    /**
     *  Prepare if class 'AFFILIATE_Loader' exist.
     *  Kicking this off by calling 'get_instance()' method
     */
    AFFILIATE_Loader::get_instance();
}
