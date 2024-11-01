<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Формат RSS2
function wpclean_rss_do_feed_rss2_cb(){

	$name_options = 'wpclean_plugin_options_rss';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_rss_do_feed_rss2';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключена RSS-лента типа RSS2, и установлен редирект на главную страницу сайта.</p>';
}

// Формат Atom
function wpclean_rss_do_feed_atom_cb(){

	$name_options = 'wpclean_plugin_options_rss';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_rss_do_feed_atom';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключена RSS-лента типа Atom, и установлен редирект на главную страницу сайта.</p>';
}

// Формат RDF
function wpclean_rss_do_feed_rdf_cb(){

	$name_options = 'wpclean_plugin_options_rss';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_rss_do_feed_rdf';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключена RSS-лента типа RDF, и установлен редирект на главную страницу сайта.</p>';
}

// Удалить ссылки на дополнительные RSS-ленты сайта
function wpclean_rss_feed_links_extra_cb(){

	$name_options = 'wpclean_plugin_options_rss';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_rss_feed_links_extra';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будут удалены ссылки на дополнительные RSS-ленты сайта.</p>';
}

// Удалить ссылки на основные RSS-ленты сайта
function wpclean_rss_feed_links_cb(){

	$name_options = 'wpclean_plugin_options_rss';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_rss_feed_links';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будут удалены ссылки на основные RSS-ленты сайта.</p>';
}

?>