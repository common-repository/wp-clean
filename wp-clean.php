<?php
/*
Plugin Name: WP Clean
Plugin URI: https://artemsannikov.ru/plugins/wp-clean/
Description: Плагин WP-Clean предоставляет большое количество функций для оптимизации, безопасности и удаления лишних файлов (кода) в WordPress.
Version: 2.0
Author: Artem Sannikov
Author URI: https://artemsannikov.ru
Donate link: https://artemsannikov.ru/donate/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*
Copyright 2016  Artem Sannikov  (email : info@artemsannikov.ru)
 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!defined('ABSPATH')){
	die('Некорректный запрос!');
}

/****************************************************************
 * Подключаю файлы *.php, и на них на хук
****************************************************************/

// Действия при активациия плагина
include dirname(__FILE__).'/activate_plugin.php';
register_activation_hook(__FILE__, 'wpclean_activate');

// Действия при деактивации плагина
include dirname(__FILE__).'/deactivate_plugin.php';
register_deactivation_hook(__FILE__, 'wpclean_deactivate');

/****************************************************************
 * Подключаю файлы секций (генерация полей для формы)
****************************************************************/
// include dirname(__FILE__).'/fields/widgets.php';

// Указываем полный путь до нужной директории
$wpclean_dir_fields = dirname(__FILE__).'/fields/';

// Сканируем директорию, и сохраняем результат в массив
$wpclean_scan_dir_fields = scandir($wpclean_dir_fields);

// Проходимся циклом по массиву
foreach($wpclean_scan_dir_fields as $key => $value){

	// Создаём полный путь до файла, который нужно проверить и подключить
	$wpclean_path_file_fields = $wpclean_dir_fields.$value;

	// Проверяем, файл это или нет
	if(is_file($wpclean_path_file_fields)) {

		// Проверяем, существует ли файл
		if(file_exists($wpclean_path_file_fields)){

			// Выполняем подключение файла
			include $wpclean_path_file_fields;

		}

	}

}

/****************************************************************
 * Подключаю файлы template для генерации дочерних страниц
****************************************************************/
// include dirname(__FILE__).'/template/widgets.php';

// Указываем полный путь до нужной директории
$wpclean_dir_template = dirname(__FILE__).'/template/';

// Сканируем директорию, и сохраняем результат в массив
$wpclean_scan_dir_template = scandir($wpclean_dir_template);

// Проходимся циклом по массиву
foreach($wpclean_scan_dir_template as $key => $value){

	// Создаём полный путь до файла, который нужно проверить и подключить
	$wpclean_path_file_template = $wpclean_dir_template.$value;

	// Проверяем, файл это или нет
	if(is_file($wpclean_path_file_template)) {

		// Проверяем, существует ли файл
		if(file_exists($wpclean_path_file_template)){

			// Выполняем подключение файла
			include $wpclean_path_file_template;

		}

	}

}

/****************************************************************
 * Подключаю файлы для проверки условий выполнения хуков
****************************************************************/
// include dirname(__FILE__).'/condition/widgets.php';

// Указываем полный путь до нужной директории
$wpclean_dir_condition = dirname(__FILE__).'/condition/';

// Сканируем директорию, и сохраняем результат в массив
$wpclean_scan_dir_condition = scandir($wpclean_dir_condition);

// Проходимся циклом по массиву
foreach($wpclean_scan_dir_condition as $key => $value){

	// Создаём полный путь до файла, который нужно проверить и подключить
	$wpclean_path_file_condition = $wpclean_dir_condition.$value;

	// Проверяем, файл это или нет
	if(is_file($wpclean_path_file_condition)) {

		// Проверяем, существует ли файл
		if(file_exists($wpclean_path_file_condition)){

			// Выполняем подключение файла
			include $wpclean_path_file_condition;

		}

	}

}

/****************************************************************
 * Подключение стилей и скриптов
****************************************************************/
function wpclean_register_scripts_style(){
	// Регистрируем и подключаем файл css/wpclean-style.css
	wp_register_style('wpclean-style-plugin', plugins_url('css/wpclean-style.css', __FILE__));
	wp_enqueue_style('wpclean-style-plugin');
}
add_action('admin_enqueue_scripts', 'wpclean_register_scripts_style', 99);

/****************************************************************
 * Добавляем страницу плагина в боковую панель панели управления
****************************************************************/
add_action('admin_menu', 'wpclean_add_admin_menu');

