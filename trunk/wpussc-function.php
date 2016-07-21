<?php
/*
Ultra Prod WPUSSC Functions
Version: v1.3.9
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

$__UP_plug_prefix = "wpussc";

/* jasonwoof utility functions for sanitizing and encoding data */
function jasonwoof_enc_html($str) {
	$str = str_replace('&', '&amp;', $str);
	$str = str_replace('<', '&lt;', $str);
	$str = str_replace('>', '&gt;', $str);
	return $str;
}
function jasonwoof_enc_attr($str) {
	$str = str_replace('&', '&amp;', $str);
	$str = str_replace('"', '&quot;', $str);
	return $str;
}
//sanitize an integer. return 1 if it's blank
function jasonwoof_format_int_1($str) {
	# remove all non-digits
	$str = preg_replace('|[^0-9]|', '', $str);
	# remove leading zeros (but not last digit)
	$str = preg_replace('|^0*([0-9])|', '\1', $str);
	# default to 1 (if there are no digits)
	if($str == '') {
		return '1';
	}
	return $str;
}
/* end jasonwoof */

/* */
function always_show_cart_handler($atts) {
	return print_wpus_shopping_cart();
}

function show_wpus_shopping_cart_handler() {
	$output = (cart_not_empty())? print_wpus_shopping_cart("paypal"): get_the_empty_cart_content();
	return $output;
}

function validate_wpus_shopping_cart_handler() {
	$output = (cart_not_empty())? print_wpus_shopping_cart("validate"): get_the_empty_cart_content();
	return $output;
}

// need to be uddated
function no_notice_get_permalink($post) {

	if (empty($post)) {
		$permlink = '';
	} else {
		$permlink = get_permalink($post);
	}

	return $permlink;
}
//---

function shopping_cart_show($content) {
	if(strpos($content, "<!--show-wp-shopping-cart-->") !== FALSE) {
		if(cart_not_empty()) {
			$content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
			$matchingText = '<!--show-wp-shopping-cart-->';
			$replacementText = print_wpus_shopping_cart();
			$content = str_replace($matchingText, $replacementText, $content);
		}
	}
	return $content;
}

function reset_wp_cart() {
	$products = $_SESSION['ultraSimpleCart'];

	if(empty($products)) {
		unset($_SESSION['ultraSimpleCart']);
		return;
	}
	foreach($products as $key => $item) {
		unset($products[$key]);
	}

	$_SESSION['ultraSimpleCart'] = $products;
}

function get_the_price( $pricestr ){
	$pos = stripos($pricestr, ",");
	if( $pos !== false ) {
		$pricearray = explode(",", $pricestr );
		$price = $pricearray[1];
	} else {
		$price = $pricestr;
	}
	return $price;
}

function get_the_name( $namestr ) {
	// clean the name of the idem to have a better display
	if(preg_match("/\(([^\)]*)\).*/", $namestr, $matched)) {
		$namearray = explode(",", $matched[1] );
		$name = str_ireplace ( $matched[1] , $namearray[0], $namestr );

		$nameVariationArray = explode(")(", $name );

		foreach($nameVariationArray as $item) {
			$nameSmallArray = explode(",", $item );
			//$name = str_ireplace ( $matched[1] , $namearray[0], $nameSmallArray );
		}

		$name = str_ireplace ( ")(", " - ", $name );
	} else {
		$name = $namestr ;
	}

	return $name;
}

function get_the_empty_cart_content() {

	$wp_cart_visit_shop_text = get_option('wp_cart_visit_shop_text');
	$empty_cart_text = get_option('wp_cart_empty_text');
	$emptyCartAllowDisplay = get_option('wpus_shopping_cart_empty_hide');

	$output .= '<div id="empty-cart">';

	if(!empty($empty_cart_text)) {
		if(preg_match("/http/", $empty_cart_text)) {
			$output .= '<img src="'.$empty_cart_text.'" alt="'.$empty_cart_text.'" />';
		} else {
			$output .= '<span class="empty-cart-text">'.$empty_cart_text.'</span>';
		}
	}

	$cart_products_page_url = get_option('cart_products_page_url');
	if(!empty($cart_products_page_url)) {
		$output .= '<a rel="nofollow" href="'.$cart_products_page_url.'">'.$wp_cart_visit_shop_text.'</a>';
	}

	$output .= '</div>';

	if( !$emptyCartAllowDisplay ) {
		return $output;
	}

}

function wp_cart_add_custom_field() {
	if(function_exists('wp_aff_platform_install')) {
		$output = '';
		if(!empty($_SESSION['ap_id'])) {
			$output = '<input type="hidden" name="custom" value="'.$_SESSION['ap_id'].'" id="wp_affiliate" />';
		} elseif (isset($_COOKIE['ap_id'])) {
			$output = '<input type="hidden" name="custom" value="'.$_COOKIE['ap_id'].'" id="wp_affiliate" />';
		}
		return 	$output;
	}
}

