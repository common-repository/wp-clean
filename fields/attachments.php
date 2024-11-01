<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Удалять все вложения вместе с записью
function wpclean_attachments_delete_files_posts_cb(){

	$name_options = 'wpclean_plugin_options_attachments';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_attachments_delete_files_posts';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>При удалении записи будет выполнено удаление всех вложений, которые прикреплены к записи.</p><p>Обратите внимание, все вложения будут удалены только после того, когда запись будет удалена из корзины.</p>';
}

// Удалить страницы вложений
function wpclean_attachments_delete_pages_attachments_cb(){

	$name_options = 'wpclean_plugin_options_attachments';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_attachments_delete_pages_attachments';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Для каждого загруженного файла в Wordpress автоматически создаётся новая страница, на которой можно посмотреть файл. Это негативно сказывается на поисковую оптимизацию.</p><p>При активации этого пункта, пользователь перешедший на страницу медиафайла (вложения) будет перенаправлен на запись, к которой относится этот медиафайл.</p>';
}

?>