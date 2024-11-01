<?php

// Удаляем поле «Сайт» в форме комментариев
function wpclean_disable_comments_site_field() {

	$options = get_option('wpclean_plugin_options_comments');
	$comments_site_field = esc_attr($options['wpclean_option_comments_site_filed']);

	if($comments_site_field == '1'){
		add_filter('comment_form_default_fields', function($fields){
			unset($fields['url']);
			return $fields;
		});
	}
}

$wpclean_disable_comments_site_field = 'wpclean_disable_comments_site_field';
$wpclean_disable_comments_site_field();

// Удалить имя пользователя администратора из CSS-классов в комментариях
function wpclean_disable_comments_username_admin_remove() {

	$options = get_option('wpclean_plugin_options_comments');
	$comments_username_admin_remove = esc_attr($options['wpclean_option_comments_username_admin_remove']);

	if($comments_username_admin_remove == '1'){

		add_filter( 'comment_class' , function($classes){
			foreach( $classes as $key => $class ) {
				if(strstr($class, "comment-author-")) {
					unset( $classes[$key] );
				}
			}
			return $classes;
		});
		
	}
}

$wpclean_disable_comments_username_admin_remove = 'wpclean_disable_comments_username_admin_remove';
$wpclean_disable_comments_username_admin_remove();

// // Удалить ссылки ?replytocom в комментариях
function wpclean_disable_comments_replytocom() {

	$options = get_option('wpclean_plugin_options_comments');
	$comments_replytocom = esc_attr($options['wpclean_option_comments_replytocom']);

	if($comments_replytocom == '1'){

		// Connect script wp-includes/js/comment-reply.js
		if(is_singular() && comments_open() && get_option('thread_comments')){
			wp_enqueue_script('comment-reply');
		}

		add_filter('comment_reply_link', function($replytocom_remove){
			$cut = "!<a(.*?)href='(.*?)'(.*?)>(.*?)</a>!si";
			$insert = "<span class='comment-reply-link' \\3>\\4</span>";
			return preg_replace($cut, $insert, $replytocom_remove);
		});
		
	}
}

$wpclean_disable_comments_replytocom = 'wpclean_disable_comments_replytocom';
$wpclean_disable_comments_replytocom();

// Запретить HTML-код в комментариях
function wpclean_disable_comments_specialchars() {

	$options = get_option('wpclean_plugin_options_comments');
	$comments_specialchars = esc_attr($options['wpclean_option_comments_specialchars']);

	if($comments_specialchars == '1'){

		add_filter('pre_comment_content', 'wp_specialchars');
		
	}
}

$wpclean_disable_comments_specialchars = 'wpclean_disable_comments_specialchars';
$wpclean_disable_comments_specialchars();

// Удалить ссылку на автора комментария
function wpclean_comments_remove_author_links() {

	$options = get_option('wpclean_plugin_options_comments');
	$comments_remove_author_links = esc_attr($options['wpclean_option_comments_remove_author_links']);

	if($comments_remove_author_links == '1'){
		add_filter('get_comment_author_link', function($return, $author, $comment_ID){
			return $author;
		}, 10, 3 );	
	}
}

$wpclean_comments_remove_author_links = 'wpclean_comments_remove_author_links';
$wpclean_comments_remove_author_links();

?>