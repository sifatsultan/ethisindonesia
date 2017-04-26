<?php

/** My Account Tabs **/
function wpb_woo_my_account_order() {
 $myorder = array(
 //'my-custom-endpoint' => __( 'My Stuff', 'woocommerce' ),
 'dashboard' => __( 'Dashboard', 'woocommerce' ),
 'orders' => __( 'My Orders', 'woocommerce' ),
 'edit-account' => __( 'My Details', 'woocommerce' ),
 //'downloads' => __( 'Download MP4s', 'woocommerce' ),
 'edit-address' => __( 'My Address', 'woocommerce' ),
 //'payment-methods' => __( 'Payment Methods', 'woocommerce' ),
 'customer-logout' => __( 'Logout', 'woocommerce' ),
 );
 return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );

/* Members only shortcode */
function member_check_shortcode($atts, $content = null) {
	if (is_user_logged_in() && !is_null($content) && !is_feed()) {
		return do_shortcode($content);
	}
	return '<p>Please <a href="/my-account/">login</a> to view the contents.</p>';
}
add_shortcode('member', 'member_check_shortcode');

//* Gravity Form placeholder label
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/* Log out viewers only shortcode */
function logout_member_check_shortcode($atts, $content = null) {
	if (!is_user_logged_in()) {
		return do_shortcode($content);
	}
	return '';
}
add_shortcode('logout', 'logout_member_check_shortcode');


/* Allow weak passwords */
function wc_ninja_remove_password_strength() {
	if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
		wp_dequeue_script( 'wc-password-strength-meter' );
	}
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );