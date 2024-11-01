<?php

// Отключить «Архив автора»
function wpclean_disable_archives_pages_author() {

	$options = get_option('wpclean_plugin_options_archives_pages');
	$archives_pages_author = esc_attr($options['wpclean_option_archives_pages_author']);

	if($archives_pages_author == '1'){
		add_action('parse_query', function($query){
			if(is_author()){
				wp_redirect(home_url(), 301);
				exit;
			}
		});
	}
}

$wpclean_disable_archives_pages_author = 'wpclean_disable_archives_pages_author';
$wpclean_disable_archives_pages_author();

// Отключить «Архив по тегам»
function wpclean_disable_archives_pages_tags() {

	$options = get_option('wpclean_plugin_options_archives_pages');
	$archives_pages_tags = esc_attr($options['wpclean_option_archives_pages_tags']);

	if($archives_pages_tags == '1'){
		add_action('parse_query', function($query){
			if(is_tag()){
				wp_redirect(home_url(), 301);
				exit;
			}
		});
	}
}

$wpclean_disable_archives_pages_tags = 'wpclean_disable_archives_pages_tags';
$wpclean_disable_archives_pages_tags();

// Отключить «Архив по дню»
function wpclean_disable_archives_pages_day() {

	$options = get_option('wpclean_plugin_options_archives_pages');
	$archives_pages_day = esc_attr($options['wpclean_option_archives_pages_day']);

	if($archives_pages_day == '1'){
		add_action('parse_query', function($query){
			if(is_day()){
				wp_redirect(home_url(), 301);
				exit;
			}
		});
	}
}

$wpclean_disable_archives_pages_day = 'wpclean_disable_archives_pages_day';
$wpclean_disable_archives_pages_day();

// Отключить «Архив по месяцу»
function wpclean_disable_archives_pages_month() {

	$options = get_option('wpclean_plugin_options_archives_pages');
	$archives_pages_month = esc_attr($options['wpclean_option_archives_pages_month']);

	if($archives_pages_month == '1'){
		add_action('parse_query', function($query){
			if(is_month()){
				wp_redirect(home_url(), 301);
				exit;
			}
		});
	}
}

$wpclean_disable_archives_pages_month = 'wpclean_disable_archives_pages_month';
$wpclean_disable_archives_pages_month();

// Отключить «Архив по году»
function wpclean_disable_archives_pages_year() {

	$options = get_option('wpclean_plugin_options_archives_pages');
	$archives_pages_year = esc_attr($options['wpclean_option_archives_pages_year']);

	if($archives_pages_year == '1'){
		add_action('parse_query', function($query){
			if(is_year()){
				wp_redirect(home_url(), 301);
				exit;
			}
		});
	}
}

$wpclean_disable_archives_pages_year = 'wpclean_disable_archives_pages_year';
$wpclean_disable_archives_pages_year();

// Отключить «Архив по категориям»
function wpclean_disable_archives_pages_category() {

	$options = get_option('wpclean_plugin_options_archives_pages');
	$archives_pages_category = esc_attr($options['wpclean_option_archives_pages_category']);

	if($archives_pages_category == '1'){
		add_action('parse_query', function($query){
			if(is_category()){
				wp_redirect(home_url(), 301);
				exit;
			}
		});
	}
}

$wpclean_disable_archives_pages_category = 'wpclean_disable_archives_pages_category';
$wpclean_disable_archives_pages_category();

?>