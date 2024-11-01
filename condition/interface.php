<?php

// Удалить блок «Помощь»
function wpclean_disable_interface_block_help() {

	$options = get_option('wpclean_plugin_options_interface');
	$interface_block_help = esc_attr($options['wpclean_option_interface_block_help']);

	if($interface_block_help == '1'){
		add_action('admin_head', function(){
			$screen = get_current_screen();
			$screen->remove_help_tabs();
		});
	}
}

$wpclean_disable_interface_block_help = 'wpclean_disable_interface_block_help';
$wpclean_disable_interface_block_help();

// Удалить блок «Настройки экрана»
function wpclean_disable_interface_block_settings_display() {

	$options = get_option('wpclean_plugin_options_interface');
	$interface_block_settings_display = esc_attr($options['wpclean_option_interface_block_settings_display']);

	if($interface_block_settings_display == '1'){
		add_action('screen_options_show_screen', function(){
			return false;
		});
	}
}

$wpclean_disable_interface_block_settings_display = 'wpclean_disable_interface_block_settings_display';
$wpclean_disable_interface_block_settings_display();

// Удалить ссылки на сайт WordPress из «admin bar»
function wpclean_disable_interface_link_admin_bar() {

	$options = get_option('wpclean_plugin_options_interface');
	$interface_link_admin_bar = esc_attr($options['wpclean_option_interface_link_admin_bar']);

	if($interface_link_admin_bar == '1'){
		add_action('wp_before_admin_bar_render', function(){
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu('wp-logo');
			$wp_admin_bar->remove_menu('about');
			$wp_admin_bar->remove_menu('wporg');
			$wp_admin_bar->remove_menu('documentation');
			$wp_admin_bar->remove_menu('support-forums');
			$wp_admin_bar->remove_menu('feedback');
			$wp_admin_bar->remove_menu('view-site');
		});
	}
}

$wpclean_disable_interface_link_admin_bar = 'wpclean_disable_interface_link_admin_bar';
$wpclean_disable_interface_link_admin_bar();

// Удалить текст «Спасибо вам за творчество с WordPress»
function wpclean_disable_interface_text_thankyou() {

	$options = get_option('wpclean_plugin_options_interface');
	$interface_text_thankyou = esc_attr($options['wpclean_option_interface_text_thankyou']);

	if($interface_text_thankyou == '1'){
		add_filter('admin_footer_text', function(){
			return null;
		});
	}
}

$wpclean_disable_interface_text_thankyou = 'wpclean_disable_interface_text_thankyou';
$wpclean_disable_interface_text_thankyou();

// Удалить номер версии WordPress
function wpclean_disable_interface_remove_wp_version() {

	$options = get_option('wpclean_plugin_options_interface');
	$interface_remove_wp_version = esc_attr($options['wpclean_option_interface_remove_wp_version']);

	if($interface_remove_wp_version == '1'){
		add_filter('update_footer', function(){ return null;}, 12);
	}
}

$wpclean_disable_interface_remove_wp_version = 'wpclean_disable_interface_remove_wp_version';
$wpclean_disable_interface_remove_wp_version();

// Скрыть иконки в боковой колонке
function wpclean_disable_interface_hide_admin_icons() {

	$options = get_option('wpclean_plugin_options_interface');
	$interface_hide_admin_icons = esc_attr($options['wpclean_option_interface_hide_admin_icons']);

	if($interface_hide_admin_icons == '1'){
		?>
			<style type="text/css">
				ul#adminmenu > li > a > div.wp-menu-name {
					padding: 8px 8px 8px 11px;
				}

				ul#adminmenu > li > a > div.wp-menu-image {
					display: none;
				}
			</style>
		<?php
	}
}

$wpclean_disable_interface_hide_admin_icons = 'wpclean_disable_interface_hide_admin_icons';
$wpclean_disable_interface_hide_admin_icons();

// Удалить уведомление «Ваш браузер устарел»
function wpclean_interface_remove_browser_nag() {

	$options = get_option('wpclean_plugin_options_interface');
	$interface_remove_browser_nag = esc_attr($options['wpclean_option_interface_remove_browser_nag']);

	if($interface_remove_browser_nag == '1'){
		add_action('wp_dashboard_setup', function(){
			remove_meta_box('dashboard_browser_nag', 'dashboard', 'normal');
		});
	}
}

$wpclean_interface_remove_browser_nag = 'wpclean_interface_remove_browser_nag';
$wpclean_interface_remove_browser_nag();

// Удалить уведомление «Требуется обновление PHP»
function wpclean_interface_remove_php_nag() {

	$options = get_option('wpclean_plugin_options_interface');
	$interface_remove_php_nag = esc_attr($options['wpclean_option_interface_remove_php_nag']);

	if($interface_remove_php_nag == '1'){
		add_action('wp_dashboard_setup', function(){
			remove_meta_box('dashboard_php_nag', 'dashboard', 'normal');
		});
	}
}

$wpclean_interface_remove_php_nag = 'wpclean_interface_remove_php_nag';
$wpclean_interface_remove_php_nag();

?>