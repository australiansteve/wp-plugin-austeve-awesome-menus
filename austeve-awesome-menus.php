<?php

/*
Plugin Name: Awesome Menus
Plugin URI: https://github.com/australiansteve/austeve-awesome-menus
Description: Replace menu item text with FontAwesome icons
Version: 1.0.0
Author: AustralianSteve
Author URI: http://australiansteve.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


class AUSteve_Awesome_Menus {

	protected $replacements = array (
		">Cart<" => "><i class='fa fa-shopping-cart fa-austeve' aria-hidden='true'></i><", 
		">My Account<" => "><i class='fa fa-user fa-austeve' aria-hidden='true'></i><", 
		">Facebook<" => "><i class='fa fa-facebook-official fa-austeve' aria-hidden='true'></i><", 
		">Instagram<" => "><i class='fa fa-instagram fa-austeve' aria-hidden='true'></i><", 
		">Twitter<" => "><i class='fa fa-twitter fa-austeve' aria-hidden='true'></i><", 
		">Pinterest<" => "><i class='fa fa-pinterest fa-austeve' aria-hidden='true'></i><", 
	);

	function __construct() {
		add_filter('wp_nav_menu_items', array($this, 'filter_menu_items'), 10, 2 );
	}

	function filter_menu_items($items, $args) {

		//Do not filter if the menu class contains the magic word
		if (strpos($args->menu_class, 'not-awesome')){
			error_log("Not awesome enough!");
			return $items;
		}

		//Do the replacement
		$replaced = strtr($items, $this->replacements);

		return $replaced;
	}
}

// Create (Font)Awesome Menus!
$awesomeMenus = new AUSteve_Awesome_Menus();

?>
