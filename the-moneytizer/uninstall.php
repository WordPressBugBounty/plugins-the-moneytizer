<?php 
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}
	delete_option('themoneytizer_user_firstname');
	delete_option('themoneytizer_user_name');
	delete_option('themoneytizer_user_mail');
	delete_option('themoneytizer_user_tel');
	delete_option('themoneytizer_user_address');
	delete_option('themoneytizer_user_city');
	delete_option('themoneytizer_user_zip_code');
	delete_option('themoneytizer_user_country');
	delete_option('themoneytizer_user_plateform');
	delete_option('themoneytizer_user_reason_added');
	delete_option('themoneytizer_user_reason_added_other');
	delete_option('themoneytizer_user_bank_name');
	delete_option('themoneytizer_user_bank_iban');
	delete_option('themoneytizer_user_bank_bic');
	delete_option('themoneytizer_user_bank_namebank');
	delete_option('themoneytizer_user_bank_adressbank');
	delete_option('themoneytizer_user_bank_countrybank');
	delete_option('themoneytizer_user_bank_citybank');
	delete_option('themoneytizer_user_bank_zipbank');
	delete_option('themoneytizer_user_type_structure');
	delete_option('themoneytizer_user_entreprise');
	delete_option('themoneytizer_user_user_siren');
	delete_option('themoneytizer_user_tva');
	delete_option('themoneytizer_user_id');
	delete_option('themoneytizer_user_paypal');
	delete_option('themoneytizer_user_language');
	delete_option('themoneytizer_user_notifications');
	delete_option('themoneytizer_user_bank_iban_inter');
	delete_option('themoneytizer_user_bank_bic_inter');
	delete_option('themoneytizer_user_bank_namebank_inter');
	delete_option('themoneytizer_user_bank_adressbank_inter');
	delete_option('themoneytizer_user_bank_countrybank_inter');
	delete_option('themoneytizer_user_bank_citybank_inter');
	delete_option('themoneytizer_user_bank_zipbank_inter');
	delete_option('themoneytizer_user_logged');
	delete_option('themoneytizer_user_sponsorship_code');
	delete_option( 'themoneytizer_user_sponsorship');
	delete_option( 'themoneytizer_user_password');
	
	#Delete->Site
	delete_option('themoneytizer_site_id');
	delete_option('themoneytizer_site_ads_txt');
	delete_option('themoneytizer_site_cmp');
	delete_option('themoneytizer_site_reset_plugin');
	delete_option('themoneytizer_is_registered');
	delete_option('themoneytizer_site_ads_version');
	delete_option('themoneytizer_site_reason_refus');
	delete_option('themoneytizer_site_url');
	
	#Delete->Internal settings
	delete_option( 'themoneytizer_data_auto_ads_txt');
	delete_option('themoneytizer_data_auto_cmp');
	delete_option('themoneytizer_billing_inter');
	delete_option('themoneytizer_billing_choice');
	delete_option('themoneytizer_plugin_version');
	delete_option('themoneytizer_data_statistics');
	delete_option('themoneytizer_data_lazy');
	delete_option('themoneytizer_data_auto');
	delete_option('themoneytizer_data_auto_ads_txt');
	delete_option('themoneytizer_setting_token');
	delete_option('themoneytizer_setting_init');
	delete_option('themoneytizer_setting_formats');
	delete_option('themoneytizer_data_bills');
	delete_option('themoneytizer_data_introduction');

	#Delete->misc 
	delete_option( 'themoneytizer_setting_init');
	delete_option( 'vu_money');
	delete_option( 'pv_money');
	delete_option( 'newsletter_money');
	delete_option( 'themoneytizer_is_registered');
	delete_option( 'url_money');
	delete_option( 'theme_money');
	delete_option( 'lang_money');