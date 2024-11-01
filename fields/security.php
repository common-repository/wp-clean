<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Включить перенаправление с http на https
function wpclean_security_redirect_http_to_https_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_redirect_http_to_https';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет осуществлен 301 редирект с протокола http на https.</p>';
}

// Отключить переход по ссылке /?author=
function wpclean_security_hidden_username_admin_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_hidden_username_admin';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет осуществлен редирект на главную страницу сайта при открытии ссылки https://сайт.ру/?author=ID, где ID - идентификатор пользователя.</p>';
}

// Скрыть версию WordPress
function wpclean_security_wp_generator_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_wp_generator';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Мета-тег &lt;meta name="generator"..&gt; позволяет узнать злоумышленникам текущую версию WordPress, и расположен он в области &lt;head&gt; вашего сайта.</p><p>Также, будет удалён номер версии из заголовка, который возвращает сервер.</p>';
}

// Удалить ?ver у файлов стилей
function wpclean_security_remove_ver_style_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_remove_ver_style';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будут удалены версии (?ver) у подключаемых файлов стилей.</p>';
}

// Удалить ?ver у файлов скриптов
function wpclean_security_remove_ver_script_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_remove_ver_script';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будут удалены версии (?ver) у подключаемых файлов скриптов.</p>';
}

// Отключить Trackback на собственный сайт
function wpclean_security_trackback_self_site_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_trackback_self_site';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Trackback -это информационное сообщение о том, кто ссылается на вашу запись в своём блоге.</p><p>Необходимо отключить функцию Trackback для своего сайта, чтобы не приходили лишние уведомления.</p>';
}

// Удалить RSD ссылку
function wpclean_security_rsd_link_cb(){

	// Получаем все опции плагина 
	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_rsd_link';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Ссылка rsd открывает внешнее соединение и позволяет удаленно управлять вашим сайтом при помощи Blog-клиентов и Web-сервисов.</p><p>Ссылка выглядит следующим образом &lt;link rel="EditURI"..&gt; и указывается в области &lt;head&gt; сайта.</p>';
}

// Удалить wlwmanifest ссылку
function wpclean_security_wlwmanifest_link_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_wlwmanifest_link';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Ссылка wlwmanifest подключает технологию, которая позволяет работать с записями и страницами сайта при помощи программного обеспечения и онлайн-сервиса Windows Live Writer.</p><p>Ссылка выглядит следующим образом &lt;link rel="wlwmanifest"..&gt; и указывается в области &lt;head&gt; сайта.</p>';
}

// Отключить XML-RPC и удалить ссылку X-Pingback
function wpclean_security_xml_rpc_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_xml_rpc';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>В ответах от сервера будет удалена ссылка на файл xmlrpc.php. Сразу закрывается возможность для организации спама на сайт через pingback.</p>';
}

// Удалить файл license.txt
function wpclean_security_remove_file_license_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_remove_file_license';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Файл license.txt будет удалён из корневой директории.</p>';
}

// Удалить файл readme.html
function wpclean_security_remove_file_readme_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_remove_file_readme';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Файл readme.html будет удалён из корневой директории.</p>';
}

// Удалить файл install.php
function wpclean_security_remove_file_install_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_remove_file_install';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Файл install.php будет удалён из директории wp-admin.</p>';
}

// Удалить файл wp-config-sample.php
function wpclean_security_remove_file_wp_config_sample_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_remove_file_wp_config_sample';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Файл wp-config-sample.php будет удалён из корневой директории.</p>';
}

// Изменить текст ошибки авторизации
function wpclean_security_change_auth_text_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_change_auth_text';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Стандартный текст ошибки авторизации будет заменен на следующую фразу "Извините, что-то пошло не так..".</p>';
}

// Отключить возможность сброса пароля для учётных записей
function wpclean_security_disable_lost_your_password_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_disable_lost_your_password';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет установлен запрет на сброс пароля для всех пользователей, включая администратора сайта.</p>';
}

// Запретить вход на страницу «Забыли пароль?»
function wpclean_security_redirect_lost_your_password_cb(){

	$name_options = 'wpclean_plugin_options_security';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_security_redirect_lost_your_password';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Будет осуществлен 301 редирект на главную страницу сайта при открытии формы для восстановления пароля.</p>';
}

?>