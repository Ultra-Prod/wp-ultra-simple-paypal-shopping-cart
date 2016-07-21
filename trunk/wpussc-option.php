<?php
/*
Ultra Prod WPUSSC Admin Options
Version: v1.4.5
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
// loading language files
load_plugin_textdomain('WUSPSC', false, WUSPSC_PLUGIN_DIRNAME . '/languages');

/* adding a named option/value in WP : http://codex.wordpress.org/Function_Reference/add_option */
//
add_option('wp_cart_title',					__("Your Shopping Cart", "WUSPSC"));
add_option('wp_cart_empty_text',			__("Your cart is empty", "WUSPSC"));
add_option('wpus_shopping_cart_empty_hide',				'1');
add_option('wpus_shopping_cart_shipping_per_items',		'0');
add_option('wpus_display_link_in_cart',					'1');
add_option('wpus_display_thumbnail_in_cart',			'0');
add_option('wpus_thumbnail_in_cart_width',				'32');
add_option('wpus_thumbnail_in_cart_height',				'32');
add_option('wp_cart_visit_shop_text',		__('Visit The Shop', "WUSPSC"));
add_option('wp_cart_update_quantiy_text',	__('Hit enter or click on reload icon to submit the updated quantity please.', "WUSPSC"));
add_option('wpus_shopping_cart_items_in_cart_hide', '1');
add_option('plural_items_text',				__('products in your cart', "WUSPSC"));
add_option('singular_items_text',			__('product in your cart', "WUSPSC"));
add_option('add_cartstyle',					'wp_cart_button');
add_option('checkout_style',				'wp_checkout_button');
//add_option('use_custom_button',				'0');
add_option('display_product_name',			'0');
add_option('display_product_inline',		'0');
add_option('display_quantity',				'0');
add_option('subtotal_text',					__('Subtotal', "WUSPSC"));
add_option('shipping_text',					__('Shipping', "WUSPSC"));
add_option('total_text',					__('Total', "WUSPSC"));
add_option('item_name_text',				__('Item Name', "WUSPSC"));
add_option('qualtity_text',					__('Quantity', "WUSPSC"));
add_option('price_text',					__('Price', "WUSPSC"));
add_option('vat_text',						__('VAT', "WUSPSC"));
add_option('remove_text',					__("Remove", "WUSPSC"));
add_option('add_cartstyle',					'');
add_option('cart_currency_symbol_order',	'1');
// wpusc_cart_item_qty() default string
add_option('item_qty_string',				'%d item%s in your cart');
add_option('no_item_in_cart_string',		'Cart empty');
add_option('cart_return_from_paypal_url',	get_bloginfo('wpurl'));

function show_wp_cart_options_page () {

	if(isset($_POST['info_update'])) {
		update_option('cart_payment_currency', (string)$_POST["cart_payment_currency"]);
		update_option('cart_currency_symbol', (string)$_POST["cart_currency_symbol"]);
		update_option('cart_currency_symbol_order', (string)$_POST["cart_currency_symbol_order"]);
		update_option('cart_base_shipping_cost', (string)$_POST["cart_base_shipping_cost"]);
		update_option('cart_free_shipping_threshold', (string)$_POST["cart_free_shipping_threshold"]);
		update_option('wpus_shopping_cart_collect_address', ($_POST['wpus_shopping_cart_collect_address']!='') ? 'checked="checked"':'' );
		update_option('wpus_shopping_cart_use_profile_shipping', ($_POST['wpus_shopping_cart_use_profile_shipping']!='') ? 'checked="checked"':'' );

		update_option('cart_paypal_email', (string)$_POST["cart_paypal_email"]);
		update_option('wp_cart_title', (string)$_POST["wp_cart_title"]);

		update_option('wpus_shopping_cart_shipping_per_items', (int)$_POST["wpus_shopping_cart_shipping_per_items"]);
		update_option('display_free_shipping', (int)$_POST["display_free_shipping"]);

		update_option('display_vat', (string)$_POST["display_vat"]);

		// custom button option
		update_option('use_custom_button', (string)$_POST["use_custom_button"]);
		update_option('add_cartstyle', (string)$_POST["add_cartstyle"]);
		update_option('addToCartButtonName', (string)$_POST["addToCartButtonName"]);
		update_option('checkout_style', (string)$_POST["checkout_style"]);
		update_option('checkoutButtonName', (string)$_POST["checkoutButtonName"]);

		update_option('wp_cart_empty_text', (string)$_POST["wp_cart_empty_text"]);
		update_option('wpus_shopping_cart_empty_hide', ($_POST['wpus_shopping_cart_empty_hide']!='') ? 'checked="checked"':'' );
		update_option('wpus_display_link_in_cart', ($_POST['wpus_display_link_in_cart']!='') ? 'checked="checked"':'' );
		update_option('wpus_display_thumbnail_in_cart', ($_POST['wpus_display_thumbnail_in_cart']!='') ? 'checked="checked"':'' );
		update_option('wpus_thumbnail_in_cart_width', (int)$_POST["wpus_thumbnail_in_cart_width"]);
		update_option('wpus_thumbnail_in_cart_height', (int)$_POST["wpus_thumbnail_in_cart_height"]);

		update_option('cart_validate_url', (string)$_POST["cart_validate_url"]);
		update_option('cart_return_from_paypal_url', (string)$_POST["cart_return_from_paypal_url"]);
		update_option('cart_products_page_url', (string)$_POST["cart_products_page_url"]);

		// txt string
		update_option('wp_cart_visit_shop_text', (string)$_POST["wp_cart_visit_shop_text"]);
		update_option('wp_cart_update_quantiy_text', (string)$_POST["wp_cart_update_quantiy_text"]);

		update_option('plural_items_text', (string)$_POST["plural_items_text"]);
		update_option('singular_items_text', (string)$_POST["singular_items_text"]);
		update_option('wpus_shopping_cart_items_in_cart_hide', (string)$_POST["wpus_shopping_cart_items_in_cart_hide"]);

		update_option('display_product_name', (string)$_POST["display_product_name"]);
		update_option('display_product_inline', (string)$_POST["display_product_inline"]);
		update_option('display_quantity', (string)$_POST["display_quantity"]);

		update_option('subtotal_text', (string)$_POST["subtotal_text"]);
		update_option('shipping_text', (string)$_POST["shipping_text"]);
		update_option('total_text', (string)$_POST["total_text"]);
		update_option('item_name_text', (string)$_POST["item_name_text"]);
		update_option('qualtity_text', (string)$_POST["qualtity_text"]);
		update_option('price_text', (string)$_POST["price_text"]);
		update_option('vat_text', (string)$_POST["vat_text"]);
		update_option('item_name_text', (string)$_POST["item_name_text"]);
		update_option('qualtity_text', (string)$_POST["qualtity_text"]);
		update_option('vat_text', (string)$_POST["vat_text"]);
		update_option('remove_text', (string)$_POST["remove_text"]);

		// wpusc_cart_item_qty() string
		update_option('item_qty_string', (string)$_POST["item_qty_string"]);
		update_option('no_item_in_cart_string', (string)$_POST["no_item_in_cart_string"]);

		// sandbox option
		update_option('is_sandbox', (string)$_POST["is_sandbox"]);

		update_option('wpus_shopping_cart_auto_redirect_to_checkout_page', ($_POST['wpus_shopping_cart_auto_redirect_to_checkout_page']!='') ? 'checked="checked"':'' );
		update_option('cart_checkout_page_url', (string)$_POST["cart_checkout_page_url"]);
		update_option('wpus_shopping_cart_reset_after_redirection_to_return_page', ($_POST['wpus_shopping_cart_reset_after_redirection_to_return_page']!='') ? 'checked="checked"':'' );

		update_option('wpus_shopping_cart_image_hide', ($_POST['wpus_shopping_cart_image_hide']!='') ? 'checked="checked"':'' );

		update_option('wp_use_aff_platform', ($_POST['wp_use_aff_platform']!='') ? 'checked="checked"':'' );

		echo '<div id="message" class="updated fade">';
		echo '<p><strong>'. __("Options Updated!", "WUSPSC").'</strong></p></div>';
	}

	$defaultCurrency = get_option('cart_payment_currency');
	if(empty($defaultCurrency)) $defaultCurrency = __("USD", "WUSPSC");

	$defaultSymbol = get_option('cart_currency_symbol');
	if(empty($defaultSymbol)) $defaultSymbol = __("$", "WUSPSC");

	// Symbol order
	$defaultSymbolOrder = get_option('cart_currency_symbol_order');
	if(empty($defaultSymbolOrder)) { $defaultSymbolOrder = "1"; }
	//
	if( $defaultSymbolOrder == "1"){
		$defaultSymbolOrderChecked1 = "checked";
		$defaultSymbolOrderChecked2 = "";
	} elseif( $defaultSymbolOrder == "2") {
		$defaultSymbolOrderChecked1 = "";
		$defaultSymbolOrderChecked2 = "checked";
	} else {
		$defaultSymbolOrderChecked1 = "";
		$defaultSymbolOrderChecked2 = "";
	}

	$baseShipping = get_option('cart_base_shipping_cost');
	if(empty($baseShipping)) $baseShipping = 0;

	$cart_free_shipping_threshold = get_option('cart_free_shipping_threshold');

	$display_vat = get_option('display_vat');

	$defaultEmail = get_option('cart_paypal_email');
	if(empty($defaultEmail)) $defaultEmail = get_bloginfo('admin_email');

	$return_url =  get_option('cart_return_from_paypal_url');
	$cart_validate_url =  get_option('cart_validate_url');

	$title = get_option('wp_cart_title');
	//-if(empty($title)) $title = __("Your Shopping Cart", "WUSPSC");

	$itemQtyString = get_option('item_qty_string');
	if(empty($itemQtyString)) $itemQtyString = __("%d item%s in your cart", "WUSPSC");
	$noItemInCartString = get_option('no_item_in_cart_string');
	if(empty($noItemInCartString)) $noItemInCartString = __("Cart empty", "WUSPSC");

	$option_display_free_shipping = get_option('display_free_shipping');
	$displayFreeShipping = (!empty( $display_free_shipping ))? 'checked="checked"': '';

	$option_wpus_shopping_cart_shipping_per_items = get_option('wpus_shopping_cart_shipping_per_items');
	$wpus_shopping_cart_shipping_per_items = (!empty( $option_wpus_shopping_cart_shipping_per_items ))? 'checked="checked"': '';

// use_custom_button

	$use_custom_button = get_option('use_custom_button');

	if(!empty($use_custom_button))
	{
		$useCustomButton = (get_option('use_custom_button'))? 'checked="checked"': '';

		$add_cartstyle = get_option('add_cartstyle');
		if(empty($add_cartstyle)) $add_cartstyle = "wp_cart_button";

		$addcart_button_name = get_option('addToCartButtonName');
		if(empty($addcart_button_name)) $addcart_button_name = __("Add to Cart", "WUSPSC");

		$checkout_style = get_option('checkout_style');
		if(empty($checkout_style)) $checkout_style = "wp_checkout_button";

		$checkout_button_name = get_option('checkoutButtonName');
		if(empty($checkout_button_name)) $checkout_button_name = __("Checkout", "WUSPSC");
	}

// sandbox
	$defaultSandboxChecked = get_option('is_sandbox');
	$defaultSandboxChecked1 = ($defaultSandboxChecked == "1")? "checked": "";
	$defaultSandboxChecked2 = ($defaultSandboxChecked == "1")? "": "checked";

	$emptyCartText = get_option('wp_cart_empty_text');
	$emptyCartAllowDisplay = get_option('wpus_shopping_cart_empty_hide');

	$cart_products_page_url = get_option('cart_products_page_url');

	$cart_checkout_page_url = get_option('cart_checkout_page_url');
	$wpus_shopping_cart_auto_redirect_to_checkout_page = (get_option('wpus_shopping_cart_auto_redirect_to_checkout_page'))? 'checked="checked"': '';

// added txt string
   	$wp_cart_visit_shop_text = get_option('wp_cart_visit_shop_text');
	$wp_cart_update_quantiy_text = get_option('wp_cart_update_quantiy_text');

	$plural_items_text = get_option("plural_items_text");
	$singular_items_text = get_option("singular_items_text");

	$display_product_name = (get_option('display_product_name'))? 'checked="checked"': '';
	$display_product_inline = (get_option('display_product_inline'))? 'checked="checked"': '';
	$display_quantity = (get_option('display_quantity'))? 'checked="checked"': '';

	$subtotal_text = get_option('subtotal_text');
	$shipping_text = get_option('shipping_text');
	$total_text = get_option('total_text');
	$item_name_text = get_option('item_name_text');
	$qualtity_text = get_option('qualtity_text');
	$price_text = get_option('price_text');
	$vat_text = get_option('vat_text');
	$remove_text = get_option('remove_text');

	$wpus_shopping_cart_reset_after_redirection_to_return_page = (get_option('wpus_shopping_cart_reset_after_redirection_to_return_page'))? 'checked="checked"': '';
	$wpus_shopping_cart_collect_address = (get_option('wpus_shopping_cart_collect_address'))? 'checked="checked"': '';
	$wpus_shopping_cart_use_profile_shipping = (get_option('wpus_shopping_cart_use_profile_shipping'))? 'checked="checked"': '';
	$wp_cart_image_hide = (get_option('wpus_shopping_cart_image_hide'))? 'checked="checked"': '';
	$wp_cart_empty_hide = (get_option('wpus_shopping_cart_empty_hide'))? 'checked="checked"': '';
	$wpus_display_link_in_cart = (get_option('wpus_display_link_in_cart'))? 'checked="checked"': '';

	$wpus_display_thumbnail_in_cart = (get_option('wpus_display_thumbnail_in_cart'))? 'checked="checked"': '';
	$wpus_thumbnail_in_cart_width = get_option('wpus_thumbnail_in_cart_width');
	$wpus_thumbnail_in_cart_height = get_option('wpus_thumbnail_in_cart_height');

	$wpus_shopping_cart_items_in_cart_hide = (get_option('wpus_shopping_cart_items_in_cart_hide'))? 'checked="checked"': '';
	$wp_use_aff_platform = (get_option('wp_use_aff_platform'))? 'checked="checked"': '';

	?>

	<!-- WP UI -->
 	<script type="text/javascript" charset="utf8" >
 		jQuery.noConflict();
 		jQuery(function($) { 
 			$(document).ready(function() { 
 				$( "#tabs" ).tabs(); 
 			});
 		});
 	</script>

	<!-- WP tab display -->
	<div id="tabs">
	<ul>
		<li><a href="#tabs-3"><span class="showme"><?php _e("Do you like WUSPSC ?", "WUSPSC"); ?></span></a></li>
		<li><a href="#tabs-1"><?php _e("Usage", "WUSPSC"); ?></a></li>
		<li><a href="#tabs-2"><?php _e("Settings", "WUSPSC"); ?></a></li>
		<li><a href="#tabs-4"><?php _e("Discount Code", "WUSPSC"); ?></a></li>
		<li><a href="#tabs-6"><?php _e("Support", "WUSPSC"); ?></a></li>
		<li><a href="#tabs-5"><?php _e("Readme", "WUSPSC"); ?></a></li>
	</ul>

	<div id="tabs-1">
 	<h2><div id="icon-edit-pages" class="icon32"></div><?php _e("WP Ultra Simple Shopping Cart Usage", "WUSPSC"); ?> v <?php echo WUSPSC_VERSION; ?></h2>
 	<p><?php _e("For information, updates and detailed documentation, please visit:", "WUSPSC"); ?> <a href="https://www.ultra-prod.com/?p=86">ultra-prod.com</a></p>
	<p><?php _e("For support, please use our dedicated forum:", "WUSPSC"); ?> <a href="https://www.ultra-prod.com/developpement-support/"><?php _e("WPUSPSC Support Forum", "WUSPSC"); ?></a></p>

	<fieldset class="options">
		<p><h4><a href="https://www.paypal.com/fr/mrb/pal=CH4PZVAK2GJAJ"><?php _e("1. create a PayPal account (no cost for basic account)", "WUSPSC"); ?></a></h4>

		<p><h4><?php _e("2. Create post or page presenting the product or service and add caddy shortcode in the post. See example and possibilities following:", "WUSPSC"); ?></h4>
	<ul>
		<ol>
			<?php _e("To add the 'Add to Cart' button simply add the trigger text to a post or page, next to the product. Replace PRODUCT-NAME and PRODUCT-PRICE with the actual name and price.", "WUSPSC"); ?><br>
			<strong>[wp_cart:<?php _e("PRODUCT-NAME", "WUSPSC"); ?>:price:<?php _e("PRODUCT-PRICE", "WUSPSC"); ?>:end]</strong><br>
			<blockquote><?php _e("eg.", "WUSPSC"); ?> [wp_cart:<?php _e("Test Product", "WUSPSC"); ?>:price:15.00:end]</blockquote>
		</ol>

		<ol>
			<?php _e("To add the 'Add to Cart' button on you theme's template files, use &lt;?php echo print_wp_cart_button_for_product('PRODUCT-NAME', PRODUCT-PRICE); ?&gt; . Replace PRODUCT-NAME and PRODUCT-PRICE with the actual name and price.", "WUSPSC"); ?><br>
			<blockquote></blockquote>
		</ol>

		<ol>
			<?php _e("To display the numbers of items in cart use &lt;?php echo wpusc_cart_item_qty(); ?&gt; . The string display are set in the plugin's settings.", "WUSPSC"); ?><br>
			<blockquote></blockquote>
		</ol>

		<ol>
			<?php _e("To use variation of the price use the following trigger text:", "WUSPSC"); ?><br>
			<strong>[wp_cart:<?php _e("PRODUCT-NAME", "WUSPSC"); ?>:price:[<?php _e("VARIATION-NAME", "WUSPSC"); ?>|<?php _e("VARIATION-LABEL1", "WUSPSC"); ?>,<?php _e("VARIATION-PRICE1", "WUSPSC"); ?>|<?php _e("VARIATION-LABEL2", "WUSPSC"); ?>,<?php _e("VARIATION-PRICE2", "WUSPSC"); ?>]:end]</strong><br>
			<blockquote><?php _e("eg.", "WUSPSC"); ?> [wp_cart:<?php _e("Test Product", "WUSPSC"); ?>:price:[<?php _e("Size|Small,1.10|Medium,2.10|Large,3.10", "WUSPSC"); ?>]:end]</blockquote>
		</ol>

		<ol>
			<?php _e("To use variation of the price and shipping use the following trigger text:", "WUSPSC"); ?><br>
			<strong>[wp_cart:<?php _e("PRODUCT-NAME", "WUSPSC"); ?>:price:[<?php _e("VARIATION-NAME", "WUSPSC"); ?>|<?php _e("VARIATION-LABEL1", "WUSPSC"); ?>,<?php _e("VARIATION-PRICE1", "WUSPSC"); ?>|<?php _e("VARIATION-LABEL2", "WUSPSC"); ?>,<?php _e("VARIATION-PRICE2", "WUSPSC"); ?>]:shipping:[<?php _e("Shipping", "WUSPSC"); ?>|<?php _e("VARIATION-LABEL1", "WUSPSC"); ?>,<?php _e("VARIATION-PRICE1", "WUSPSC"); ?>]:end]</strong><br>
			<blockquote><?php _e("eg.", "WUSPSC"); ?> [wp_cart:<?php _e("Test Product", "WUSPSC"); ?>:price:[<?php _e("Size|Small,1.10|Medium,2.10|Large,3.10", "WUSPSC"); ?>]:shipping:[<?php _e("Shipping|normal,6.50|fast,10.00", "WUSPSC"); ?>]:end]</blockquote>
		</ol>

		<ol>
			<?php _e("To use variation control use the following trigger text:", "WUSPSC"); ?><br>
			<strong>[wp_cart:<?php _e("PRODUCT-NAME", "WUSPSC"); ?>:price:<?php _e("PRODUCT-PRICE", "WUSPSC"); ?>:var1[<?php _e("VARIATION-NAME", "WUSPSC"); ?>|<?php _e("VARIATION1", "WUSPSC"); ?>|<?php _e("VARIATION2", "WUSPSC"); ?>|<?php _e("VARIATION3", "WUSPSC"); ?>]:end]</strong><br>
			<blockquote><?php _e("eg.", "WUSPSC"); ?> [wp_cart:<?php _e("Test Product", "WUSPSC"); ?>:price:15:var1[Size|Small|Medium|Large]:end]</blockquote>
		</ol>

		<ol>
			<?php _e("To use variation control with simple shipping use the following trigger text:", "WUSPSC"); ?><br>
			<strong>[wp_cart:<?php _e("PRODUCT-NAME", "WUSPSC"); ?>:price:<?php _e("PRODUCT-PRICE", "WUSPSC"); ?>:shipping:<?php _e("SHIPPING-COST", "WUSPSC"); ?>:var1[<?php _e("VARIATION-NAME", "WUSPSC"); ?>|<?php _e("VARIATION1", "WUSPSC"); ?>|<?php _e("VARIATION2", "WUSPSC"); ?>|<?php _e("VARIATION3", "WUSPSC"); ?>]:end]</strong><br>
			<blockquote><?php _e("eg.", "WUSPSC"); ?> [wp_cart:<?php _e("Test Product", "WUSPSC"); ?>:price:15:shipping:2:var1[<?php _e("Size|Small|Medium|Large", "WUSPSC"); ?>]:end]</blockquote>
		</ol>

		<ol>
			<?php _e("To use multiple variation (unlimited variation) option use the following trigger text:", "WUSPSC"); ?><br>
			<strong>[wp_cart:<?php _e("PRODUCT-NAME", "WUSPSC"); ?>:price:<?php _e("PRODUCT-PRICE", "WUSPSC"); ?>:var1[<?php _e("VARIATION-NAME", "WUSPSC"); ?>|<?php _e("VARIATION1", "WUSPSC"); ?>|<?php _e("VARIATION2", "WUSPSC"); ?>|<?php _e("VARIATION3", "WUSPSC"); ?>]:var2[<?php _e("VARIATION-NAME", "WUSPSC"); ?>|<?php _e("VARIATION1", "WUSPSC"); ?>|<?php _e("VARIATION2", "WUSPSC"); ?>]:end]</strong><br>
			<blockquote><?php _e("eg.", "WUSPSC"); ?> [wp_cart:<?php _e("Test Product", "WUSPSC"); ?>:price:15:shipping:2:var1[<?php _e("Size|Small|Medium|Large", "WUSPSC"); ?>]:var2[<?php _e("Color|Red|Green", "WUSPSC"); ?>]:end]</blockquote>
		</ol>

	</ul>
	</p>
	<p><h4><?php _e("3.a To add the shopping cart to a post or page (eg. checkout page) simply add the shortcode", "WUSPSC"); ?></h4>
		<blockquote><blockquote>
			<?php _e("To display checkout to a post or page, simply add the shortcode", "WUSPSC"); ?> <strong>&#91;show_wp_shopping_cart&#93;</strong><br>
			<?php _e("Or use the sidebar widget to add the shopping cart to the sidebar.", "WUSPSC"); ?>
		</blockquote></blockquote>

		<h4><?php _e('3.b If you want (need) to use the 3 steps cart process do following :', "WUSPSC"); ?></h4>

		<blockquote><blockquote>
		<ol>
			<li><?php _e('Create a page with the shortcode', "WUSPSC"); ?> &#91;validate_wp_shopping_cart&#93;</li>
			<li><?php _e('Create a page with your form (<a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">Contact form 7</a> is the current better choice) and do the following configuration to your form:', "WUSPSC"); ?>
				<ol>
					<li><?php _e('Go to edit your form', "WUSPSC"); ?>,</li>
					<li><?php _e('Scroll down and go to "Additional Settings" text area', "WUSPSC"); ?>,</li>
					<li><?php _e('Paste : on_sent_ok: "location = \'http://example.com/mycart\';" (replace http://example.com/mycart by your own URL) ', "WUSPSC"); ?>,</li>
					<li><?php _e("And create http://example.com/mycart page if not existing, plus past following shortcode inside it", "WUSPSC"); ?> &#91;show_wp_shopping_cart&#93;</li>
				</ol>
			</li>
		</ol>
		<br/>
		<?php _e("This will permit to receive user's input before go on paypal final's validation.", "WUSPSC"); ?><br/>
		<?php _e("The customer will be redirected to cart with paypal button after successful form submit", "WUSPSC"); ?><br/>
		<strong><?php _e('You must use [validate_wp_shopping_cart] shortcode on another page if you want to use the 3 steps process.', "WUSPSC"); ?></strong><br/>

		</blockquote></blockquote>
	</p>
	<p>
		<h4><?php _e('4. Good selling ! If you need help, whether it’s a plugin that causing issues, a theme, or just needed help with styling your site or', "WUSPSC"); ?> <strong>WPUSPSC</strong> <?php _e('…We can help!', "WUSPSC"); ?></h4>

		<blockquote><blockquote>
			<em><strong><a title="Live Ultra Prod Support" href="https://www.ultra-prod.com/live-ultra-prod-staff-support/" target="_blank"><?php _e("Live Support", "WUSPSC"); ?></a></strong></em> <?php _e("for all your needs on ", "WUSPSC"); ?> <em><strong>WordPress</strong></em> <?php _e("or", "WUSPSC"); ?> <strong><em>Prestashop</em></strong>! <?php _e("Support provided by Ultra Prod Staff.", "WUSPSC"); ?>
		</blockquote></blockquote>

	</p>
	</fieldset>

	</div>

<?php

$language = __UP_detect_language();

$eceurl = '<a href="http://www.e-ce.biz" target="_blank">www.e-ce.biz</a>';

echo '<div id="tabs-3">
<h2><div id="icon-users" class="icon32"></div>'.( __("Like sell on major marketplaces ?", "WUSPSC") ).'</h2>
<div id="ecebiz">
<p>'.( __("Have a look on $eceurl if you like sell on major marketplaces worldwide. We offer fix prices, and a huge expertise to help you to put your products UP to market.", "WUSPSC") ).'</p>
<a href="http://www.e-ce.biz"><img src="'.WUSPSC_PLUGIN_IMAGES_URL.'ecebiz.jpg"></a>
</div>
<h2><div id="icon-users" class="icon32"></div>'.( __("Do you like WUSPSC ?", "WUSPSC") ).'</h2>
<div id="helpme">
<p><a href="http://wordpress.org/plugins/wp-ultra-simple-paypal-shopping-cart/" target="_blank">'. __("Please, if you like WUSPSC, think to give it a good rating", "WUSPSC").'</a>'. __(" and please consider to donate 1$ only or more if you can, &#8364; or &pound; to help me to give time for user&#8217;s support, add new features and upgrades.", "WUSPSC").'
	'.( __('After more than 100,000 downloads, <a href="https://www.ultra-prod.com/products-modules-plugin/wp-ultra-simple-paypal-shopping-cart/">only less that 30 users donate</a>.', "WUSPSC") ).'
	<div id="donate">
		<form class="donate" action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="AXQNVXNYWUEZ4">
		<input type="image" src="'.WUSPSC_CART_URL.'/images/btn_donateCC_LG-'.$language.'.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
</p>
</div>
<p>'. __("Or if you like down-tempo / ambiant / electronic music, you can buy a few tracks from one of my CD on Amazon.", "WUSPSC").'</p>
<p>
<ul>
	<li><a href="http://www.amazon.com/s/ref=ntt_srch_drd_B001L5OJSM?ie=UTF8&search-type=ss&index=digital-music&field-keywords=Mike%20Castro%20de%20Maria" target="_blank">Amazon US</a><li>
	<li><a href="http://www.amazon.co.uk/s/ref=ntt_srch_drd_B001L5OJSM?ie=UTF8&search-type=ss&index=digital-music&field-keywords=Mike%20Castro%20de%20Maria" target="_blank">Amazon UK</a><li>
	<li><a href="http://www.amazon.de/s/ref=ntt_srch_drd_B001L5OJSM?ie=UTF8&search-type=ss&index=digital-music&field-keywords=Mike%20Castro%20de%20Maria" target="_blank">Amazon DE</a><li>
	<li><a href="http://www.amazon.fr/s/ref=ntt_srch_drd_B001L5OJSM?ie=UTF8&search-type=ss&index=digital-music&field-keywords=Mike%20Castro%20de%20Maria" target="_blank">Amazon FR</a><li>
</ul>
<img src="'.WUSPSC_PLUGIN_IMAGES_URL.'41dK4t7R6OL._SL500_SS110_.jpg"><img src="'.WUSPSC_PLUGIN_IMAGES_URL.'41RTkTKGzRL._SL500_SS110_.jpg"><img src="'.WUSPSC_PLUGIN_IMAGES_URL.'51oggSX6F0L._SL500_SS110_.jpg"><img src="'.WUSPSC_PLUGIN_IMAGES_URL.'51xQJmJpwuL._SL500_SS110_.jpg">
</p>
<p>'. __("Thanks a lot for your support !!!", "WUSPSC").'<p>
</div>';

echo '<div id="tabs-4">
<h2><div id="icon-edit-comments" class="icon32"></div>'. __("Coupon Code", "WUSPSC").'</h2>
<p>'. __("Do you need discount Code feature?", "WUSPSC").'<p>
<p>'. __("If the answer is yes, please ask it on ", "WUSPSC").'<a target="_blank" href="https://www.ultra-prod.com/developpement-support/">'. __("this Forum thread", "WUSPSC").'</a><p>
</div>';

?>

	<div id="tabs-5">
		<h2><div id="icon-edit-comments" class="icon32"></div><?php _e("WP Ultra Simple Shopping Cart Read ME", "WUSPSC"); ?></h2>
		<div class="content">
			<pre>
			<?php echo file_get_contents('readme.txt', FILE_USE_INCLUDE_PATH); ?>
			</pre>
		</div>
	</div>

	<div id="tabs-6">
		<h2><div id="icon-edit-comments" class="icon32"></div><?php _e("WP Ultra Simple Shopping Cart Support", "WUSPSC"); ?></h2>
		<div class="content">
			<h4><?php _e("Do you need support or new features?", "WUSPSC") ?></h4>
			<p><?php _e("Just ask on", "WUSPSC") ?> <a target="_blank" href="https://www.ultra-prod.com/developpement-support/"><?php _e("WUSPSC Forum", "WUSPSC") ?></a>.<p>

			<h4><?php _e("Do you need quick and direct support?", "WUSPSC") ?></h4>
			<p><?php _e("We can provide you \"Live Support\" for all your WordPress or Prestashop needs!", "WUSPSC") ?> <a target="_blank" href="https://www.ultra-prod.com/live-ultra-prod-staff-support/"><?php _e("click on UP Live Support", "WUSPSC") ?></a>. <?php _e("Support provided by Ultra Prod Staff.", "WUSPSC") ?><p>

			<h4><?php _e("Do you like the WP Ultra Simple Paypal Shopping Cart Plugin?", "WUSPSC") ?></h4>
			<p><?php _e("Please", "WUSPSC") ?> <a target="_blank" href="https://wordpress.org/plugins/wp-ultra-simple-paypal-shopping-cart/"><?php _e("give it a good rating", "WUSPSC") ?></a> <?php _e("on Wordpress website", "WUSPSC") ?>.</p>
		</div>
	</div>

	<div id="tabs-2">
	<h2><div id="icon-options-general" class="icon32"></div><?php _e("WP Ultra Simple Shopping Cart Settings", "WUSPSC"); ?> v <?php echo WUSPSC_VERSION; ?></h2>
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
	<input type="hidden" name="info_update" id="info_update" value="true">

<?php
#qtranslate warning message
if ( function_exists('qtrans_getLanguage') || function_exists('qtranxf_getLanguage') ) { $qtransup = '<div class="ui-widget"><div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"><p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>'.__("<strong>You are using qTranslate or qTranslate-X</strong> if you like to customise the followings strings, please fill the following fields with the qTranslate syntax.", "WUSPSC")."<br>".__("Eg", "WUSPSC")." : [:en]Sub-total[:fr]Sous-total[:de]Zwischensumme[:es]Total parcial".'</p></div></div>'; $qtranstalex_msg = '<tr valign="top"><td colspan="2">'.$qtransup.'</td></tr>'; } else {$qtranstalex_msg = "";}

echo '
<div class="inside">
<table class="form-table">
<!-- Paypal -->
<tr valign="top">
<th scope="row">'. __("Paypal Email Address", "WUSPSC").'</th>
<td><input type="text" name="cart_paypal_email" value="'.$defaultEmail.'" size="40"></td>
</tr>

<tr valign="top">
<th scope="row">'. __("Paypal Sandbox (cart is in test)", "WUSPSC").'</th>
<td>Test: <input type="radio" name="is_sandbox" value="1" '.$defaultSandboxChecked1.'/>&nbsp;Production: <input type="radio" name="is_sandbox" value="0" '.$defaultSandboxChecked2.'/><br> '. __('You must open a free developer account to use sandbox for your tests before go live.<br> Go to <a href="https://developer.paypal.com/">https://developer.paypal.com/</a>, register and connect.', "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Use PayPal Profile Based Shipping", "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_shopping_cart_use_profile_shipping" value="1" '.$wpus_shopping_cart_use_profile_shipping.'><br>'. __("Check this if you want to use", "WUSPSC").' <a href="https://cms.paypal.com/us/cgi-bin/?&cmd=_render-content&content_ID=developer/e_howto_html_ProfileAndTools#id08A9EF00IQY" target="_blank">'. __("PayPal profile based shipping", "WUSPSC").'</a>. '. __("Using this will ignore any other shipping options that you have specified in this plugin.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Must Collect Shipping Address on PayPal", "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_shopping_cart_collect_address" value="1" '.$wpus_shopping_cart_collect_address.'><br>'. __("If checked the customer will be forced to enter a shipping address on PayPal when checking out.", "WUSPSC").'</td>
</tr>

<!-- Settings -->

<tr valign="top">
<th scope="row">'. __("Base Shipping Cost", "WUSPSC").'</th>
<td><input type="text" name="cart_base_shipping_cost" value="'.$baseShipping.'" size="5"> <br>'. __("This is the base shipping cost that will be added to the total of individual products shipping cost. Put 0 if you do not want to charge shipping cost or use base shipping cost.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Free Shipping for Orders Over", "WUSPSC").'</th>
<td><input type="text" name="cart_free_shipping_threshold" value="'.$cart_free_shipping_threshold.'" size="5"> <br>'. __("When a customer orders more than this amount he/she will get free shipping. Leave empty if you do not want to use it.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Shipping fee per item", "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_shopping_cart_shipping_per_items" value="1" '.$wpus_shopping_cart_shipping_per_items.'><br>'. __("By default, shipping fee is multiply by the item's quantity added. If ticked only 1 shipping fee is added per items group.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Free Shipping", "WUSPSC").'</th>
<td><input type="checkbox" name="display_free_shipping" value="1" '.$displayFreeShipping.'><br>'. __(" If ticked, display a shipping free message on cart.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Currency", "WUSPSC").'</th>
<td><input type="text" name="cart_payment_currency" value="'.$defaultCurrency.'" maxlength="3" size="4"> ('. __("e.g.", "WUSPSC").' USD, EUR, GBP, AUD)'. __('Full list on <a target="_blank" href="https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_nvp_currency_codes">PayPal website</a>', "WUSPSC").'</td>
</tr>
<tr valign="top">
<th scope="row">'. __("Currency Symbol", "WUSPSC").'</th>
<td><input type="text" name="cart_currency_symbol" value="'.$defaultSymbol.'" size="2" style="width: 1.5em;"> ('. __("e.g.", "WUSPSC").' $, &#163;, &#8364;)
</td>
</tr>
<tr valign="top">
<th scope="row">'. __("Currency display", "WUSPSC").'</th>
<td>Is the currency symbol is displayed befor or after the price ? <input type="radio" name="cart_currency_symbol_order" value="1" '.$defaultSymbolOrderChecked1.'/> Before or <input type="radio" name="cart_currency_symbol_order" value="2" '.$defaultSymbolOrderChecked2.'/> After
</td>
</tr>
<tr valign="top">
<th scope="row">'. __("Item global VAT", "WUSPSC").'</th>
<td><input type="text" name="display_vat" value="'.$display_vat.'" size="5">%<br>'. __("Add VAT rate. The VAT must be a percentage eg. 19.60. Leave empty to disable it.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Custom buttons", "WUSPSC").'</th>
<td><input type="checkbox" name="use_custom_button" value="1" '.$useCustomButton.'><br>'. __(" If ticked, use following custom id & class on button.", "WUSPSC").'</td>
</tr>
<tr valign="top">
<th scope="row">'. __("Add to Cart button text", "WUSPSC").'</th>
<td><input type="text" name="addToCartButtonName" value="'.$addcart_button_name.'" size="100"><br>'. __("To use a customized 'add to cart' button text, fill with a text or leave empty for using image as button background. Don't forget to add background-image to your theme's style.", "WUSPSC").'</td>
</tr>
<tr valign="top">
<th scope="row">'. __("Cart button id & class name (without the dash or dot)", "WUSPSC").'</th>
<td><input type="text" name="add_cartstyle" value="'.$add_cartstyle.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Checkout button text", "WUSPSC").'</th>
<td><input type="text" name="checkoutButtonName" value="'.$checkout_button_name.'" size="100"><br>'. __("To use a customized 'checkout' button text, fill with a text or leave empty for using image as button background. Don't forget to add background-image to your theme's style.", "WUSPSC").'</td>
</tr>
<tr valign="top">
<th scope="row">'. __("Checkout button id & class name (without the dash or dot)", "WUSPSC").'</th>
<td><input type="text" name="checkout_style" value="'.$checkout_style.'" size="40"></td>
</tr>

<tr valign="top">
<th scope="row">'. __("Display product name", "WUSPSC").'</th>
<td><input type="checkbox" name="display_product_name" value="1" '.$display_product_name.'>'. __(" If ticked, display the product's name, otherwise hide it", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Display Product Options Inline", "WUSPSC").'</th>
<td><input type="checkbox" name="display_product_inline" value="1" '.$display_product_inline.'>'. __(" If ticked, display the product input without line break, otherwise it display each input to a new line.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Display quantity field", "WUSPSC").'</th>
<td><input type="checkbox" name="display_quantity" value="1" '.$display_quantity.'>'. __(" If ticked, display the quantity field to choose quantity before add to cart, otherwise quantity is 1.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Products Page URL", "WUSPSC").'</th>
<td><input type="text" name="cart_products_page_url" value="'.$cart_products_page_url.'" size="100"><br>'. __("This is the URL of your products page if you have any. If used, the shopping cart widget will display a link to this page when cart is empty", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __('Display Products URL in cart', "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_display_link_in_cart" value="1" '.$wpus_display_link_in_cart.'>'. __("If ticked, the product's link will not be display in cart. Activate it if you are using a page or a post for each product.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __('Display thumbnail in cart', "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_display_thumbnail_in_cart" value="1" '.$wpus_display_thumbnail_in_cart.'>'. __("If ticked, the product's thumbnail will not be display in cart. Activate it if you are using a page or a post for each product.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __('Thumbnail size', "WUSPSC").'</th>
<td><input type="text" size="4" name="wpus_thumbnail_in_cart_width" value="'.$wpus_thumbnail_in_cart_width.'"> px / <input type="text" size="4" name="wpus_thumbnail_in_cart_height" value="'.$wpus_thumbnail_in_cart_height.'"> px '. __("Size in pixel of product's thumbnail display in cart. Displayed if product's thumbnail are activate and if you'r using a page or a post for each product.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __('Hide "Cart Empty" message', "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_shopping_cart_empty_hide" value="1" '.$wp_cart_empty_hide.'><br>'. __("If ticked, the shopping cart empty message on page/post or widget will not be display.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __('Hide items count display message', "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_shopping_cart_items_in_cart_hide" value="1" '.$wpus_shopping_cart_items_in_cart_hide.'><br>'. __("If ticked, the items in cart count message on page/post or widget will not be display.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Hide Shopping Cart Image", "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_shopping_cart_image_hide" value="1" '.$wp_cart_image_hide.'><br>'. __("If ticked the shopping cart image will not be shown.", "WUSPSC").'</td>
</tr>

'.$qtranstalex_msg.'

<tr valign="top">
<th scope="row">'. __("Shopping Cart title", "WUSPSC").'</th>
<td><input type="text" name="wp_cart_title" value="'.$title.'" size="40"></td>
</tr>

<tr valign="top">
<th scope="row">'. __("Text/Image to Show When Cart Empty", "WUSPSC").'</th>
<td><input type="text" name="wp_cart_empty_text" value="'.$emptyCartText.'" size="60"><br>'. __("You can either enter plain text or the URL of an image that you want to show when the shopping cart is empty", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __('Singular "product in your cart" text', "WUSPSC").'</th>
<td><input type="text" name="singular_items_text" value="'.$singular_items_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __('Plural "products in your cart" text', "WUSPSC").'</th>
<td><input type="text" name="plural_items_text" value="'.$plural_items_text.'" size="40"></td>
</tr>

<tr valign="top">
<th scope="row">'. __("Subtotal text", "WUSPSC").'</th>
<td><input type="text" name="subtotal_text" value="'.$subtotal_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Shipping text", "WUSPSC").'</th>
<td><input type="text" name="shipping_text" value="'.$shipping_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Total text", "WUSPSC").'</th>
<td><input type="text" name="total_text" value="'.$total_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Item name text", "WUSPSC").'</th>
<td><input type="text" name="item_name_text" value="'.$item_name_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Quantity text", "WUSPSC").'</th>
<td><input type="text" name="qualtity_text" value="'.$qualtity_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Price text", "WUSPSC").'</th>
<td><input type="text" name="price_text" value="'.$price_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("VAT text", "WUSPSC").'</th>
<td><input type="text" name="vat_text" value="'.$vat_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Item count text", "WUSPSC").'</th>
<td><input type="text" name="item_qty_string" value="'.$itemQtyString.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("No item in cart text", "WUSPSC").'</th>
<td><input type="text" name="no_item_in_cart_string" value="'.$noItemInCartString.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Remove text", "WUSPSC").'</th>
<td><input type="text" name="remove_text" value="'.$remove_text.'" size="40"></td>
</tr>
<tr valign="top">
<th scope="row">'. __("Products page URL title", "WUSPSC").'</th>
<td><input type="text" name="wp_cart_visit_shop_text" value="'.$wp_cart_visit_shop_text.'" size="100"></td>
</tr>

