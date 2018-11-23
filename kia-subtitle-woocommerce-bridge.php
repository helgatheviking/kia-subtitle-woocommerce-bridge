<?php
/*
 * Plugin Name: KIA Subtitle + WooCommerce Bridge
 * Plugin URI: https://gist.github.com/helgatheviking/ffbf9d1c82351fb9220ff91ce61f7518
 * Donate link: https://www.youcaring.com/wnt-residency
 * Description: Show the KIA Subtitle on WooCommerce products.
 * Version: 1.1.0
 * Author: Kathy Darling
 * Author URI: http://kathyisawesome.com
 * Requires at least: 4.5.0
 * Tested up to: 4.9.5
 * WC requires at least: 3.5.0    
 *
 * Copyright: © 2018 Kathy Darling.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */

// Single product.
function kia_add_subtitle_to_single_product(){
	if( function_exists( 'the_subtitle' ) ) the_subtitle( '<h2 class="subtitle">', '</h2>' );
}
add_action( 'woocommerce_single_product_summary', 'kia_add_subtitle_to_single_product', 7 );

// Loop product.
function kia_add_subtitle_to_loop_product(){
	if( function_exists( 'the_subtitle' ) ) the_subtitle( '<h4 class="subtitle">', '</h4>' );
}
add_action( 'woocommerce_shop_loop_item_title', 'kia_add_subtitle_to_loop_product', 20 );

// Shop loop page.
function kia_add_subtitle_to_shop() {
	if( function_exists( 'the_subtitle' ) && function_exists( 'is_shop' ) && is_shop() ) {
		the_subtitle( '<h2 class="subtitle">', '</h2>' );
	}
}
add_action( 'woocommerce_archive_description', 'kia_add_subtitle_to_shop' );

// Cart product.
function kia_add_subtitle_to_cart_product( $title, $cart_item ){
    if( function_exists( 'get_the_subtitle' ) && ( $subtitle = get_the_subtitle( $cart_item['product_id'] ) ) ) {
    	$title .= '<br/><span class="subtitle">' . $subtitle . '</span>';
    }
    return $title;
}
add_filter( 'woocommerce_cart_item_name', 'kia_add_subtitle_to_cart_product', 10, 2 );

// Order product.
function kia_add_subtitle_to_order_product( $title, $order_item ) {
    if( function_exists( 'get_the_subtitle' ) && ( $subtitle = get_the_subtitle( $order_item->get_product_id() ) ) ) {
    	$title .= '<br/><span class="subtitle">' . $subtitle . '</span>';
    }
    return $title;
}
add_filter( 'woocommerce_order_item_name', 'kia_add_subtitle_to_order_product', 10, 2 );


