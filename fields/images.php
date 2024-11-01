<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Отключить функцию SRCSET
function wpclean_images_disable_srcset_cb(){

	$name_options = 'wpclean_plugin_options_images';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_images_disable_srcset';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>srcset - содержит список url-адресов на изображения (через запятую), чтобы браузер мог выбрать наиболее подходящий вариант в зависимости от параметров экрана устройства, с которого просматривается страница. srcset - это замена стандартного атрибута src, и srcset приоритетнее, чем src.</p>';
}

// Разрешить WordPress загружать SVG файлы
function wpclean_images_allow_svg_upload_cb(){

	$name_options = 'wpclean_plugin_options_images';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_images_allow_svg_upload';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>По умолчанию в WordPress запрещено добавлять SVG-файлы в библиотеку медиафайлов.</p>';
}

?>