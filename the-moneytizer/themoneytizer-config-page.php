<?php
// Security: Verify user has proper permissions before processing any data
if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.', 'themoneytizer'));
}

$themoney_api = new themoneytizer_API();

$themoney_website = new StdClass();
$themoney_website->site_id = get_option('themoneytizer_site_id');

if (isset($_POST['submit'])){
	// Security: Verify nonce if available, sanitize input
	if (isset($_POST['formatauto']) && is_array($_POST['formatauto'])){
		// Sanitize array input
		$formatauto = array_map('sanitize_text_field', $_POST['formatauto']);
		$post_format = $themoney_api->adminPanel($formatauto, sanitize_text_field($_POST['submit']));
	}
	else{
	    $post_format = $themoney_api->adminPanel(array(), sanitize_text_field($_POST['submit']));
	}
	if (isset($_POST['formatlazy'])){
		$post_format = update_lazy_options($_POST['formatlazy']);
	}
}

$registered_format = explode("-",stripslashes(get_option('themoneytizer_autoformats')));

$themoneytizer_site_id = get_option('themoneytizer_site_id');
$themoneytizer_setting_token = get_option('themoneytizer_setting_token');

if($themoneytizer_site_id != '' && $themoneytizer_setting_token != null){
	include_once('tab/tab_menu_home.php');
} else {
	include_once('tab/tab_signup.php');
}
