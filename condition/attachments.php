<?php

// Удалять все вложения вместе с записью
function wpclean_disable_attachments_delete_files_posts() {

	$options = get_option('wpclean_plugin_options_attachments');
	$attachments_delete_files_posts = esc_attr($options['wpclean_option_attachments_delete_files_posts']);

	if($attachments_delete_files_posts == '1'){
		add_action('before_delete_post', function( $id ) {
			$attachments = get_attached_media('', $id);
			foreach ($attachments as $attachment ) {
				wp_delete_attachment($attachment->ID, 'true');
			}
		});
	}
}

$wpclean_disable_attachments_delete_files_posts = 'wpclean_disable_attachments_delete_files_posts';
$wpclean_disable_attachments_delete_files_posts();

// Удалить страницы вложений
function wpclean_disable_delete_pages_attachments() {

	$options = get_option('wpclean_plugin_options_attachments');
	$attachments_delete_files_posts = esc_attr($options['wpclean_option_attachments_delete_pages_attachments']);

	if($attachments_delete_files_posts == '1'){
		add_action('template_redirect', function(){
			if(is_attachment()){
				global $post;
				if ($post && $post->post_parent){
					wp_redirect( esc_url( get_permalink( $post->post_parent ) ), 301 );
					exit;
				}else{
					wp_redirect( esc_url( home_url( '/' ) ), 301 );
					exit;
				}
			}
		});
	}
}

$wpclean_disable_delete_pages_attachments = 'wpclean_disable_delete_pages_attachments';
$wpclean_disable_delete_pages_attachments();

?>