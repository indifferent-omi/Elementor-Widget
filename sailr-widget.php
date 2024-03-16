<?php
/**
 * Plugin Name: Sailr Widget
 * Description: Custom Elementor widget for a pricing section.
 * Version: 1.0
 * Author: Your Name
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Load Text Domain for Internationalization
 */
function sailr_widget_load_textdomain() {
    load_plugin_textdomain( 'sailr-widget', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'sailr_widget_load_textdomain' );

/**
 * Include the widget class file
 */
function include_sailr_widget() {
    require_once( __DIR__ . '/widgets/pricing-widget/widget.php' );
}

add_action( 'elementor/widgets/widgets_registered', 'include_sailr_widget' );

/**
 * Register the widget with Elementor
 */
function register_sailr_widget( $widgets_manager ) {
    include_sailr_widget(); // Ensure class file is included
    $widgets_manager->register( new \Sailr_Widget() );
}

add_action( 'elementor/widgets/register', 'register_sailr_widget' );