<?php
/**
 * Plugin Name: Icon4Menu
 * Plugin URI: https://github.com/muhammedfatih/icon4menu
 * Description: Helps the usage of country flag icons on menus
 * Version: 0.0.1
 * Author: Muhammed Fatih
 * Author URI: https://www.mfatih.com
 */
add_filter('wp_nav_menu_objects', 'insertIconToMenuItemOnPages', 10, 2);

function insertIconToMenuItemOnPages( $items, $args ) {
	foreach( $items as &$item ) {
		if( preg_match("#\[(.*?)\](.*)#", "{$item->title}", $titleParts) && count($titleParts)>2) {
			$item->title = '<i class="flag-icon flag-icon-'.$titleParts[1].'"></i> '.$titleParts[2];
		}
    }
	return $items;	
}

add_action('wp_enqueue_scripts', 'insertIcon2Menu');
function insertIcon2Menu() {
    wp_register_style('namespace', 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.css');
    wp_enqueue_style('namespace');
}