<tr valign="top">
<th scope="row">'. __("Return URL", "WUSPSC").'</th>
<td><input type="text" name="cart_return_from_paypal_url" value="'.$return_url.'" size="100"><br>'. __("This is the URL the customer will be redirected to after a successful payment", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Automatic redirection to checkout page", "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_shopping_cart_auto_redirect_to_checkout_page" value="1" '.$wpus_shopping_cart_auto_redirect_to_checkout_page.'>
 '. __("Checkout Page URL", "WUSPSC").': <input type="text" name="cart_checkout_page_url" value="'.$cart_checkout_page_url.'" size="60">
<br>'. __("If checked the visitor will be redirected to the Checkout page after a product is added to the cart. You must enter a URL in the Checkout Page URL field for this to work.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("Reset Cart After Redirection to Return Page", "WUSPSC").'</th>
<td><input type="checkbox" name="wpus_shopping_cart_reset_after_redirection_to_return_page" value="1" '.$wpus_shopping_cart_reset_after_redirection_to_return_page.'>
<br>'. __("If checked the shopping cart will be reset when the customer lands on the return URL (Thank You) page.", "WUSPSC").'</td>
</tr>

<tr valign="top">
<th scope="row">'. __("3 steps cart form URL", "WUSPSC").'</th>
<td><input type="text" name="cart_validate_url" value="'.$cart_validate_url.'" size="100"><p>'. __("Configure this URL if you like to have a form as step 2, before the final paypal cart (use [validate_wp_shopping_cart] shortcod on th first step cart page). Leave empty if you not need this.", "WUSPSC").'<br/>
	'. __('You can install and use <a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">Contact form 7</a> for example and set your form with the following informations.', "WUSPSC").':
	<ol>
		<li>'. __('Go to edit your form', "WUSPSC").',</li>
		<li>'. __('Scroll down and go to "Additional Settings" text area', "WUSPSC").',</li>
		<li>'. __("Paste => on_sent_ok: \"location = 'http://example.com/mycart';\" (replace http://example.com/mycart by your own URL) ", "WUSPSC").',</li>
		<li>'. __("And create http://example.com/mycart page if not existing, plus past [show_wp_shopping_cart] shortcode", "WUSPSC").'</li>
	</ol>
	'. __("This will permit to receive user's input before go on paypal final's validation.", "WUSPSC").'<br/>
	'. __("The customer will be redirected to cart with paypal button after successful form submit", "WUSPSC").'</p>
	</td>
</tr>

</table>

</div>
	<div class="submit">
		<input type="submit" class="button-primary" name="info_update" value="'. __("Update Options &raquo;", "WUSPSC").'">
	</div>
 </form>
 </div>
</div>';

  echo  __("Like the WP Ultra Simple Paypal Shopping Cart Plugin?", "WUSPSC").' <a href="https://wordpress.org/plugins/wp-ultra-simple-paypal-shopping-cart/" target="_blank">'. __("Give it a good rating", "WUSPSC").'</a>';
}

function wp_cart_options() {
	 echo '<div class="wrap"><h2>'. __("WP Ultra simple Paypal Cart Options", "WUSPSC").'</h2>';
	 echo '<div id="poststuff"><div id="post-body">';
	 show_wp_cart_options_page();
	 echo '</div></div>';
	 echo '</div>';
}

// Display The Options Page
function wp_cart_options_page () {
	 add_options_page( __("WP Ultra simple Paypal Cart", "WUSPSC"), __("Ultra simple Cart", "WUSPSC"), 'manage_options', __FILE__, 'wp_cart_options');
}

// Insert the options page to the admin menu
add_action('admin_menu','wp_cart_options_page');

?>
