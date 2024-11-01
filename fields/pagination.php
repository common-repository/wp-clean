<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Закрыть страницы пагинации от индексации
function wpclean_pagination_noindex_pages_cb(){

	$name_options = 'wpclean_plugin_options_pagination';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_pagination_noindex_pages';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>В секцию &lt;head&gt; сайта будет добавлен специальный мета-тег robots с инструкциями noindex и nofollow, которые запрещают индексировать страницы пагинации.</p>';
}

// Удалить заголовок блока постраничной навигации
function wpclean_pagination_remove_title_block_cb(){

	$name_options = 'wpclean_plugin_options_pagination';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_pagination_remove_title_block';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Из блока постраничной навигации будет удален заголовок &lt;H2&gt;.</p>';
}

?>