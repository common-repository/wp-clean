<?php

// Отключаем возможность изменения цветовой гаммы

function wpclean_disable_profile_color_mode() {

	$options = get_option('wpclean_plugin_options_profile');
	$profile_color_mode = esc_attr($options['wpclean_option_profile_color_mode']);

	if($profile_color_mode == '1'){
		
		add_action('admin_head', function(){
			global $_wp_admin_css_colors; // создаём глобальные настройки
			$_wp_admin_css_colors = 0; //отмена выбора цвета
		});

	}
}

$wpclean_disable_profile_color_mode = 'wpclean_disable_profile_color_mode';
$wpclean_disable_profile_color_mode();


// Не показывать «Панель управления» на лицевой части сайта
function wpclean_disable_profile_admin_bar() {
	$options = get_option('wpclean_plugin_options_profile');
	$profile_admin_bar = esc_attr($options['wpclean_option_profile_admin_bar']);

	if($profile_admin_bar == '1'){
		add_filter( 'show_admin_bar', '__return_false' );
	}
}

$wpclean_disable_profile_admin_bar = 'wpclean_disable_profile_admin_bar';
$wpclean_disable_profile_admin_bar();

?>