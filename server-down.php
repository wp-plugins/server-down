<?php
/*
Plugin Name: Server-Down
Plugin URI: http://saquery.com/wordpress
Description: This is a Webservice to test if your webservers return state 200.
Version: 1.0.9.1
Author: Stephan Ahlf
Author URI: http://saquery.com
*/
	global $sd;
	$sd = new serverDown();

	
	function __saq_option($id, $defaultValue){
		$result = get_option($id);
		if ($result===false){ 
			$result = $defaultValue;
		}
		return $result;
	}

	class serverDown{
		
		function admin_init() {
		}
		
		function init(){		
			if(!is_admin()){

			}
		}
		
		function admin_menu(){
			add_submenu_page('options-general.php', 'Server-Down Options', 'Server-Down', 'administrator', __FILE__,  array('serverDown', 'options'));
			add_action( 'admin_init', array('serverDown','admin_init') );
		}

		function options(){
			require_once dirname(__FILE__).'/server-down.options.php';
?>
<?php			
		}
	}



	add_action('admin_menu', array('serverDown', 'admin_menu'));
	add_action('init', array('serverDown', 'init'), 0);


?>