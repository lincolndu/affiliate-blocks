<?php

/**
 * AFFILIATE_Core_Plugin.
 *
 * @package AFFILIATE
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * AFFILIATE_Core_Plugin.
 *
 * @package AFFILIATE
 */
class AFFILIATE_Core_Plugin {

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

        $this->includes();
    }

    /**
     * Includes.
     *
     * @since 1.0.0
     */
    private function includes() {
        require( AFB_DIR . 'affiliate-helpers/class-affiliate-init-blocks.php' );
    }

}

/**
 *  Prepare if class 'AFFILIATE_Core_Plugin' exist.
 *  Kicking this off by calling 'get_instance()' method
 */
AFFILIATE_Core_Plugin::get_instance();
