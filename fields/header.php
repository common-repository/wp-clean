<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Отключить «JSON REST API»
function wpclean_header_disable_json_cb(){

	$name_options = 'wpclean_plugin_options_header';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_header_disable_json';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет полностью отключена возможность работы с JSON REST API.</p>';
}

// Отключить «Emoji»
function wpclean_header_disable_emoji_cb(){

	$name_options = 'wpclean_plugin_options_header';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_header_disable_emoji';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключена поддержка смайликов Emoji.</p>';
}

// Удалить «dns-prefetch»
function wpclean_header_remove_dns_prefetch_cb(){

	$name_options = 'wpclean_plugin_options_header';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_header_remove_dns_prefetch';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>dns-prefetch - просит браузер в фоновом режиме получить информацию об указанном домене (IP-адрес), чтобы затем использовать её при реальных запросах к указанному домену.</p><p>Ссылка выглядит следующим образом &lt;link rel="dns-prefetch"..&gt; и указывается в области <head> сайта.</p>';
}

// Удалить «jquery-migrate.min.js»
function wpclean_header_disable_jquery_migrate_cb(){

	$name_options = 'wpclean_plugin_options_header';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_header_disable_jquery_migrate';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Файл jquery-migrate.min.js требуется для старых скриптов jQuery до версии 1.9.х.</p>';
}

?>