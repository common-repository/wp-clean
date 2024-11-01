<?php

// Формат RSS2
function wpclean_disable_rss_do_feed_rss2() {

	$options = get_option('wpclean_plugin_options_rss');
	$rss_do_feed_rss2 = esc_attr($options['wpclean_option_rss_do_feed_rss2']);

	if($rss_do_feed_rss2 == '1'){
		
		add_action('do_feed', function(){
			wp_redirect(get_option('siteurl'));
			// wp_redirect(home_url(), 301);
		}, 1);

		add_action('do_feed_rss', function(){
			wp_redirect(get_option('siteurl'));
		}, 1);

		add_action('do_feed_rss2', function(){
			wp_redirect(get_option('siteurl'));
		}, 1);

		add_action('do_feed_rss2_comments', function(){
			wp_redirect(get_option('siteurl'));
		}, 1);

	}
}

$wpclean_disable_rss_do_feed_rss2 = 'wpclean_disable_rss_do_feed_rss2';
$wpclean_disable_rss_do_feed_rss2();

// Формат Atom
function wpclean_disable_rss_do_feed_atom() {

	$options = get_option('wpclean_plugin_options_rss');
	$rss_do_feed_atom = esc_attr($options['wpclean_option_rss_do_feed_atom']);

	if($rss_do_feed_atom == '1'){

		add_action('do_feed_atom', function(){
			wp_redirect(get_option('siteurl'));
		}, 1);

		add_action('do_feed_atom_comments', function(){
			wp_redirect(get_option('siteurl'));
		}, 1);

	}
}

$wpclean_disable_rss_do_feed_atom = 'wpclean_disable_rss_do_feed_atom';
$wpclean_disable_rss_do_feed_atom();

// Формат Atom
function wpclean_disable_rss_do_feed_rdf() {

	$options = get_option('wpclean_plugin_options_rss');
	$rss_do_feed_rdf = esc_attr($options['wpclean_option_rss_do_feed_rdf']);

	if($rss_do_feed_rdf == '1'){
		add_action('do_feed_rdf', function(){
			wp_redirect(get_option('siteurl'));
		}, 1);
	}

}

$wpclean_disable_rss_do_feed_rdf = 'wpclean_disable_rss_do_feed_rdf';
$wpclean_disable_rss_do_feed_rdf();

// Удалить ссылки на дополнительные RSS-ленты сайта
function wpclean_disable_rss_feed_links_extra() {

	$options = get_option('wpclean_plugin_options_rss');
	$rss_feed_links_extra = esc_attr($options['wpclean_option_rss_feed_links_extra']);

	if($rss_feed_links_extra == '1'){
		remove_action('wp_head', 'feed_links_extra', 3 );
	}

}

$wpclean_disable_rss_feed_links_extra = 'wpclean_disable_rss_feed_links_extra';
$wpclean_disable_rss_feed_links_extra();

// Удалить ссылки на основные RSS-ленты сайта
function wpclean_disable_rss_feed_links() {

	$options = get_option('wpclean_plugin_options_rss');
	$rss_feed_links = esc_attr($options['wpclean_option_rss_feed_links']);

	if($rss_feed_links == '1'){
		remove_action('wp_head', 'feed_links', 2 );
	}

}

$wpclean_disable_rss_feed_links = 'wpclean_disable_rss_feed_links';
$wpclean_disable_rss_feed_links();

?>