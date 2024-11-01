<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Удаляем поле «Сайт» в форме комментариев
function wpclean_comments_site_filed_cb(){

	$name_options = 'wpclean_plugin_options_comments';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_comments_site_filed';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>В стандартной форме комментариев WordPress будет удалено поле «Сайт». Если вы используете сотственную форму комментариев, то это может не сработать.</p>';
}

// Удалить имя пользователя администратора из CSS-классов в комментариях
function wpclean_comments_username_admin_remove_cb(){

	$name_options = 'wpclean_plugin_options_comments';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_comments_username_admin_remove';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Из CSS-классов в комментариях будет удалено имя пользователя администратора сайта.</p>';
}

// Удалить ссылки ?replytocom в комментариях
function wpclean_comments_replytocom_cb(){

	$name_options = 'wpclean_plugin_options_comments';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_comments_replytocom';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет удалена приставка ?replytocom= у ссылки «Ответить» в комментариях, если включены древовидные комментарии.</p>';
}

// Запретить HTML-код в комментариях
function wpclean_comments_specialchars_cb(){

	$name_options = 'wpclean_plugin_options_comments';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_comments_specialchars';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>В комментариях нельзя будет использовать HTML-теги.</p>';
}

// Удалить ссылку на автора комментария
function wpclean_comments_remove_author_links_cb(){

	$name_options = 'wpclean_plugin_options_comments';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_comments_remove_author_links';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Если автор комментария оставил ссылку на свой ресурс, она будет удалена. Если вы используете сотственную форму комментариев, то это может не сработать.</p>';
}
?>