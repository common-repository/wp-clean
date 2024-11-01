<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Отключить авто-обновление «ядра»
function wpclean_update_disable_auto_core_cb(){

	$name_options = 'wpclean_plugin_options_update';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_update_disable_auto_core';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключена возможность автоматического обновления «ядра».</p>';
}

// Отключить авто-обновление «тем оформления»
function wpclean_update_disable_auto_theme_cb(){

	$name_options = 'wpclean_plugin_options_update';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_update_disable_auto_theme';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключена возможность автоматического обновления «тем оформления».</p>';
}

// Отключить авто-обновление «плагинов»
function wpclean_update_disable_auto_plugin_cb(){

	$name_options = 'wpclean_plugin_options_update';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_update_disable_auto_plugin';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключена возможность автоматического обновления «плагинов».</p>';
}

// Отключить авто-обновление «переводов»
function wpclean_update_disable_auto_translation_cb(){

	$name_options = 'wpclean_plugin_options_update';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_update_disable_auto_translation';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет отключена возможность автоматического обновления «переводов».</p>';
}

// Запретить обновление «ядра»
function wpclean_update_deny_update_core_cb(){

	$name_options = 'wpclean_plugin_options_update';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_update_deny_update_core';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет установлен запрет на обновление «ядра».</p>';
}

// Запретить обновление «тем оформления»
function wpclean_update_deny_update_theme_cb(){

	$name_options = 'wpclean_plugin_options_update';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_update_deny_update_theme';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет установлен запрет на обновление «тем оформления».</p>';
}

// Запретить обновление «плагинов»
function wpclean_update_deny_update_plugin_cb(){

	$name_options = 'wpclean_plugin_options_update';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_update_deny_update_plugin';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет установлен запрет на обновление «плагинов».</p>';
}

?>