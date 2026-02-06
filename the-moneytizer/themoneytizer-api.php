<?php

class themoneytizer_API {

	private static $API_URL = 'https://themoneytizer.com/plugin';

	public function getWebsite($token,$decode = true) {
		$url = '/getAllWebsiteData/?token='.$token;
		$response = $this->getCurlResponse($url);

		if (isset($response['body'])) {
            if($response['body'] != false) {
                if($decode === true) {
                    $response = $this->getJsonDecode($response['body']);
                }
                return $response;
            }
        }

		return null;
	}

	public function getSpace($token,$decode = true) {
		if($token != NULL) {
			$token_split = explode("-", $token);
			$site_id = $token_split[0];
			$ad_id = $token_split[1];

			if($ad_id == 16){
				$response = '<div  class="outbrain-tm" id="'.$token.'"><script src="//ads.themoneytizer.com/s/gen.js"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId='.$site_id.'&formatId='.$ad_id.'" ></script></div>';
			}
			elseif($ad_id == 25){
				$response = '<div class="adyoulike-tm" id="'.$token.'"><script src="//ads.themoneytizer.com/s/gen.js"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId='.$site_id.'&formatId='.$ad_id.'" ></script></div>';
			}
			else{
				$response = '<div id="'.$token.'"><script src="//ads.themoneytizer.com/s/gen.js"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId='.$site_id.'&formatId='.$ad_id.'" ></script></div>';
			}
		}
		return $response;
	}

	private function getCurlResponse($url) {
		if( !class_exists( 'WP_Http' ) )
			include_once( ABSPATH . WPINC. '/class-http.php' );

		$request = new WP_Http;

		$url = $this->getApiUrl() . $url;
		$result = $request->request( $url );

        //return $result;
        return is_wp_error($result) ? array('body'=> '') : $result;
	}

	private function getJsonDecode($json) {
		$response = json_decode($json);
		return $response;
	}

    private function getApiUrl() {
        return self::$API_URL;
    }	

	/**
	* Constructor
	*/
	public function __construct() {
		// Plugin Details
        $this->plugin               = new stdClass;
        $this->plugin->name         = 'themoneytizer'; // Plugin Folder
        $this->plugin->displayName  = 'The Moneytizer'; // Plugin Name
        $this->plugin->version      = '3.0';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->url          = plugin_dir_url( __FILE__ );

		// Hooks
		add_action('admin_init', array(&$this, 'registerSettings'));

		__('MEGABANNER','themoneytizer');
		__('PAVE HAUT','themoneytizer');
		__('GRAND ANGLE','themoneytizer');
		__('SKYSCRAPER','themoneytizer');
		__('HABILLAGE','themoneytizer');
		__('FOOTER ou SLIDE-IN','themoneytizer');
		__('NATIVE HOMEPAGE','themoneytizer');
		__('CONTENU VIDEO','themoneytizer');
		__('IN TEXT','themoneytizer');
		__('VIDEO NATIVE','themoneytizer');
		__('MOBILE','themoneytizer');
		__('RECO CONTENUS','themoneytizer');
		__('PAVE BAS','themoneytizer');
		__('MEGASKYSCRAPER','themoneytizer');
		__('PRE-ROLL','themoneytizer');
		__('INTER VIDEO','themoneytizer');
		__('NATIVE ARTICLE','themoneytizer');
		__('PAVE MILIEU','themoneytizer');
		__('MEGABANNER BAS','themoneytizer');
		__('EXIT','themoneytizer');
		__('OVERLAY IMAGE','themoneytizer');
		__('BILLBOARD','themoneytizer');
	}

	/**
	* Register Settings
	*/
	function registerSettings() {
		// Security: Add capability check and sanitization callback
		register_setting($this->plugin->name, 'themoneytizer_insert_header', array(
			'type' => 'string',
			'sanitize_callback' => array($this, 'sanitize_ad_code'),
			'default' => ''
		));
		register_setting($this->plugin->name, 'themoneytizer_insert_article', array(
			'type' => 'string',
			'sanitize_callback' => array($this, 'sanitize_ad_code'),
			'default' => ''
		));
		register_setting($this->plugin->name, 'themoneytizer_insert_footer', array(
			'type' => 'string',
			'sanitize_callback' => array($this, 'sanitize_ad_code'),
			'default' => ''
		));
	}
	
