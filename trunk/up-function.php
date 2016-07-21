<?php
/*
Ultra Prod WP Functions
Version: v1
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

/* to do 
if (!function_exists('__UP_activation_notice')) {
	function __UP_activation_notice() {
		global $WUSPSC_options;
		echo '<div class="error fade"><p><strong>' . __('Ultra Simple Paypal Shopping Cart must be configured.', 'WUSPSC' )
			 . ' ' . sprintf( __('Go to %s to enable and configure the plugin.', 'WUSPSC' ), '<a href="' 
			 . admin_url( 'options-general.php?page=' . WUSPSC_PLUGIN_DIRNAME  . '/wp_ultra_simple_shopping_cart.php' ) . '">' 
			 . __('the admin page', 'WUSPSC') . '</a>' ) . '</strong><br />' 
			 . __( 'WUSPSC now supports Quantity.', 'WUSPSC' ) . '</p></div>';
	}
}
//add_action( 'activation_notice', '__UP_defined_error' );
*/

if (!function_exists('__UP_strtolower_utf8')) {
	function __UP_strtolower_utf8($string){
	
	  $__UP_convert_to = array(
		"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u",
		"v", "w", "x", "y", "z", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï",
		"ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "а", "б", "в", "г", "д", "е", "ё", "ж",
		"з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы",
		"ь", "э", "ю", "я"
	  );
	  
	  $__UP_convert_from = array(
		"A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U",
		"V", "W", "X", "Y", "Z", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï",
		"Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж",
		"З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ъ",
		"Ь", "Э", "Ю", "Я"
	  );
	
	  return str_replace($__UP_convert_from, $__UP_convert_to, str_replace(" ", "-", $string));
	}
}

if (!function_exists('__UP_detect_language')) {
	function __UP_detect_language() {
		$langcode = explode(";", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$langcode = explode(",", $langcode['0']);
		if(
			$langcode['0'] != "fr_FR"	||
			$langcode['0'] != "de_DE"	||
			$langcode['0'] != "es_ES"	||
			$langcode['0'] != "it_IT"
		) {
			return "en_US";
		} else {
			return str_replace("-","_", $langcode['0']);
		}
	}
}

/* force jQuery UI Load for admin */
if (!function_exists('__UP_wp_load_scripts')) {
	function __UP_wp_load_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tabs' );
	}
}

/* WP Hooks : http://codex.wordpress.org/Function_Reference/add_action */
add_action( 'admin_print_scripts', '__UP_wp_load_scripts' );

?>