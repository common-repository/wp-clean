<?php

// Удалять все вложения вместе с записью
function wpclean_disable_images_srcset() {

	$options = get_option('wpclean_plugin_options_images');
	$images_disable_srcset = esc_attr($options['wpclean_option_images_disable_srcset']);

	if($images_disable_srcset == '1'){
		add_filter('wp_calculate_image_srcset_meta', '__return_null');
	}
}

$wpclean_disable_images_srcset = 'wpclean_disable_images_srcset';
$wpclean_disable_images_srcset();

// Разрешить WordPress загружать SVG файлы
function wpclean_images_allow_svg_upload() {

	$options = get_option('wpclean_plugin_options_images');
	$images_allow_svg_upload = esc_attr($options['wpclean_option_images_allow_svg_upload']);

	if($images_allow_svg_upload == '1'){
		add_filter('upload_mimes', function($mime_types){
			$mime_types['svg'] = 'image/svg+xml'; // поддержка SVG
			return $mime_types;
		}, 1, 1);
	}
}

$wpclean_images_allow_svg_upload = 'wpclean_images_allow_svg_upload';
$wpclean_images_allow_svg_upload();

?>