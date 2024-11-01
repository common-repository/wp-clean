<?php

// Закрыть страницы пагинации от индексации
function wpclean_pagination_noindex_pages() {

	$options = get_option('wpclean_plugin_options_pagination');
	$pagination_noindex_pages = esc_attr($options['wpclean_option_pagination_noindex_pages']);

	if($pagination_noindex_pages == '1'){
		add_action('wp_head', function(){
			if(is_paged()){
				echo "".'<meta name="robots" content="noindex,nofollow" />'."\n";
			}
		}, 3 );
	}
}

$wpclean_pagination_noindex_pages = 'wpclean_pagination_noindex_pages';
$wpclean_pagination_noindex_pages();

// Удалить заголовок блока постраничной навигации
function wpclean_pagination_remove_title_block() {

	$options = get_option('wpclean_plugin_options_pagination');
	$pagination_remove_title_block = esc_attr($options['wpclean_option_pagination_remove_title_block']);

	if($pagination_remove_title_block == '1'){
		add_filter('navigation_markup_template', function($template, $class){
			return '<nav class="navigation %1$s" role="navigation">
						<div class="nav-links">%3$s</div>
					</nav>';
		}, 10, 2);
	}
}

$wpclean_pagination_remove_title_block = 'wpclean_pagination_remove_title_block';
$wpclean_pagination_remove_title_block();


?>