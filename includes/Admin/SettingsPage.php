<?php

/**
 * Admin settings page.
 * 
 * @packge Be_Productive_Navigator
 */

declare(strict_types=1);

namespace Be_Productive\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SettingsPage {

    /**
     * Constructor.
     * 
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_menu' ) );
    }

    /**
     * Add menu.
     * 
     * @return void
     */
    public function add_menu(): void {
        add_menu_page(
            __( 'Be Productive Navigator', 'bp-navigator' ),
            __( 'Be Productive Navigator', 'bp-navigator' ),
            'manage_options',
            'bp-navigator',
            array( $this, 'render' ),
            'dashicons-admin-generic',
            20
        );
    }

    /**
     * Render.
     * 
     * @return void
     */
    public function render(): void {
        echo '<div id="bp-navigator-admin-settings"></div>';
    }
}