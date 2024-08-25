<?php

/**
 * Nav Menu.
 * 
 * @package Be_Productive_Navigator
 */

declare(strict_types=1);

namespace Be_Productive\Rest;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class NavMenu {

    /**
     * Constructor.
     * 
     */
    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }

    /**
     * Register routes.
     * 
     * @return void
     */
    public function register_routes(): void {
        register_rest_route( 'bp-navigator/v1', '/nav-menus', array(
            'methods' => 'GET',
            'callback' => array( $this, 'get_nav_menus' ),
            'permission_callback' => '__return_true',
        ) );
    }

    /**
     * Get nav menus.
     * 
     * @return array
     */
    public function get_nav_menus(): array {
        $nav_menus = wp_get_nav_menus();
        $menus = array();
        
        foreach ( $nav_menus as $nav_menu ) {
            $menus[] = array(
                'id' => $nav_menu->term_id,
                'name' => $nav_menu->name,
            );
        }

        return $menus;
    }
}