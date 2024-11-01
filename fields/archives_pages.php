<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Отключить «Архив автора»
function wpclean_archives_pages_author_cb(){

	$name_options = 'wpclean_plugin_options_archives_pages';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_archives_pages_author';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>При открытии «Архива автора» пользователь будет перенаправлен на главную страницу.</p><p>Пример страницы архива: https://сайт.ру/author/admin</p>';
}

// Отключить «Архив по тегам»
function wpclean_archives_pages_tags_cb(){

	$name_options = 'wpclean_plugin_options_archives_pages';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_archives_pages_tags';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>При открытии «Архива по тегам» пользователь будет перенаправлен на главную страницу.</p><p>Пример страницы архива: https://сайт.ру/tag/wordpress</p>';
}

// Отключить «Архив по дню»
function wpclean_archives_pages_day_cb(){

	$name_options = 'wpclean_plugin_options_archives_pages';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_archives_pages_day';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>При открытии «Архива по дню» пользователь будет перенаправлен на главную страницу.</p><p>Пример страницы архива: https://сайт.ру/2023/05/20</p>';
}

// Отключить «Архив по месяцу»
function wpclean_archives_pages_month_cb(){

	$name_options = 'wpclean_plugin_options_archives_pages';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_archives_pages_month';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>При открытии «Архива по месяцу» пользователь будет перенаправлен на главную страницу.</p><p>Пример страницы архива: https://сайт.ру/2023/05</p>';
}

// Отключить «Архив по году»
function wpclean_archives_pages_year_cb(){

	$name_options = 'wpclean_plugin_options_archives_pages';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_archives_pages_year';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>При открытии «Архива по году» пользователь будет перенаправлен на главную страницу.</p><p>Пример страницы архива: https://сайт.ру/2023</p>';
}

// Отключить «Архив по категориям»
function wpclean_archives_pages_category_cb(){

	$name_options = 'wpclean_plugin_options_archives_pages';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_archives_pages_category';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>При открытии «Архива по категориям» пользователь будет перенаправлен на главную страницу.</p><p>Пример страницы архива: https://сайт.ру/category/wordpress</p>';
}

?>