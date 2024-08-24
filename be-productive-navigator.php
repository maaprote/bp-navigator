<?php
/**
 * Plugin Name: Be Productive Navigator
 * Description: Command palette to navigate fastly through your website pages.
 * Version:     1.0.0
 * Author:      Rodrigo Teixeira
 * Author URI:  https://github.com/maaprote/
 * License:     GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: bp-navigator
 * Domain Path: /languages
 *
 * WC requires at least: 6.0
 * WC tested up to: 8.8.3
 *
 * @package Be_Productive_Navigator
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

define( 'BP_NAVIGATOR_VERSION', '1.0.0' );
define( 'BP_NAVIGATOR_URL', plugin_dir_url( __FILE__ ) );
define( 'BP_NAVIGATOR_PATH', plugin_dir_path( __FILE__ ) );

use Be_Productive\Views\Navigator;
use Be_Productive\Utils\Utils;

class BP_Navigator {

    /**
     * Cosntructor.
     * 
     */
    public function __construct() {
        require 'vendor/autoload.php';

        // Textdomain.
        add_action( 'init', array( $this, 'load_textdomain' ) );

        // Render the Navigator.
        new Navigator();
    }

    /**
     * Load textdomain.
     * 
     * @return void
     */
    public function load_textdomain() {
        load_plugin_textdomain( 'bp-navigator', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }
}

new BP_Navigator();