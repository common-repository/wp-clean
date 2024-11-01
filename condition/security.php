<?php

// Включить перенаправление с http на https
function wpclean_security_redirect_http_to_https() {

	$options = get_option('wpclean_plugin_options_security');
	$security_redirect_http_to_https = esc_attr($options['wpclean_option_security_redirect_http_to_https']);

	if($security_redirect_http_to_https == '1'){

		add_action('init', function(){

			if(is_ssl()){
				return;
			}

			if(0 === strpos($_SERVER['REQUEST_URI'], 'http')){
				wp_redirect(set_url_scheme( $_SERVER['REQUEST_URI'], 'https' ), 301);
			}
			else{
				wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301);
			}

			exit;
		});
	}
}

$wpclean_security_redirect_http_to_https = 'wpclean_security_redirect_http_to_https';
$wpclean_security_redirect_http_to_https();

// Отключить переход по ссылке /?author=
function wpclean_security_hidden_username_admin() {

	$options = get_option('wpclean_plugin_options_security');
	$security_hidden_username_admin = esc_attr($options['wpclean_option_security_hidden_username_admin']);

	if($security_hidden_username_admin == '1'){
		add_action('template_redirect', function(){
			if(is_author()){
				wp_redirect(home_url(), 301);
				exit;
			}	
		});
	}
}

$wpclean_security_hidden_username_admin = 'wpclean_security_hidden_username_admin';
$wpclean_security_hidden_username_admin();

// Скрыть версию WordPress
function wpclean_disable_security_wp_generator() {

	$options = get_option('wpclean_plugin_options_security');
	$security_wp_generator = esc_attr($options['wpclean_option_security_wp_generator']);

	if($security_wp_generator == '1'){
		remove_action('wp_head', 'wp_generator');
		add_filter('the_generator', '__return_empty_string');
		header_remove( 'x-powered-by' ); // Удалить версию из заголовка сервера
	}
}

$wpclean_disable_security_wp_generator = 'wpclean_disable_security_wp_generator';
$wpclean_disable_security_wp_generator();

// Удалить ?ver у файлов стилей
function wpclean_disable_security_remove_ver_style(){

	$options = get_option('wpclean_plugin_options_security');
	$security_remove_ver_style = esc_attr($options['wpclean_option_security_remove_ver_style']);

	if($security_remove_ver_style == '1'){
		add_filter('style_loader_src', function($src){
			$parts = explode('?', $src);
			return $parts[0];
		}, 15, 1);
	}
}

$wpclean_disable_security_remove_ver_style = 'wpclean_disable_security_remove_ver_style';
$wpclean_disable_security_remove_ver_style();

// Удалить ?ver у файлов скриптов
function wpclean_disable_security_remove_ver_script(){

	$options = get_option('wpclean_plugin_options_security');
	$security_remove_ver_script = esc_attr($options['wpclean_option_security_remove_ver_script']);

	if($security_remove_ver_script == '1'){
		add_filter('script_loader_src', function($src){
			$parts = explode('?', $src);
			return $parts[0];
		}, 15, 1);
	}
}

$wpclean_disable_security_remove_ver_script = 'wpclean_disable_security_remove_ver_script';
$wpclean_disable_security_remove_ver_script();

// Отключить Trackback на собственный сайт
function wpclean_disable_security_trackback_self_site(){

	$options = get_option('wpclean_plugin_options_security');
	$security_trackback_self_site = esc_attr($options['wpclean_option_security_trackback_self_site']);

	if($security_trackback_self_site == '1'){

		add_action('pre_ping',function(&$links){
			$site_url = get_option('home');
			foreach($links as $key => $val){
				if(strpos( $val, $site_url ) !== false){
					unset($links[$key]);
				}
			}
		});
	}
}

$wpclean_disable_security_trackback_self_site = 'wpclean_disable_security_trackback_self_site';
$wpclean_disable_security_trackback_self_site();

// Удалить RSD ссылку
function wpclean_disable_security_rsd_link() {

	$options = get_option('wpclean_plugin_options_security');
	$security_rsd_link = esc_attr($options['wpclean_option_security_rsd_link']);

	if($security_rsd_link == '1'){
		remove_action('wp_head', 'rsd_link' );
	}
}

$wpclean_disable_security_rsd_link = 'wpclean_disable_security_rsd_link';
$wpclean_disable_security_rsd_link();

// Удалить wlwmanifest ссылку
function wpclean_disable_security_wlwmanifest_link() {

	$options = get_option('wpclean_plugin_options_security');
	$security_wlwmanifest_link = esc_attr($options['wpclean_option_security_wlwmanifest_link']);

	if($security_wlwmanifest_link == '1'){
		remove_action('wp_head', 'wlwmanifest_link');
	}
}

$wpclean_disable_security_wlwmanifest_link = 'wpclean_disable_security_wlwmanifest_link';
$wpclean_disable_security_wlwmanifest_link();

// Отключить XML-RPC и удалить ссылку X-Pingback
function wpclean_disable_security_xml_rpc() {

	$options = get_option('wpclean_plugin_options_security');
	$security_xml_rpc = esc_attr($options['wpclean_option_security_xml_rpc']);

	if($security_xml_rpc == '1'){

		// remove_pingback_header
		add_filter('wp_headers', function($headers){
			unset($headers['X-Pingback']);
			return $headers;
		});

		// remove_x_pingback_headers
		add_filter('template_redirect', function($headers){
			if(function_exists('header_remove')){
				header_remove('X-Pingback');
				header_remove('Server');
			}	
		});

		// Unset XML-RPC Methods
		add_filter('xmlrpc_methods', function($methods){
			unset($methods['pingback.ping']);
			unset($methods['pingback.extensions.getPingbacks']);
			return $methods;
		});

		add_filter('xmlrpc_enabled','__return_false');

	}
}

