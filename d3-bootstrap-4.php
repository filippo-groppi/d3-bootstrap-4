<?php

/**
* Plugin Name: D3 Bootstrap 4
* Plugin URI: https://www.derved.com/wp-plugins/d3-suite/d3-bootstrap-4
* Description: Init Bootstrap 4 to Wordpress.
* Version: 0.1
* Author: DERVED®
* Author URI: https://www.derved.com/
**/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

$d3_w3css_plugin_dir_path = WP_PLUGIN_DIR . '/d3-bootstrap-4';

function init_d3_bootstrap_4() {
    include("templates/d3-bootstrap-4.php");
}

add_action( 'wp_head', 'init_d3_bootstrap_4' );


/**
 * Submenu Content
 */

function print_d3_bootstrap_4()  {
    include("templates/d3-submenu-page-content.php");
}


/**
 * Submenu Page
 */

function d3_bootstrap_4_admin_submenu()  {
    add_submenu_page(
        'd3-suite',
        'D3 Bootstrap 4', // page title
        'D3 Bootstrap 4', // menu title
        'manage_options', // capability
        'd3-bootstrap-4', // menu slug
        'print_d3_bootstrap_4'  // callback function
    );
}

/**
 * Menu Content
 */

function d3_bootstrap_4_print_d3_suite()  {
    include("templates/d3-suite-page-content.php");
}

/**
 * Menu Page
 */

function d3_bootstrap_4_admin_menu()
{
    global $menu;
    $menuExist = false;
    foreach ($menu as $item) {
        if (strtolower($item[0]) == strtolower('D3 Suite')) {
            $menuExist = true;
        }
    }
    if (!$menuExist) {
        add_menu_page(
            'D3 Suite', // page title
            'D3 Suite', // menu title
            'manage_options', // capability
            'd3-suite', // menu slug
            'd3_bootstrap_4_print_d3_suite'  // callback function
        );
    }
    d3_bootstrap_4_admin_submenu();
}

add_action( 'admin_menu', 'd3_bootstrap_4_admin_menu' );