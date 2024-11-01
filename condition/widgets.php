<?php

// Отключить редактор блоков Gutenberg на странице виджетов
function wpclean_disable_widget_editor_gutenberg() {

	$options = get_option('wpclean_plugin_options_widgets');
	$widget_disable_gutenberg = esc_attr($options['wpclean_option_widgets_disable_gutenberg']);

	if($widget_disable_gutenberg == '1'){
		// Disables the block editor from managing widgets in the Gutenberg plugin.
		add_filter('gutenberg_use_widgets_block_editor', '__return_false');
		// Disables the block editor from managing widgets.
		add_filter('use_widgets_block_editor', '__return_false');
	}
}

$wpclean_disable_widget_editor_gutenberg = 'wpclean_disable_widget_editor_gutenberg';
$wpclean_disable_widget_editor_gutenberg();

// Отключаем виджет - «Архивы»

function wpclean_disable_widget_archives() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_archives = esc_attr($options['wpclean_option_widgets_archives']);

	if($widget_archives == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Archives');	
		});
	}
}

$wpclean_disable_widget_archives = 'wpclean_disable_widget_archives';
$wpclean_disable_widget_archives();

// Отключаем виджет - «Календарь»
add_action( 'widgets_init', 'wpclean_disable_widget_calendar' );

function wpclean_disable_widget_calendar() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_calendar = esc_attr($options['wpclean_option_widgets_calendar']);

	if($widget_calendar == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Calendar');	
		});
	}
}

$wpclean_disable_widget_calendar = 'wpclean_disable_widget_calendar';
$wpclean_disable_widget_calendar();

// Отключаем виджет - «Рубрики»
add_action( 'widgets_init', 'wpclean_disable_widget_categories' );

function wpclean_disable_widget_categories() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_categories = esc_attr($options['wpclean_option_widgets_categories']);

	if($widget_categories == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Categories');	
		});
	}
}

$wpclean_disable_widget_categories = 'wpclean_disable_widget_categories';
$wpclean_disable_widget_categories();

// Отключаем виджет - «Мета»
add_action( 'widgets_init', 'wpclean_disable_widget_meta' );

function wpclean_disable_widget_meta() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_meta = esc_attr($options['wpclean_option_widgets_meta']);

	if($widget_meta == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Meta');	
		});
	}
}

$wpclean_disable_widget_meta = 'wpclean_disable_widget_meta';
$wpclean_disable_widget_meta();

// Отключаем виджет - «Страницы»
add_action( 'widgets_init', 'wpclean_disable_widget_pages' );

function wpclean_disable_widget_pages() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_pages = esc_attr($options['wpclean_option_widgets_pages']);

	if($widget_pages == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Pages');	
		});
	}
}

$wpclean_disable_widget_pages = 'wpclean_disable_widget_pages';
$wpclean_disable_widget_pages();

// Отключаем виджет - «Свежие комментарии»
add_action( 'widgets_init', 'wpclean_disable_widget_recent_comments' );

function wpclean_disable_widget_recent_comments() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_recent_comments = esc_attr($options['wpclean_option_widgets_recent_comments']);

	if($widget_recent_comments == '1'){
		// Отключаем виджет
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Recent_Comments');	
		});
		// Удаляем стили .recentcomments для виджета
		add_action( 'widgets_init', function(){
			global $wp_widget_factory;
			remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
		});
	}
}

$wpclean_disable_widget_recent_comments = 'wpclean_disable_widget_recent_comments';
$wpclean_disable_widget_recent_comments();

// Отключаем виджет - «Свежие записи»
add_action( 'widgets_init', 'wpclean_disable_widget_recent_posts' );

function wpclean_disable_widget_recent_posts() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_recent_posts = esc_attr($options['wpclean_option_widgets_recent_posts']);

	if($widget_recent_posts == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Recent_Posts');	
		});
	}
}

$wpclean_disable_widget_recent_posts = 'wpclean_disable_widget_recent_posts';
$wpclean_disable_widget_recent_posts();

// Отключаем виджет - «RSS»
add_action( 'widgets_init', 'wpclean_disable_widget_rss' );

function wpclean_disable_widget_rss() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_rss = esc_attr($options['wpclean_option_widgets_rss']);

	if($widget_rss == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_RSS');	
		});
	}
}

$wpclean_disable_widget_rss = 'wpclean_disable_widget_rss';
$wpclean_disable_widget_rss();

// Отключаем виджет - «Поиск»
add_action( 'widgets_init', 'wpclean_disable_widget_search' );

