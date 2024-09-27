<?php

/**
 * Admin assets.
 * 
 * @package Be_Productive_Navigator
 */
declare(strict_types=1);

namespace Be_Productive\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Assets {

    /**
     * Constructor.
     * 
     */
    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_css' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_js' ) );
    }
    
    /**
     * Enqueue css.
     * 
     * @return void
     */
    public function enqueue_css(): void {
        wp_enqueue_style( 'bp-navigator-admin', BP_NAVIGATOR_URL . 'assets/css/admin.css', array(), BP_NAVIGATOR_VERSION );
    }

    /**
     * Enqueue js.
     * 
     * @return void
     */
    public function enqueue_js(): void {
        $asset_file = include( BP_NAVIGATOR_PATH . 'assets/js/admin/settings/settings-build.asset.php' );
		wp_enqueue_script( 'bp-admin-settings', BP_NAVIGATOR_URL . 'assets/js/admin/settings/settings-build.js', $asset_file['dependencies'], $asset_file['version'], true );
		wp_enqueue_style( 'wp-components' );
    }
}
