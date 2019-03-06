<?php
/**
 * Plugin Name: Icon4Menu
 * Plugin URI: https://github.com/muhammedfatih/icon4menu
 * Description: Helps the usage of country flag icons on menus
 * Version: 0.2
 * Author: Muhammed Fatih
 * Author URI: https://www.mfatih.com
 */
add_filter('wp_nav_menu_objects', 'insertIconToMenuItemOnPages', 10, 2);

function insertIconToMenuItemOnPages( $items, $args ) {
	foreach( $items as &$item ) {
		if( preg_match("#\[(.*?)\](.*)#", "{$item->title}", $titleParts) && count($titleParts)>2) {
			$item->title = '<i class="flag-icon flag-icon-'.strtolower($titleParts[1]).'"></i> '.$titleParts[2];
		}
    }
	return $items;	
}

add_action('wp_enqueue_scripts', 'insertIcon2Menu');
function insertIcon2Menu() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style('flag-icon.min.css', $plugin_url . '/css/flag-icon.min.css');
    wp_enqueue_script('flag-icon.js', $plugin_url. '/js/docs.js');
}
