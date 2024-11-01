<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Отключить редактор блоков Gutenberg для всех типов записей
function wpclean_posts_disable_gutenberg_cb(){

	$name_options = 'wpclean_plugin_options_posts';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_posts_disable_gutenberg';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Редактор Gutenberg будет отключен для всех типов записей, и вместо него будет отображаться стандартный редактор для добавления записей.</p>';
}

// Отключаем автосохранение записей
function wpclean_posts_autosave_cb(){

	$name_options = 'wpclean_plugin_options_posts';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_posts_autosave';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключено автоматическое сохранение промежуточных результатов при создании записи или страницы.</p>';
}

// Удалить canonical ссылку записи
function wpclean_posts_canonical_cb(){

	$name_options = 'wpclean_plugin_options_posts';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_posts_canonical';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Ссылка canonical указывает адрес страницы первоисточника материала в Интернете.</p><p>Ссылка выглядит следующим образом &lt;link rel="canonical"..&gt; и выводится в области &lt;head&gt; сайта.</p>';
}

// Удалить ссылку shortlink у записей
function wpclean_posts_shortlink_cb(){

	$name_options = 'wpclean_plugin_options_posts';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_posts_shortlink';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>shortlink - это короткая ссылка на запись, которая выглядит следующим образом &lt;link rel="shortlink"..&gt; и выводится в области &lt;head&gt; сайта.</p>';
}

// Удалить ссылки adjacent_posts_rel_link у записи
function wpclean_posts_adjacent_posts_rel_cb(){

	$name_options = 'wpclean_plugin_options_posts';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_posts_adjacent_posts_rel';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>adjacent_posts_rel_link - это ссылки на следующую и предыдущую запись в категории, к которой относится открытая запись.</p><p>Ссылки выглядят следующим образом &lt;link rel="next"..&gt; и &lt;link rel="prev"..&gt; и выводятся в области &lt;head&gt; сайта.</p>';
}

?>