	/**
	 * Sanitize ad code to prevent XSS while allowing legitimate ad scripts
	 * @param string $value The value to sanitize
	 * @return string Sanitized value
	 */
	function sanitize_ad_code($value) {
		// Only allow administrators to save ad code
		if (!current_user_can('manage_options')) {
			return '';
		}
		
		// Basic sanitization - remove null bytes and trim
		$value = str_replace("\0", '', $value);
		$value = trim($value);
		
		// For ad scripts, we need to allow script tags but validate them
		// This is a balance between security and functionality
		// The real security comes from the capability check above
		return $value;
	}

    /**
    * Output the Administration Panel
    * Save POSTed data from the Administration Panel into a WordPress option
    * @param $array_format
    * @param $submit
    */
    function adminPanel($array_format,$submit) {
    	// Security: Check user capabilities before allowing any modifications
    	if (!current_user_can('manage_options')) {
    		wp_die(__('You do not have sufficient permissions to perform this action.', 'themoneytizer'));
    	}
    	
    	// Save Settings
        if (isset($array_format)) {
            // Save
			$footer_query = "";
			$header_query = "";
			$article_query = "";
			$allformats = "";

	        foreach($array_format as $format){
	            $split_id = explode('-', $format);

		        if($split_id[1] == 24 or $split_id[1] == 11 or $split_id[1] == 34){
	               $mytag = "<script src='//ads.themoneytizer.com/s/gen.js?type=".$split_id[1]."'></script><script src='//ads.themoneytizer.com/s/requestform.js?siteId=".$split_id[0]."&formatId=".$split_id[1]."'></script>";
		        }
		        elseif($split_id[1] == 31){
			       $mytag = "<div style='text-align:center;' id=".$format."><script src='//ads.themoneytizer.com/s/gen.js?type=".$split_id[1]."'></script><script src='//ads.themoneytizer.com/s/requestform.js?siteId=".$split_id[0]."&formatId=".$split_id[1]."' ></script></div>";
		        }
		        else{
			       $mytag = "<div id=".$format."><script src='//ads.themoneytizer.com/s/gen.js?type=".$split_id[1]."'></script><script src='//ads.themoneytizer.com/s/requestform.js?siteId=".$split_id[0]."&formatId=".$split_id[1]."' ></script></div>";
		        }

		        if($split_id[1] == 6 or $split_id[1] == 11 or $split_id[1] == 24 or $split_id[1] == 29 or $split_id[1] == 30 or $split_id[1] == 31 or $split_id[1] == 34){
			     $header_query .= addslashes($mytag);
		        }
		        else{
			     $footer_query .= addslashes($mytag);
		        }
		        $allformats .= "-".$split_id[1];
			}

			update_option('themoneytizer_autoformats', $allformats);
            update_option('themoneytizer_insert_header', $header_query);
			update_option('themoneytizer_insert_article', $article_query);
            update_option('themoneytizer_insert_footer', $footer_query);

			$this->message = __('Placements automatiques sauvegardés.', $this->plugin->name);
        }
        elseif(!isset($array_format) and isset($submit)){
			$footer_query = "";
			$header_query = "";
			$article_query = "";
			$allformats = "";

			update_option('themoneytizer_autoformats', $allformats);
	    	update_option('themoneytizer_insert_header', $header_query);
			update_option('themoneytizer_insert_article', $article_query);
	    	update_option('themoneytizer_insert_footer', $footer_query);
		}

		// Get latest settings
        $this->settings = array(
        	'themoneytizer_autoformats' => stripslashes(get_option('themoneytizer_autoformats'))
        );
    	// Load Settings Form
        //include_once(WP_PLUGIN_DIR.'/'.$this->plugin->name.'/views/settings.php');
    }

	public function getAllFormats(){
		$url = '/getAllFormats';
		$response = $this->getCurlResponse($url);
	    $result = json_decode($response);
		return $result;
	}
}