function wp_cart_add_read_form_javascript() {
	echo '
	<script type="text/javascript">
	<!--
	//
	function ReadForm (obj1, tst)
	{
		// Read the user form
		var i,j,pos;
		val_total="";
		val_combo="";

		for (i=0; i<obj1.length; i++)
		{
			// run entire form
			obj = obj1.elements[i];		   // a form element

			if(obj.type == "select-one")
			{   // just selects
				if(obj.name == "quantity" ||
					obj.name == "amount") continue;
				pos = obj.selectedIndex;		// which option selected
				val = obj.options[pos].value;   // selected value
				val_combo = val_combo + "(" + val + ")";
			}
		}
		// Now summarize everything we have processed above
		val_total = obj1.product_tmp.value + val_combo;
		obj1.product.value = val_total;
	}
	//-->
	</script>';
}

function wpusc_cart_item_qty() {

	$itemInCart = cart_not_empty();
	$itemQtyString=get_option('item_qty_string');
	$noItemInCartString=get_option('no_item_in_cart_string');

	if( $itemInCart > 0 ) {
		if( $itemInCart == 1 ){ $plural = ""; }
		else { $plural = "s"; }

		$displayQtyString = sprintf($itemQtyString, $itemInCart, $plural);
	} else {
		$displayQtyString = $noItemInCartString;
	}

	return($displayQtyString);
}

function print_payment_currency($price, $symbol, $decimal, $defaultSymbolOrder) {

	switch ( $defaultSymbolOrder ) {

		case "1":
			$priceSymbol = $symbol.number_format($price, 2, $decimal, ',');
			break;

		case "2":
			$priceSymbol = number_format($price, 2, $decimal, ',').$symbol;
			break;

		default:
			$priceSymbol = $symbol.number_format($price, 2, $decimal, ',');
	}

	return $priceSymbol;
	//-	return $symbol.number_format($price, 2, $decimal, ',');
}

function wp_paypal_shopping_cart_widget_control() {
	echo "<p>" . __("Set the Plugin Settings from the Settings menu", "WUSPSC") . "</p>";
}

function widget_wp_paypal_shopping_cart_init() {

	$widget_options = array(
		'classname' => 'widget_wp_paypal_shopping_cart',
		'description' => __("Display WP Ultra Simple Paypal Shopping Cart.", "WUSPSC")
	);

	wp_register_sidebar_widget( 'wp_paypal_shopping_cart_widgets', __("WP Ultra Simple Paypal Shopping Cart", "WUSPSC"), 'show_wp_paypal_shopping_cart_widget', $widget_options);
	wp_register_widget_control('wp_paypal_shopping_cart_widgets', __("WP Ultra Simple Paypal Shopping Cart", "WUSPSC"), 'wp_paypal_shopping_cart_widget_control' );
}

// Add the settings link
function wp_ultra_simple_cart_add_settings_link($links, $file) {
	if($file == plugin_basename(__FILE__)){
		$settings_link = '<a href="options-general.php?page='.dirname(plugin_basename(__FILE__)).'/wp_ultra_simple_shopping_cart.php">'.__("Settings", "WUSPSC").'</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}

add_filter('plugin_action_links', 'wp_ultra_simple_cart_add_settings_link', 10, 2 );

function cart_not_empty() {
	$count = 0;
	if( isset($_SESSION['ultraSimpleCart']) && is_array($_SESSION['ultraSimpleCart'])) {
		foreach($_SESSION['ultraSimpleCart'] as $item)	$count++;
		return $count;
	} else {
		return 0;
	}
}

/* add front-end CSS */
function wuspsc_cart_css() {
	$siteurl = get_option('siteurl');
	$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/wp_ultra_simple_shopping_cart_style.css';
	echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}



/* add admin CSS */
function wuspsc_admin_register_head_cart_css() {
	$siteurl = get_option('siteurl');
	$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/wp_ultra_simple_shopping_cart_admin_style.css';
	echo "<link rel='stylesheet' type='text/css' href='{$url}' />\n";

	$ui_url = "//ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/smoothness/jquery-ui.css";
	echo "<link rel='stylesheet' type='text/css' href='{$ui_url}' />\n";


}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'wuspsc-product-thumb', 64, 64, true ); //(cropped)
}

/* WP Hooks : http://codex.wordpress.org/Function_Reference/add_action */
add_action('wp_head', 'wuspsc_cart_css');
add_action('admin_head', 'wuspsc_admin_register_head_cart_css');