$wpclean_disable_security_xml_rpc = 'wpclean_disable_security_xml_rpc';
$wpclean_disable_security_xml_rpc();

// Удалить файл license.txt
function wpclean_security_remove_file_license() {

	$options = get_option('wpclean_plugin_options_security');
	$security_remove_file_license = esc_attr($options['wpclean_option_security_remove_file_license']);

	if($security_remove_file_license == '1'){

		$file_license = ABSPATH.'license.txt'; // получаем абсолютный путь к файлу

		if(file_exists($file_license)){ // если файл найден, то удаляем его
			unlink($file_license);
		}
	}
}

$wpclean_security_remove_file_license = 'wpclean_security_remove_file_license';
$wpclean_security_remove_file_license();

// Удалить файл readme.html
function wpclean_security_remove_file_readme() {

	$options = get_option('wpclean_plugin_options_security');
	$security_remove_file_readme = esc_attr($options['wpclean_option_security_remove_file_readme']);

	if($security_remove_file_readme == '1'){

		$file_readme = ABSPATH.'readme.html'; // получаем абсолютный путь к файлу

		if(file_exists($file_readme)){ // если файл найден, то удаляем его
			unlink($file_readme);
		}
	}
}

$wpclean_security_remove_file_readme = 'wpclean_security_remove_file_readme';
$wpclean_security_remove_file_readme();

// Удалить файл install.php
function wpclean_security_remove_file_install() {

	$options = get_option('wpclean_plugin_options_security');
	$security_remove_file_install = esc_attr($options['wpclean_option_security_remove_file_install']);

	if($security_remove_file_install == '1'){

		$file_install = ABSPATH.'wp-admin/install.php'; // получаем абсолютный путь к файлу

		if(file_exists($file_install)){ // если файл найден, то удаляем его
			unlink($file_install);
		}
	}
}

$wpclean_security_remove_file_install = 'wpclean_security_remove_file_install';
$wpclean_security_remove_file_install();

// Удалить файл wp-config-sample.php
function wpclean_security_remove_file_wp_config_sample() {

	$options = get_option('wpclean_plugin_options_security');
	$security_remove_file_wp_config_sample = esc_attr($options['wpclean_option_security_remove_file_wp_config_sample']);

	if($security_remove_file_wp_config_sample == '1'){

		$file_wp_config_sample = ABSPATH.'wp-config-sample.php'; // получаем абсолютный путь к файлу

		if(file_exists($file_wp_config_sample)){ // если файл найден, то удаляем его
			unlink($file_wp_config_sample);
		}
	}
}

$wpclean_security_remove_file_wp_config_sample = 'wpclean_security_remove_file_wp_config_sample';
$wpclean_security_remove_file_wp_config_sample();

// Изменить текст ошибки авторизации
function wpclean_disable_security_change_auth_text() {

	$options = get_option('wpclean_plugin_options_security');
	$security_change_auth_text = esc_attr($options['wpclean_option_security_change_auth_text']);

	if($security_change_auth_text == '1'){
		add_filter('login_errors', create_function('$a', "return 'Извините, что-то пошло не так..';"));
	}
}

$wpclean_disable_security_change_auth_text = 'wpclean_disable_security_change_auth_text';
$wpclean_disable_security_change_auth_text();

// Отключить возможность сброса пароля для учётных записей
function wpclean_security_disable_lost_you_password() {

	$options = get_option('wpclean_plugin_options_security');
	$security_disable_lost_your_password = esc_attr($options['wpclean_option_security_disable_lost_your_password']);

	if($security_disable_lost_your_password == '1'){

		// Удаляем ссылку забыли пароль на странице авторизации
		add_filter( 'gettext', function($text){
			return str_replace(array('Lost your password?', 'Lost your password', 'Забыли пароль?', 'Забыли пароль'), '', trim($text, '?') );
		});

		// Отключаем возможность для сброса пароля
		add_filter('show_password_fields', 'disable_lost_your_password');
		add_filter('allow_password_reset', 'disable_lost_your_password');

		function disable_lost_your_password() {
			if(is_admin()){
				$userdata = wp_get_current_user();
				$user = $userdata->ID;
				if(!empty($user->roles) && is_array($user->roles) && $user->roles[0] == 'administrator'){
		        	return true;
				}
		    }
		    return false;
		  }

	}
}

$wpclean_security_disable_lost_you_password = 'wpclean_security_disable_lost_you_password';
$wpclean_security_disable_lost_you_password();

// Запретить вход на страницу «Забыли пароль?»
function wpclean_security_redirect_lost_you_password() {

	$options = get_option('wpclean_plugin_options_security');
	$security_redirect_lost_your_password = esc_attr($options['wpclean_option_security_redirect_lost_your_password']);

	if($security_redirect_lost_your_password == '1'){

		add_action( "login_init", function(){
			if(isset($_GET['action'])){
				if(in_array($_GET['action'], array('lostpassword', 'retrievepassword'))){
					wp_redirect(home_url(), 301);
					exit;
				}
			}
		});

	}
}

$wpclean_security_redirect_lost_you_password = 'wpclean_security_redirect_lost_you_password';
$wpclean_security_redirect_lost_you_password();

?>