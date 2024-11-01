<?php

// Отключить поиск на сайте
function wpclean_search_disable_on_site() {

	$options = get_option('wpclean_plugin_options_search');
	$search_disable_on_site = esc_attr($options['wpclean_option_search_disable_on_site']);

	if($search_disable_on_site == '1'){

		add_action('parse_query', function($query, $error = true){
			if(is_search()){
				$query->is_search = false;
				$query->query_vars[s] = false;
				$query->query[s] = false;

				if($error == true ){
					$query->is_404 = true;
				}
			}	
		});

		add_filter('get_search_form', create_function('$a', "return null;"));

	}

}

$wpclean_search_disable_on_site = 'wpclean_search_disable_on_site';
$wpclean_search_disable_on_site();

// Исключить страницы из результатов поиска
function wpclean_search_excluded_pages() {

	$options = get_option('wpclean_plugin_options_search');
	$search_excluded_pages = esc_attr($options['wpclean_option_search_excluded_pages']);

	if($search_excluded_pages == '1'){

		add_filter( 'pre_get_posts', function($query){
			if($query->is_search) {
				$query->set('post_type', 'post');
			}
			return $query;
		});
	}

}

$wpclean_search_excluded_pages = 'wpclean_search_excluded_pages';
$wpclean_search_excluded_pages();

?>