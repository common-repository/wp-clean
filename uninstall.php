<?php

/**
 * Выполняем действия при удалении плагина
**/
// Если константа WP_UNINSTALL_PLUGIN не определена, то завершаем удаление плагина
if(!defined('WP_UNINSTALL_PLUGIN')){
	exit();
}

// Удаляем все созданные опции
delete_option('wpclean_plugin_options_archives_pages');
delete_option('wpclean_plugin_options_attachments');
delete_option('wpclean_plugin_options_comments');
delete_option('wpclean_plugin_options_header');
delete_option('wpclean_plugin_options_images');
delete_option('wpclean_plugin_options_interface');
delete_option('wpclean_plugin_options_pagination');
delete_option('wpclean_plugin_options_posts');
delete_option('wpclean_plugin_options_profile');
delete_option('wpclean_plugin_options_rss');
delete_option('wpclean_plugin_options_search');
delete_option('wpclean_plugin_options_security');
delete_option('wpclean_plugin_options_update');
delete_option('wpclean_plugin_options_widgets');