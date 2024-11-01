<?php

// Отключить редактор блоков Gutenberg для всех типов записей
function wpclean_disable_posts_editor_gutenberg(){

	$options = get_option('wpclean_plugin_options_posts');
	$posts_disable_gutenberg = esc_attr($options['wpclean_option_posts_disable_gutenberg']);

	if($posts_disable_gutenberg == '1'){
		add_filter('use_block_editor_for_post_type', '__return_false');
	}
}

$wpclean_disable_posts_editor_gutenberg = 'wpclean_disable_posts_editor_gutenberg';
$wpclean_disable_posts_editor_gutenberg();

// Отключаем автоматическое сохранение записи
function wpclean_disable_posts_autosave(){

	$options = get_option('wpclean_plugin_options_posts');
	$posts_autosave = esc_attr($options['wpclean_option_posts_autosave']);

	if($posts_autosave == '1'){
		add_action('wp_print_scripts', function(){
			wp_deregister_script('autosave');
		});
	}
}

$wpclean_disable_posts_autosave = 'wpclean_disable_posts_autosave';
$wpclean_disable_posts_autosave();

// Удалить canonical ссылку записи
function wpclean_disable_posts_canonical() {

	$options = get_option('wpclean_plugin_options_posts');
	$posts_canonical = esc_attr($options['wpclean_option_posts_canonical']);

	if($posts_canonical == '1'){
		remove_action('wp_head','rel_canonical');
	}

}

$wpclean_disable_posts_canonical = 'wpclean_disable_posts_canonical';
$wpclean_disable_posts_canonical();

// Удалить ссылку shortlink у записей
function wpclean_disable_posts_shortlink() {

	$options = get_option('wpclean_plugin_options_posts');
	$posts_shortlink = esc_attr($options['wpclean_option_posts_shortlink']);

	if($posts_shortlink == '1'){
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
		remove_action('template_redirect', 'wp_shortlink_header', 11 ); // Удаляем короткую ссылку на текущую запись из header ответа сервера
	}
}

$wpclean_disable_posts_shortlink = 'wpclean_disable_posts_shortlink';
$wpclean_disable_posts_shortlink();

// Удалить ссылки adjacent_posts_rel_link у записи
function wpclean_disable_posts_adjacent_posts_rel() {

	$options = get_option('wpclean_plugin_options_posts');
	$posts_adjacent_posts_rel = esc_attr($options['wpclean_option_posts_adjacent_posts_rel']);

	if($posts_adjacent_posts_rel == '1'){
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0 );
	}

}

$wpclean_disable_posts_adjacent_posts_rel = 'wpclean_disable_posts_adjacent_posts_rel';
$wpclean_disable_posts_adjacent_posts_rel();

?>