function wpclean_disable_widget_search() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_search = esc_attr($options['wpclean_option_widgets_search']);

	if($widget_search == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Search');	
		});
	}
}

$wpclean_disable_widget_search = 'wpclean_disable_widget_search';
$wpclean_disable_widget_search();

// Отключаем виджет - «Облако меток»
add_action( 'widgets_init', 'wpclean_disable_widget_tag_cloud' );

function wpclean_disable_widget_tag_cloud() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_tag_cloud = esc_attr($options['wpclean_option_widgets_tag_cloud']);

	if($widget_tag_cloud == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Tag_Cloud');
		});
	}
}

$wpclean_disable_widget_tag_cloud = 'wpclean_disable_widget_tag_cloud';
$wpclean_disable_widget_tag_cloud();

// Отключаем виджет - «Текст»
add_action( 'widgets_init', 'wpclean_disable_widget_text' );

function wpclean_disable_widget_text() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_text = esc_attr($options['wpclean_option_widgets_text']);

	if($widget_text == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Text');
		});
	}
}

$wpclean_disable_widget_text = 'wpclean_disable_widget_text';
$wpclean_disable_widget_text();

// Отключаем виджет - «Произвольное меню»
add_action( 'widgets_init', 'wpclean_disable_widget_nav_menu' );

function wpclean_disable_widget_nav_menu() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_nav_menu = esc_attr($options['wpclean_option_widgets_nav_menu']);

	if($widget_nav_menu == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Nav_Menu_Widget');
		});
	}
}

$wpclean_disable_widget_nav_menu = 'wpclean_disable_widget_nav_menu';
$wpclean_disable_widget_nav_menu();

// Отключаем виджет - «HTML код»
add_action( 'widgets_init', 'wpclean_disable_widget_custom_html' );

function wpclean_disable_widget_custom_html() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_custom_html = esc_attr($options['wpclean_option_widgets_custom_html']);

	if($widget_custom_html == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Custom_HTML');
		});
	}
}

$wpclean_disable_widget_custom_html = 'wpclean_disable_widget_custom_html';
$wpclean_disable_widget_custom_html();

// Отключаем виджет - «Аудио»
add_action( 'widgets_init', 'wpclean_disable_widget_media_audio' );

function wpclean_disable_widget_media_audio() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_media_audio = esc_attr($options['wpclean_option_widgets_media_audio']);

	if($widget_media_audio == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Media_Audio');
		});
	}
}

$wpclean_disable_widget_media_audio = 'wpclean_disable_widget_media_audio';
$wpclean_disable_widget_media_audio();

// Отключаем виджет - «Видео»
add_action( 'widgets_init', 'wpclean_disable_widget_media_video' );

function wpclean_disable_widget_media_video() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_media_video = esc_attr($options['wpclean_option_widgets_media_video']);

	if($widget_media_video == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Media_Video');
		});
	}
}

$wpclean_disable_widget_media_video = 'wpclean_disable_widget_media_video';
$wpclean_disable_widget_media_video();

// Отключаем виджет - «Галерея»
add_action( 'widgets_init', 'wpclean_disable_widget_media_galery' );

function wpclean_disable_widget_media_galery() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_media_galery = esc_attr($options['wpclean_option_widgets_media_galery']);

	if($widget_media_galery == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Media_Gallery');
		});
	}
}

$wpclean_disable_widget_media_galery = 'wpclean_disable_widget_media_galery';
$wpclean_disable_widget_media_galery();

// Отключаем виджет - «Изображение»
add_action( 'widgets_init', 'wpclean_disable_widget_media_image' );

function wpclean_disable_widget_media_image() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_media_image = esc_attr($options['wpclean_option_widgets_media_image']);

	if($widget_media_image == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Media_Image');
		});
	}
}

$wpclean_disable_widget_media_image = 'wpclean_disable_widget_media_image';
$wpclean_disable_widget_media_image();

// Отключаем виджет - «Блок»
add_action( 'widgets_init', 'wpclean_disable_widget_block' );

function wpclean_disable_widget_block() {
	$options = get_option('wpclean_plugin_options_widgets');
	$widget_block = esc_attr($options['wpclean_option_widgets_block']);

	if($widget_block == '1'){
		add_action('widgets_init', function(){
			unregister_widget('WP_Widget_Block');
		});
	}
}

$wpclean_disable_widget_block = 'wpclean_disable_widget_block';
$wpclean_disable_widget_block();

?>