function wpclean_add_admin_menu(){

	/**
	 * Родительская страница
	 * 
	 * $page_title - Заголовок страницы
	 * $menu_title - Текст ссылки в боковом меню
	 * $capability - Права пользователя, необходимые для доступа к странице
	 * $menu_slug - Ярлык страницы (slug)
	 * $function - Функция, которая выводит содержимое страницы
	 * $icon_url - Иконка, в данном случае из Dashicons
	 * $position - Позиция в меню
	**/
	add_menu_page('Настройки плагина WP-Clean', 'WP-Clean', 'manage_options', 'wpclean_dashboard_widget', 'wpclean_template_widgets', 'dashicons-admin-tools', 139 );
	
	/**
	 * Дочерние страницы
	 * 
	 * $parent_slug - Название (slug) родительского меню в которое будет добавлен пункт или название файла админ-страницы WordPress
	 * $page_title - Текст, который будет использован в теге title на странице
	 * $menu_title - Текст, который будет использован как название пункта меню
	 * $capability - Права пользователя, необходимые для доступа к странице
	 * $menu_slug - Уникальное название (slug), по которому затем можно обращаться к этому меню
	 * $function - Название функции которая будет вызваться, чтобы вывести контент создаваемой страницы
	 * $position - Позиция подпункта меню, относительно других подпунктов
	**/
	add_submenu_page('wpclean_dashboard_widget', 'Стандартные виджеты', 'Виджеты', 'manage_options', 'wpclean_dashboard_widget', 'wpclean_template_widgets' );

	add_submenu_page('wpclean_dashboard_widget', 'Безопасность', 'Безопасность', 'manage_options', 'wpclean_dashboard_security', 'wpclean_template_security');

	add_submenu_page('wpclean_dashboard_widget', 'Header', 'Header', 'manage_options', 'wpclean_dashboard_header', 'wpclean_template_header');

	add_submenu_page('wpclean_dashboard_widget', 'Профиль пользователя', 'Профиль пользователя', 'manage_options', 'wpclean_dashboard_profile', 'wpclean_template_profile');

	add_submenu_page('wpclean_dashboard_widget', 'Комментарии', 'Комментарии', 'manage_options', 'wpclean_dashboard_comments', 'wpclean_template_comments');

	add_submenu_page('wpclean_dashboard_widget', 'Интерфейс', 'Интерфейс', 'manage_options', 'wpclean_dashboard_interface', 'wpclean_template_interface');

	add_submenu_page('wpclean_dashboard_widget', 'Записи', 'Записи', 'manage_options', 'wpclean_dashboard_posts', 'wpclean_template_posts');

	add_submenu_page('wpclean_dashboard_widget', 'Поиск', 'Поиск', 'manage_options', 'wpclean_dashboard_search', 'wpclean_template_search');

	add_submenu_page('wpclean_dashboard_widget', 'Вложения', 'Вложения', 'manage_options', 'wpclean_dashboard_attachments', 'wpclean_template_attachments');

	add_submenu_page('wpclean_dashboard_widget', 'Изображения', 'Изображения', 'manage_options', 'wpclean_dashboard_images', 'wpclean_template_images');

	add_submenu_page('wpclean_dashboard_widget', 'Архивные страницы', 'Архивные страницы', 'manage_options', 'wpclean_dashboard_archives_pages', 'wpclean_template_archives_pages');

	add_submenu_page('wpclean_dashboard_widget', 'Обновления', 'Обновления', 'manage_options', 'wpclean_dashboard_update', 'wpclean_template_update');

	add_submenu_page('wpclean_dashboard_widget', 'RSS', 'RSS', 'manage_options', 'wpclean_dashboard_rss', 'wpclean_template_rss');

	add_submenu_page('wpclean_dashboard_widget', 'Постраничная навигация', 'Постраничная навигация', 'manage_options', 'wpclean_dashboard_pagination', 'wpclean_template_pagination');
}

/****************************************************************
 * Функция для очистки данных от лишних символов
****************************************************************/
function wpclean_option_sanitize($options){
	$clean_options = array();
	foreach ($options as $k => $v){
		$clean_options[$k] = strip_tags($v);
	}
	return $clean_options;
}

/****************************************************************
 * Регистрируем опции, секции и поля для секции
****************************************************************/
add_action('admin_init', 'wpclean_admin_settings');

