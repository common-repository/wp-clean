<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Удалить блок «Помощь»
function wpclean_interface_block_help_cb(){

	$name_options = 'wpclean_plugin_options_interface';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_interface_block_help';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Блок «Помощь» будет удалён со всех страниц панели управления.</p>';
}

// Удалить блок «Настройки экрана»
function wpclean_interface_block_settings_display_cb(){

	$name_options = 'wpclean_plugin_options_interface';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_interface_block_settings_display';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Блок «Настройки экрана» будет удалён со всех страниц панели управления.</p>';
}

// Удалить ссылки на сайт WordPress из «admin bar»
function wpclean_interface_link_admin_bar_cb(){

	$name_options = 'wpclean_plugin_options_interface';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_interface_link_admin_bar';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будут удалены все внешние ссылки на сайты WordpPress, документацию и форумы из «admin bar».</p>';
}

// Удалить текст «Спасибо вам за творчество с WordPress»
function wpclean_interface_text_thankyou_cb(){

	$name_options = 'wpclean_plugin_options_interface';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_interface_text_thankyou';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>В нижней части панели управления будет удалён текст «Спасибо вам за творчество с WordPress».</p>';
}

// Удалить номер версии WordPress
function wpclean_interface_remove_wp_version_cb(){

	$name_options = 'wpclean_plugin_options_interface';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_interface_remove_wp_version';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>В нижней части панели управления будет удалена версия WordPress.</p>';
}

// Скрыть иконки в боковой колонке
function wpclean_interface_hide_admin_icons_cb(){

	$name_options = 'wpclean_plugin_options_interface';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_interface_hide_admin_icons';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будут удалены иконки у элементов меню в боковой колонке панели управления.</p>';
}

// Удалить уведомление «Ваш браузер устарел»
function wpclean_interface_remove_browser_nag_cb(){

	$name_options = 'wpclean_plugin_options_interface';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_interface_remove_browser_nag';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>С главной страницы панели управления будет удалено уведомление «Ваш браузер устарел».</p>';
}

// Удалить уведомление «Требуется обновление PHP»
function wpclean_interface_remove_php_nag_cb(){

	$name_options = 'wpclean_plugin_options_interface';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_interface_remove_php_nag';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>С главной страницы панели управления будет удалено уведомление «Требуется обновление PHP».</p>';
}

?>