<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Отключить поиск на сайте
function wpclean_search_disable_on_site_cb(){

	$name_options = 'wpclean_plugin_options_search';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_search_disable_on_site';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Поиск на сайте будет полностью отключен, и пользователь будет перенаправлен на страницу 404.</p>';
}

// Исключить страницы из результатов поиска
function wpclean_search_excluded_pages_cb(){

	$name_options = 'wpclean_plugin_options_search';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_search_excluded_pages';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Из результатов поиска будут исключены все статические страницы.</p>';
}

?>