function wpclean_admin_settings(){

	// Регистрирует новую опцию
	// $option_group - название группы, к которой будет принадлежать опция
	// $option_name - название опции, которая будет сохраняться в БД
	// $sanitize_callback - очистка данных от лишних символов
	register_setting('wpclean_group_widgets', 'wpclean_plugin_options_widgets', 'wpclean_option_sanitize'); // Опция для - виджетов
	register_setting('wpclean_group_profile', 'wpclean_plugin_options_profile', 'wpclean_option_sanitize'); // Опция для - профиля пользователя
	register_setting('wpclean_group_comments', 'wpclean_plugin_options_comments', 'wpclean_option_sanitize'); // Опция для - комментариев
	register_setting('wpclean_group_posts', 'wpclean_plugin_options_posts', 'wpclean_option_sanitize'); // Опция для - записей
	register_setting('wpclean_group_search', 'wpclean_plugin_options_search', 'wpclean_option_sanitize'); // Опция для - Поиск
	register_setting('wpclean_group_rss', 'wpclean_plugin_options_rss', 'wpclean_option_sanitize'); // Опция для - RSS
	register_setting('wpclean_group_security', 'wpclean_plugin_options_security', 'wpclean_option_sanitize'); // Опция для - безопасности
	register_setting('wpclean_group_interface', 'wpclean_plugin_options_interface', 'wpclean_option_sanitize'); // Опция для - Интерфейс
	register_setting('wpclean_group_header', 'wpclean_plugin_options_header', 'wpclean_option_sanitize'); // Опция для - Header
	register_setting('wpclean_group_attachments', 'wpclean_plugin_options_attachments', 'wpclean_option_sanitize'); // Опция для - attachments
	register_setting('wpclean_group_images', 'wpclean_plugin_options_images', 'wpclean_option_sanitize'); // Опция для - Изображения
	register_setting('wpclean_group_archives_pages', 'wpclean_plugin_options_archives_pages', 'wpclean_option_sanitize'); // Опция для - Архивные страницы
	register_setting('wpclean_group_update', 'wpclean_plugin_options_update', 'wpclean_option_sanitize'); // Опция для - Обновления
	register_setting('wpclean_group_pagination', 'wpclean_plugin_options_pagination', 'wpclean_option_sanitize'); // Опция для - Постраничная навигация

	// Создает новый блок (секцию), в котором выводятся поля настроек
	// $id - идентификатор секции, по которому нужно "цеплять" поля к секции. Строка, которая будет использована для id атрибутов тегов
	// $title - заголовок секции
	// $callback - коллбэк (функция), которая заполняет секцию описанием
	// $page - страница на которой выводить секцию
	add_settings_section('wpclean_section_widgets_id', 'Стандартные виджеты', '', 'wpclean_dashboard_section_widgets');
	add_settings_section('wpclean_section_profile_id', 'Профиль пользователя', '', 'wpclean_dashboard_section_profile');
	add_settings_section('wpclean_section_comments_id', 'Комментарии', '', 'wpclean_dashboard_section_comments');
	add_settings_section('wpclean_section_posts_id', 'Записи', '', 'wpclean_dashboard_section_posts');
	add_settings_section('wpclean_section_search_id', 'Поиск', '', 'wpclean_dashboard_section_search');
	add_settings_section('wpclean_section_rss_id', 'RSS ленты', '', 'wpclean_dashboard_section_rss');
	add_settings_section('wpclean_section_security_id', 'Безопасность', '', 'wpclean_dashboard_section_security');
	add_settings_section('wpclean_section_interface_id', 'Интерфейс', '', 'wpclean_dashboard_section_interface');
	add_settings_section('wpclean_section_header_id', 'Header', '', 'wpclean_dashboard_section_header');
	add_settings_section('wpclean_section_attachments_id', 'Вложения', '', 'wpclean_dashboard_section_attachments');
	add_settings_section('wpclean_section_images_id', 'Изображения', '', 'wpclean_dashboard_section_images');
	add_settings_section('wpclean_section_archives_pages_id', 'Архивные страницы', '', 'wpclean_dashboard_section_archives_pages');
	add_settings_section('wpclean_section_update_id', 'Обновления', '', 'wpclean_dashboard_section_update');
	add_settings_section('wpclean_section_pagination_id', 'Постраничная навигация', '', 'wpclean_dashboard_section_pagination');

	// Создает поле опции для указанной секции (указанного блока настроек).
	// $id - ярлык (slug) опции, используется как идентификатор поля
	// $title - название поля
	// $callback - название функции обратного вызова, которая генерирует HTML-код
	// $page - страница меню в которую будет добавлено поле
	// $section - название секции настроек, в которую будет добавлено поле
	// $args - дополнительные параметры, которые нужно передать callback функции

	/**
	 * Поля для секции - wpclean_dashboard_section_widgets
	**/
	add_settings_field('wpclean_option_widgets_disable_gutenberg', 'Отключить редактор блоков Gutenberg на странице виджетов', 'wpclean_html_widgets_disable_gutenberg_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_disable_gutenberg'));

	add_settings_field('wpclean_option_widgets_archives', 'Отключить виджет «Архивы»', 'wpclean_html_widgets_archives_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_archives'));

	add_settings_field('wpclean_option_widgets_calendar', 'Отключить виджет «Календарь»', 'wpclean_html_widgets_calendar_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_calendar'));

	add_settings_field('wpclean_option_widgets_categories', 'Отключить виджет «Рубрики»', 'wpclean_html_widgets_categories_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_categories'));

	add_settings_field('wpclean_option_widgets_meta', 'Отключить виджет «Мета»', 'wpclean_html_widgets_meta_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_meta'));

	add_settings_field('wpclean_option_widgets_pages', 'Отключить виджет «Страницы»', 'wpclean_html_widgets_pages_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_pages'));

	add_settings_field('wpclean_option_widgets_recent_comments', 'Отключить виджет «Свежие комментарии»', 'wpclean_html_widgets_recent_comments_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_recent_comments'));

	add_settings_field('wpclean_option_widgets_recent_posts', 'Отключить виджет «Свежие записи»', 'wpclean_html_widgets_recent_posts_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_recent_posts'));

	add_settings_field('wpclean_option_widgets_rss', 'Отключить виджет «RSS»', 'wpclean_html_widgets_rss_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_rss'));

	add_settings_field('wpclean_option_widgets_search', 'Отключить виджет «Поиск»', 'wpclean_html_widgets_search_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_search'));

	add_settings_field('wpclean_option_widgets_tag_cloud', 'Отключить виджет «Облако меток»', 'wpclean_html_widgets_tag_cloud_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_tag_cloud'));

	add_settings_field('wpclean_option_widgets_text', 'Отключить виджет «Текст»', 'wpclean_html_widgets_text_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_text'));

	add_settings_field('wpclean_option_widgets_nav_menu', 'Отключить виджет «Произвольное меню»', 'wpclean_html_widgets_nav_menu_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_nav_menu'));

	add_settings_field('wpclean_option_widgets_custom_html', 'Отключить виджет «HTML-код»', 'wpclean_html_widgets_custom_html_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_custom_html'));

	add_settings_field('wpclean_option_widgets_media_audio', 'Отключить виджет «Аудио»', 'wpclean_html_widgets_media_audio_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_media_audio'));

	add_settings_field('wpclean_option_widgets_media_video', 'Отключить виджет «Видео»', 'wpclean_html_widgets_media_video_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_media_video'));

	add_settings_field('wpclean_option_widgets_media_galery', 'Отключить виджет «Галерея»', 'wpclean_html_widgets_media_galery_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_media_galery'));

	add_settings_field('wpclean_option_widgets_media_image', 'Отключить виджет «Изображение»', 'wpclean_html_widgets_media_image_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_media_image'));

	add_settings_field('wpclean_option_widgets_block', 'Отключить виджет «Блок»', 'wpclean_html_widgets_block_cb', 'wpclean_dashboard_section_widgets', 'wpclean_section_widgets_id', array('label_for' => 'wpclean_option_widgets_block'));

	/**
	 * Поля для секции - wpclean_dashboard_section_profile
	**/
	add_settings_field('wpclean_option_profile_color_mode', 'Запретить изменение цветовой гаммы', 'wpclean_profile_color_mode_cb', 'wpclean_dashboard_section_profile', 'wpclean_section_profile_id', array('label_for' => 'wpclean_option_profile_color_mode'));

	add_settings_field('wpclean_option_profile_admin_bar', 'Не показывать «admin bar» на лицевой части сайта', 'wpclean_profile_admin_bar_cb', 'wpclean_dashboard_section_profile', 'wpclean_section_profile_id', array('label_for' => 'wpclean_option_profile_admin_bar'));

	/**
	 * Поля для секции - wpclean_dashboard_section_comments
	**/
	add_settings_field('wpclean_option_comments_site_filed', 'Удалить поле «Сайт» в форме комментариев', 'wpclean_comments_site_filed_cb', 'wpclean_dashboard_section_comments', 'wpclean_section_comments_id', array('label_for' => 'wpclean_option_comments_site_filed'));

	add_settings_field('wpclean_option_comments_username_admin_remove', 'Удалить имя пользователя администратора из CSS-классов в комментариях', 'wpclean_comments_username_admin_remove_cb', 'wpclean_dashboard_section_comments', 'wpclean_section_comments_id', array('label_for' => 'wpclean_option_comments_username_admin_remove'));

	add_settings_field('wpclean_option_comments_replytocom', 'Удалить ссылки ?replytocom в комментариях', 'wpclean_comments_replytocom_cb', 'wpclean_dashboard_section_comments', 'wpclean_section_comments_id', array('label_for' => 'wpclean_option_comments_replytocom'));

	add_settings_field('wpclean_option_comments_specialchars', 'Запретить HTML-код в комментариях', 'wpclean_comments_specialchars_cb', 'wpclean_dashboard_section_comments', 'wpclean_section_comments_id', array('label_for' => 'wpclean_option_comments_specialchars'));

	add_settings_field('wpclean_option_comments_remove_author_links', 'Удалить ссылку на автора комментария', 'wpclean_comments_remove_author_links_cb', 'wpclean_dashboard_section_comments', 'wpclean_section_comments_id', array('label_for' => 'wpclean_option_comments_remove_author_links'));

	/**
	 * Поля для секции - wpclean_dashboard_section_posts
	**/
	add_settings_field('wpclean_option_posts_disable_gutenberg', 'Отключить редактор блоков Gutenberg для всех типов записей', 'wpclean_posts_disable_gutenberg_cb', 'wpclean_dashboard_section_posts', 'wpclean_section_posts_id', array('label_for' => 'wpclean_option_posts_disable_gutenberg'));

	add_settings_field('wpclean_option_posts_autosave', 'Отключить автоматическое сохранение записи', 'wpclean_posts_autosave_cb', 'wpclean_dashboard_section_posts', 'wpclean_section_posts_id', array('label_for' => 'wpclean_option_posts_autosave'));

	add_settings_field('wpclean_option_posts_canonical', 'Удалить canonical ссылку записи', 'wpclean_posts_canonical_cb', 'wpclean_dashboard_section_posts', 'wpclean_section_posts_id', array('label_for' => 'wpclean_option_posts_canonical'));

	add_settings_field('wpclean_option_posts_shortlink', 'Удалить ссылку shortlink у записи', 'wpclean_posts_shortlink_cb', 'wpclean_dashboard_section_posts', 'wpclean_section_posts_id', array('label_for' => 'wpclean_option_posts_shortlink'));

	add_settings_field('wpclean_option_posts_adjacent_posts_rel', 'Удалить ссылки adjacent_posts_rel_link у записи', 'wpclean_posts_adjacent_posts_rel_cb', 'wpclean_dashboard_section_posts', 'wpclean_section_posts_id', array('label_for' => 'wpclean_option_posts_adjacent_posts_rel'));

	/**
	 * Поля для секции - wpclean_dashboard_section_pages
	**/
	add_settings_field('wpclean_option_search_disable_on_site', 'Отключить поиск на сайте', 'wpclean_search_disable_on_site_cb', 'wpclean_dashboard_section_search', 'wpclean_section_search_id', array('label_for' => 'wpclean_option_search_disable_on_site'));

	add_settings_field('wpclean_option_search_excluded_pages', 'Исключить страницы из результатов поиска', 'wpclean_search_excluded_pages_cb', 'wpclean_dashboard_section_search', 'wpclean_section_search_id', array('label_for' => 'wpclean_option_search_excluded_pages'));

	/**
	 * Поля для секции - wpclean_dashboard_section_rss
	**/
	add_settings_field('wpclean_option_rss_do_feed_rss2', 'Отключить формат ленты RSS2', 'wpclean_rss_do_feed_rss2_cb', 'wpclean_dashboard_section_rss', 'wpclean_section_rss_id', array('label_for' => 'wpclean_option_rss_do_feed_rss2'));

	add_settings_field('wpclean_option_rss_do_feed_atom', 'Отключить формат ленты Atom', 'wpclean_rss_do_feed_atom_cb', 'wpclean_dashboard_section_rss', 'wpclean_section_rss_id', array('label_for' => 'wpclean_option_rss_do_feed_atom'));

	add_settings_field('wpclean_option_rss_do_feed_rdf', 'Отключить формат ленты RDF', 'wpclean_rss_do_feed_rdf_cb', 'wpclean_dashboard_section_rss', 'wpclean_section_rss_id', array('label_for' => 'wpclean_option_rss_do_feed_rdf'));

	add_settings_field('wpclean_option_rss_feed_links_extra', 'Удалить ссылки на дополнительные RSS-ленты сайта', 'wpclean_rss_feed_links_extra_cb', 'wpclean_dashboard_section_rss', 'wpclean_section_rss_id', array('label_for' => 'wpclean_option_rss_feed_links_extra'));

	add_settings_field('wpclean_option_rss_feed_links', 'Удалить ссылки на основные RSS-ленты сайта', 'wpclean_rss_feed_links_cb', 'wpclean_dashboard_section_rss', 'wpclean_section_rss_id', array('label_for' => 'wpclean_option_rss_feed_links'));

	/**
	 * Поля для секции - wpclean_dashboard_section_security
	**/
	add_settings_field('wpclean_option_security_redirect_http_to_https', 'Включить перенаправление с http на https', 'wpclean_security_redirect_http_to_https_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_redirect_http_to_https'));

	add_settings_field('wpclean_option_security_hidden_username_admin', 'Отключить переход по ссылке /?author=', 'wpclean_security_hidden_username_admin_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_hidden_username_admin'));

	add_settings_field('wpclean_option_security_wp_generator', 'Скрыть версию WordPress', 'wpclean_security_wp_generator_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_wp_generator'));

	add_settings_field('wpclean_option_security_remove_ver_style', 'Удалить ?ver у файлов стилей', 'wpclean_security_remove_ver_style_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_remove_ver_style'));

	add_settings_field('wpclean_option_security_remove_ver_script', 'Удалить ?ver у файлов скриптов', 'wpclean_security_remove_ver_script_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_remove_ver_script'));

	add_settings_field('wpclean_option_security_trackback_self_site', 'Отключить Trackback на собственный сайт', 'wpclean_security_trackback_self_site_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_trackback_self_site'));

	add_settings_field('wpclean_option_security_rsd_link', 'Удалить rsd ссылку', 'wpclean_security_rsd_link_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_rsd_link'));

	add_settings_field('wpclean_option_security_wlwmanifest_link', 'Удалить wlwmanifest ссылку', 'wpclean_security_wlwmanifest_link_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_wlwmanifest_link'));

	add_settings_field('wpclean_option_security_xml_rpc', 'Отключить XML-RPC и удалить ссылку X-Pingback', 'wpclean_security_xml_rpc_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_xml_rpc'));

	add_settings_field('wpclean_option_security_remove_file_license', 'Удалить файл license.txt', 'wpclean_security_remove_file_license_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_remove_file_license'));

	add_settings_field('wpclean_option_security_remove_file_readme', 'Удалить файл readme.html', 'wpclean_security_remove_file_readme_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_remove_file_readme'));

	add_settings_field('wpclean_option_security_remove_file_install', 'Удалить файл install.php', 'wpclean_security_remove_file_install_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_remove_file_install'));

	add_settings_field('wpclean_option_security_remove_file_wp_config_sample', 'Удалить файл wp-config-sample.php', 'wpclean_security_remove_file_wp_config_sample_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_remove_file_wp_config_sample'));

	add_settings_field('wpclean_option_security_change_auth_text', 'Изменить текст ошибки авторизации', 'wpclean_security_change_auth_text_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_change_auth_text'));

	add_settings_field('wpclean_option_security_disable_lost_your_password', 'Отключить возможность сброса пароля для учётных записей', 'wpclean_security_disable_lost_your_password_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_disable_lost_your_password'));

	add_settings_field('wpclean_option_security_redirect_lost_your_password', 'Запретить вход на страницу «Забыли пароль?»', 'wpclean_security_redirect_lost_your_password_cb', 'wpclean_dashboard_section_security', 'wpclean_section_security_id', array('label_for' => 'wpclean_option_security_redirect_lost_your_password'));

	/**
	 * Поля для секции - wpclean_dashboard_section_interface
	**/
	add_settings_field('wpclean_option_interface_block_help', 'Удалить блок «Помощь»', 'wpclean_interface_block_help_cb', 'wpclean_dashboard_section_interface', 'wpclean_section_interface_id', array('label_for' => 'wpclean_option_interface_block_help'));

	add_settings_field('wpclean_option_interface_block_settings_display', 'Удалить блок «Настройки экрана»', 'wpclean_interface_block_settings_display_cb', 'wpclean_dashboard_section_interface', 'wpclean_section_interface_id', array('label_for' => 'wpclean_option_interface_block_settings_display'));

	add_settings_field('wpclean_option_interface_link_admin_bar', 'Удалить ссылки на сайт WordPress из «admin bar»', 'wpclean_interface_link_admin_bar_cb', 'wpclean_dashboard_section_interface', 'wpclean_section_interface_id', array('label_for' => 'wpclean_option_interface_link_admin_bar'));

	add_settings_field('wpclean_option_interface_text_thankyou', 'Удалить текст «Спасибо вам за творчество с WordPress»', 'wpclean_interface_text_thankyou_cb', 'wpclean_dashboard_section_interface', 'wpclean_section_interface_id', array('label_for' => 'wpclean_option_interface_text_thankyou'));

	add_settings_field('wpclean_option_interface_remove_wp_version', 'Удалить номер версии WordPress', 'wpclean_interface_remove_wp_version_cb', 'wpclean_dashboard_section_interface', 'wpclean_section_interface_id', array('label_for' => 'wpclean_option_interface_remove_wp_version'));

	add_settings_field('wpclean_option_interface_hide_admin_icons', 'Скрыть иконки в боковой колонке', 'wpclean_interface_hide_admin_icons_cb', 'wpclean_dashboard_section_interface', 'wpclean_section_interface_id', array('label_for' => 'wpclean_option_interface_hide_admin_icons'));

	add_settings_field('wpclean_option_interface_remove_browser_nag', 'Удалить уведомление «Ваш браузер устарел»', 'wpclean_interface_remove_browser_nag_cb', 'wpclean_dashboard_section_interface', 'wpclean_section_interface_id', array('label_for' => 'wpclean_option_interface_remove_browser_nag'));

	add_settings_field('wpclean_option_interface_remove_php_nag', 'Удалить уведомление «Требуется обновление PHP»', 'wpclean_interface_remove_php_nag_cb', 'wpclean_dashboard_section_interface', 'wpclean_section_interface_id', array('label_for' => 'wpclean_option_interface_remove_php_nag'));

	/**
	 * Поля для секции - wpclean_dashboard_section_header
	**/
	add_settings_field('wpclean_option_header_disable_json', 'Отключить «JSON REST API»', 'wpclean_header_disable_json_cb', 'wpclean_dashboard_section_header', 'wpclean_section_header_id', array('label_for' => 'wpclean_option_header_disable_json'));

	add_settings_field('wpclean_option_header_disable_emoji', 'Отключить «Emoji»', 'wpclean_header_disable_emoji_cb', 'wpclean_dashboard_section_header', 'wpclean_section_header_id', array('label_for' => 'wpclean_option_header_disable_emoji'));

	add_settings_field('wpclean_option_header_remove_dns_prefetch', 'Удалить «dns-prefetch»', 'wpclean_header_remove_dns_prefetch_cb', 'wpclean_dashboard_section_header', 'wpclean_section_header_id', array('label_for' => 'wpclean_option_header_remove_dns_prefetch'));

	add_settings_field('wpclean_option_header_disable_jquery_migrate', 'Удалить «jquery-migrate.min.js»', 'wpclean_header_disable_jquery_migrate_cb', 'wpclean_dashboard_section_header', 'wpclean_section_header_id', array('label_for' => 'wpclean_option_header_disable_jquery_migrate'));

	/**
	 * Поля для секции - wpclean_dashboard_section_attachments
	**/

	add_settings_field('wpclean_option_attachments_delete_files_posts', 'При удалении записи также удалять все вложения', 'wpclean_attachments_delete_files_posts_cb', 'wpclean_dashboard_section_attachments', 'wpclean_section_attachments_id', array('label_for' => 'wpclean_option_attachments_delete_files_posts'));

	add_settings_field('wpclean_option_attachments_delete_pages_attachments', 'Удалить страницы вложений', 'wpclean_attachments_delete_pages_attachments_cb', 'wpclean_dashboard_section_attachments', 'wpclean_section_attachments_id', array('label_for' => 'wpclean_option_attachments_delete_pages_attachments'));

	/**
	 * Поля для секции - wpclean_dashboard_section_images
	**/

	add_settings_field('wpclean_option_images_disable_srcset', 'Отключить функцию SRCSET', 'wpclean_images_disable_srcset_cb', 'wpclean_dashboard_section_images', 'wpclean_section_images_id', array('label_for' => 'wpclean_option_images_disable_srcset'));

	add_settings_field('wpclean_option_images_allow_svg_upload', 'Разрешить WordPress загружать SVG файлы', 'wpclean_images_allow_svg_upload_cb', 'wpclean_dashboard_section_images', 'wpclean_section_images_id', array('label_for' => 'wpclean_option_images_allow_svg_upload'));

	/**
	 * Поля для секции - wpclean_dashboard_section_archives_pages
	**/

	add_settings_field('wpclean_option_archives_pages_author', 'Отключить «Архив автора»', 'wpclean_archives_pages_author_cb', 'wpclean_dashboard_section_archives_pages', 'wpclean_section_archives_pages_id', array('label_for' => 'wpclean_option_archives_pages_author'));

	add_settings_field('wpclean_option_archives_pages_tags', 'Отключить «Архив по тегам»', 'wpclean_archives_pages_tags_cb', 'wpclean_dashboard_section_archives_pages', 'wpclean_section_archives_pages_id', array('label_for' => 'wpclean_option_archives_pages_tags'));

	add_settings_field('wpclean_option_archives_pages_day', 'Отключить «Архив по дню»', 'wpclean_archives_pages_day_cb', 'wpclean_dashboard_section_archives_pages', 'wpclean_section_archives_pages_id', array('label_for' => 'wpclean_option_archives_pages_day'));

	add_settings_field('wpclean_option_archives_pages_month', 'Отключить «Архив по месяцу»', 'wpclean_archives_pages_month_cb', 'wpclean_dashboard_section_archives_pages', 'wpclean_section_archives_pages_id', array('label_for' => 'wpclean_option_archives_pages_month'));

	add_settings_field('wpclean_option_archives_pages_year', 'Отключить «Архив по году»', 'wpclean_archives_pages_year_cb', 'wpclean_dashboard_section_archives_pages', 'wpclean_section_archives_pages_id', array('label_for' => 'wpclean_option_archives_pages_year'));

	add_settings_field('wpclean_option_archives_pages_category', 'Отключить «Архив по категориям»', 'wpclean_archives_pages_category_cb', 'wpclean_dashboard_section_archives_pages', 'wpclean_section_archives_pages_id', array('label_for' => 'wpclean_option_archives_pages_category'));

	/**
	 * Поля для секции - wpclean_dashboard_section_update
	**/

	add_settings_field('wpclean_option_update_disable_auto_core', 'Отключить авто-обновление «ядра»', 'wpclean_update_disable_auto_core_cb', 'wpclean_dashboard_section_update', 'wpclean_section_update_id', array('label_for' => 'wpclean_option_update_disable_auto_core'));

	add_settings_field('wpclean_option_update_disable_auto_theme', 'Отключить авто-обновление «тем оформления»', 'wpclean_update_disable_auto_theme_cb', 'wpclean_dashboard_section_update', 'wpclean_section_update_id', array('label_for' => 'wpclean_option_update_disable_auto_theme'));

	add_settings_field('wpclean_option_update_disable_auto_plugin', 'Отключить авто-обновление «плагинов»', 'wpclean_update_disable_auto_plugin_cb', 'wpclean_dashboard_section_update', 'wpclean_section_update_id', array('label_for' => 'wpclean_option_update_disable_auto_plugin'));

	add_settings_field('wpclean_option_update_disable_auto_translation', 'Отключить авто-обновление «переводов»', 'wpclean_update_disable_auto_translation_cb', 'wpclean_dashboard_section_update', 'wpclean_section_update_id', array('label_for' => 'wpclean_option_update_disable_auto_translation'));

	add_settings_field('wpclean_option_update_deny_update_core', 'Запретить обновление «ядра»', 'wpclean_update_deny_update_core_cb', 'wpclean_dashboard_section_update', 'wpclean_section_update_id', array('label_for' => 'wpclean_option_update_deny_update_core'));

	add_settings_field('wpclean_option_update_deny_update_theme', 'Запретить обновление «тем оформления»', 'wpclean_update_deny_update_theme_cb', 'wpclean_dashboard_section_update', 'wpclean_section_update_id', array('label_for' => 'wpclean_option_update_deny_update_theme'));

	add_settings_field('wpclean_option_update_deny_update_plugin', 'Запретить обновление «плагинов»', 'wpclean_update_deny_update_plugin_cb', 'wpclean_dashboard_section_update', 'wpclean_section_update_id', array('label_for' => 'wpclean_option_update_deny_update_plugin'));

	/**
	 * Поля для секции - wpclean_dashboard_section_pagination
	**/

	add_settings_field('wpclean_option_pagination_noindex_pages', 'Закрыть страницы пагинации от индексации', 'wpclean_pagination_noindex_pages_cb', 'wpclean_dashboard_section_pagination', 'wpclean_section_pagination_id', array('label_for' => 'wpclean_option_pagination_noindex_pages'));

	add_settings_field('wpclean_option_pagination_remove_title_block', 'Удалить заголовок блока постраничной навигации', 'wpclean_pagination_remove_title_block_cb', 'wpclean_dashboard_section_pagination', 'wpclean_section_pagination_id', array('label_for' => 'wpclean_option_pagination_remove_title_block'));

}

?>