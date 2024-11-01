<?php

// Отключить авто-обновление «ядра»
function wpclean_disable_auto_update_core() {

	$options = get_option('wpclean_plugin_options_update');
	$auto_update_core = esc_attr($options['wpclean_option_update_disable_auto_core']);

	if($auto_update_core == '1'){
		add_filter('auto_update_core', '__return_false');
	}
}

$wpclean_disable_auto_update_core = 'wpclean_disable_auto_update_core';
$wpclean_disable_auto_update_core();

// Отключить авто-обновление «тем оформления»
function wpclean_disable_auto_update_theme() {

	$options = get_option('wpclean_plugin_options_update');
	$auto_update_theme = esc_attr($options['wpclean_option_update_disable_auto_theme']);

	if($auto_update_theme == '1'){
		add_filter('auto_update_theme', '__return_false');
	}
}

$wpclean_disable_auto_update_theme = 'wpclean_disable_auto_update_theme';
$wpclean_disable_auto_update_theme();

// Отключить авто-обновление «плагинов»
function wpclean_disable_auto_update_plugin() {

	$options = get_option('wpclean_plugin_options_update');
	$auto_update_plugin = esc_attr($options['wpclean_option_update_disable_auto_plugin']);

	if($auto_update_plugin == '1'){
		add_filter('auto_update_plugin', '__return_false');
	}
}

$wpclean_disable_auto_update_plugin = 'wpclean_disable_auto_update_plugin';
$wpclean_disable_auto_update_plugin();

// Отключить авто-обновление «переводов»
function wpclean_disable_auto_update_translation() {

	$options = get_option('wpclean_plugin_options_update');
	$auto_update_translation = esc_attr($options['wpclean_option_update_disable_auto_translation']);

	if($auto_update_translation == '1'){
		add_filter('auto_update_translation', '__return_false');
	}
}

$wpclean_disable_auto_update_translation = 'wpclean_disable_auto_update_translation';
$wpclean_disable_auto_update_translation();

// Запретить обновление «ядра»
function wpclean_deny_update_core() {

	$options = get_option('wpclean_plugin_options_update');
	$deny_update_core = esc_attr($options['wpclean_option_update_deny_update_core']);

	if($deny_update_core == '1'){
		add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
		wp_clear_scheduled_hook('wp_version_check');
	}
}

$wpclean_deny_update_core = 'wpclean_deny_update_core';
$wpclean_deny_update_core();

// Запретить обновление «тем оформления»
function wpclean_deny_update_theme() {

	$options = get_option('wpclean_plugin_options_update');
	$deny_update_theme = esc_attr($options['wpclean_option_update_deny_update_theme']);

	if($deny_update_theme == '1'){
		remove_action('load-update-core.php','wp_update_themes');
		add_filter('pre_site_transient_update_themes',create_function('$a', "return null;"));
		wp_clear_scheduled_hook('wp_update_themes');
	}
}

$wpclean_deny_update_theme = 'wpclean_deny_update_theme';
$wpclean_deny_update_theme();

// Запретить обновление «плагинов»
function wpclean_deny_update_plugin() {

	$options = get_option('wpclean_plugin_options_update');
	$deny_update_plugin = esc_attr($options['wpclean_option_update_deny_update_plugin']);

	if($deny_update_plugin == '1'){
		remove_action('load-update-core.php', 'wp_update_plugins');
		add_filter('pre_site_transient_update_plugins', create_function( '$a', "return null;"));
		wp_clear_scheduled_hook('wp_update_plugins');
	}
}

$wpclean_deny_update_plugin = 'wpclean_deny_update_plugin';
$wpclean_deny_update_plugin();


?>