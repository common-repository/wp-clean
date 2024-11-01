<?php

// Отключить JSON
function wpclean_disable_header_json() {

	$options = get_option('wpclean_plugin_options_header');
	$header_disable_json = esc_attr($options['wpclean_option_header_disable_json']);

	if($header_disable_json == '1'){
		// Отключаем WP-API версий 1.x
		add_filter('json_enabled', '__return_false');
		add_filter('json_jsonp_enabled', '__return_false');

		// Отключаем WP-API версий 2.x
		add_filter('rest_enabled', '__return_false');
		add_filter('rest_jsonp_enabled', '__return_false');

		// Удаляем информацию о REST API из заголовков HTTP и секции head
		remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
		remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);
		remove_action('template_redirect', 'rest_output_link_header', 11, 0);

		// Отключаем фильтры REST API
		remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
		remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
		remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
		remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
		remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
		remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);

		// Отключаем события REST API
		remove_action('init', 'rest_api_init');
		remove_action('rest_api_init', 'rest_api_default_filters', 10, 1);
		remove_action('parse_request', 'rest_api_loaded');

		// Отключаем Embeds связанные с REST API
		remove_action('rest_api_init', 'wp_oembed_register_route');
		remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);
		remove_action('wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );// Если нужно выводить oembed из других сайтов на своём, то закомментируйте эту строку

		// Редиректим со страницы /wp-json/ на главную
		add_action('template_redirect', function(){
			if(preg_match( '#\/wp-json\/.*?#', $_SERVER['REQUEST_URI'])){
				wp_redirect(esc_attr(get_option('siteurl')), 301);
				die();
			}
		});
	}
}

$wpclean_disable_header_json = 'wpclean_disable_header_json';
$wpclean_disable_header_json();

// Отключить «Emoji»
function wpclean_disable_header_emoji() {

	$options = get_option('wpclean_plugin_options_header');
	$header_disable_emoji = esc_attr($options['wpclean_option_header_disable_emoji']);

	if($header_disable_emoji == '1'){
		remove_action('wp_head', 'print_emoji_detection_script', 7 );// Удалить Emoji в <head> области
		remove_action('admin_print_scripts', 'print_emoji_detection_script'); //Удалить Emoji со всех страниц администратора
		remove_action('admin_print_styles', 'print_emoji_styles');
		remove_filter('the_content_feed', 'wp_staticize_emoji'); // Удалить Emoji в лентах RSS
		remove_filter('comment_text_rss', 'wp_staticize_emoji'); // Удалить Emoji в комментариях для лент RSS
		remove_filter('wp_mail', 'wp_staticize_emoji_for_email');	// Удалить Emoji в электронных письмах
		remove_action('wp_print_styles', 'print_emoji_styles'); // Удалить стили, которые связаны с Emoji
		add_filter('emoji_svg_url', '__return_false' );// Удаление DNS prefetch для WP Emoji из шапки
	}
}

$wpclean_disable_header_emoji = 'wpclean_disable_header_emoji';
$wpclean_disable_header_emoji();

// Удалить «dns-prefetch»
function wpclean_disable_header_dns_prefetch() {

	$options = get_option('wpclean_plugin_options_header');
	$header_remove_dns_prefetch = esc_attr($options['wpclean_option_header_remove_dns_prefetch']);

	if($header_remove_dns_prefetch == '1'){
		remove_action('wp_head', 'wp_resource_hints', 2);
	}
}

$wpclean_disable_header_dns_prefetch = 'wpclean_disable_header_dns_prefetch';
$wpclean_disable_header_dns_prefetch();

// Удалить «jquery-migrate.min.js»
function wpclean_disable_header_jquery_migrate() {

	$options = get_option('wpclean_plugin_options_header');
	$header_disable_jquery_migrate = esc_attr($options['wpclean_option_header_disable_jquery_migrate']);

	if($header_disable_jquery_migrate == '1'){

		add_filter('wp_default_scripts', function($scripts){

			if(empty($scripts->registered['jquery']) || is_admin()) {
				return;
			}

			$deps = & $scripts->registered['jquery']->deps;
			$deps = array_diff($deps, [ 'jquery-migrate' ]);
		});

	}
}

$wpclean_disable_header_jquery_migrate = 'wpclean_disable_header_jquery_migrate';
$wpclean_disable_header_jquery_migrate();

?>