<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Запретить изменение цветовой гаммы
function wpclean_profile_color_mode_cb(){

	$name_options = 'wpclean_plugin_options_profile';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_profile_color_mode';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Пользователь не сможет изменить цветовую гамму в панели управления.</p>';
}

// Не показывать «Панель управления» на лицевой части сайта
function wpclean_profile_admin_bar_cb(){

	$name_options = 'wpclean_plugin_options_profile';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_profile_admin_bar';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Отключает показ «Панели управления» (admin_bar) на лицевой части для авторизованного пользователя.</p>';
}

?>