<?php

/**
 * Navigator.
 * 
 * @package Be_Productive_Navigator
 */

declare(strict_types=1);

namespace Be_Productive\Views;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Be_Productive\Utils;

class Navigator {
    
    /**
     * Constructor.
     * 
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'wp_footer', array( $this, 'render' ), 10, 9999 );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_footer', array( $this, 'render' ), 10, 9999 );
    }

    /**
     * Enqueue scripts.
     * 
     * @return void
     */
    public function enqueue_scripts(): void {
        $asset_file = include( BP_NAVIGATOR_PATH . 'assets/js/navigator/index-build.asset.php' );

		wp_enqueue_style( 'wp-components' );
		wp_enqueue_script( 'bp-navigator-app', BP_NAVIGATOR_URL . 'assets/js/navigator/index-build.js', $asset_file['dependencies'], $asset_file['version'], true );
        wp_localize_script( 'bp-navigator-app', 'beProductiveNavigator', array(
            'adminUrl' => admin_url(),
            'restUrl' => get_rest_url(),
            'nonce' => wp_create_nonce( 'bp-wp-rest-sec' ),
            'shortcutsOptionsList' => Utils::get_shortcuts_options_list(),
        ) );
    }

    /**
     * Render.
     * 
     * @return void
     */
    public function render(): void {
        ?>
        <div id="bp-navigator-app"></div>
        <?php
    }        
}