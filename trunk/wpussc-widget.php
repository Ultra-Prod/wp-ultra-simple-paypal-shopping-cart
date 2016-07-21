<?php
/*
Ultra Prod WPUSSC Widget
Version: v1.3.5
*/
/*
	This program is free software; you can redistribute it
	under the terms of the GNU General Public License version 2,
	as published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
*/
function show_wp_paypal_shopping_cart_widget($args) {
	extract($args);
	$emptyCartAllowDisplay = get_option('wpus_shopping_cart_empty_hide');
	$cart_title = get_option('wp_cart_title');
	$cart_validation_url = get_option('cart_validate_url');

	if(empty($cart_title)) $cart_title = __("Shopping Cart", "WUSPSC");

	echo $before_widget;

	if(cart_not_empty()) {
		if(empty($cart_validation_url)) {
			echo $before_title . $cart_title . $after_title;
			echo print_wpus_shopping_cart("paypal","widget");
		} else {
			echo $before_title . $cart_title . $after_title;
			echo print_wpus_shopping_cart("validate","widget");
		}
	} elseif($emptyCartAllowDisplay == "") {
		echo $before_title . $cart_title . $after_title;
		echo print_wpus_shopping_cart("paypal","widget");
	}

	echo $after_widget;
}

//
add_action('init', 'widget_wp_paypal_shopping_cart_init');

?>