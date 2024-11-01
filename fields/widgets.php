<?php

/**
 * Регистрируем функции для вывода полей формы
**/

// Отключить редактор блоков Gutenberg на странице виджетов
function wpclean_html_widgets_disable_gutenberg_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_disable_gutenberg';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Редактор Gutenberg будет отключен и вместо него будет отображаться стандартная страница для управления виджетами.</p>';
}

// Виджет - «Архивы»
function wpclean_html_widgets_archives_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_archives';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Архивы» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Календарь»
function wpclean_html_widgets_calendar_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_calendar';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Календарь» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Рубрики»
function wpclean_html_widgets_categories_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_categories';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Рубрики» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Мета»
function wpclean_html_widgets_meta_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_meta';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Мета» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Страницы»
function wpclean_html_widgets_pages_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_pages';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Страницы» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Свежие комментарии»
function wpclean_html_widgets_recent_comments_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_recent_comments';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Свежие комментарии» будет удален со стандартной страницы виджетов.</p><p>Также будут удалены css-стили (.recentcomments) этого виджета.</p>';
}

// Виджет - «Свежие записи»
function wpclean_html_widgets_recent_posts_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_recent_posts';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Свежие записи» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «RSS»
function wpclean_html_widgets_rss_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_rss';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «RSS» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Поиск»
function wpclean_html_widgets_search_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_search';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Поиск» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Облако меток»
function wpclean_html_widgets_tag_cloud_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_tag_cloud';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Облако меток» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Текст»
function wpclean_html_widgets_text_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_text';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Текст» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Произвольное меню»
function wpclean_html_widgets_nav_menu_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_nav_menu';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Произвольное меню» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «HTML-код»
function wpclean_html_widgets_custom_html_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_custom_html';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «HTML-код» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Аудио»
function wpclean_html_widgets_media_audio_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_media_audio';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Аудио» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Видео»
function wpclean_html_widgets_media_video_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_media_video';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Видео» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Галерея»
function wpclean_html_widgets_media_galery_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_media_galery';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Галерея» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Изображение»
function wpclean_html_widgets_media_image_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_media_image';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Изображение» будет удален со стандартной страницы виджетов.</p>';
}

// Виджет - «Блок»
function wpclean_html_widgets_block_cb(){

	$name_options = 'wpclean_plugin_options_widgets';
	$get_options = get_option($name_options);
	$name_field = 'wpclean_option_widgets_block';
	$checked = checked('1', esc_attr($get_options[$name_field]), false);

	echo '<input type="checkbox"
				 name="'.$name_options.'['.$name_field.']"
			 	 id="'.$name_field.'"
			 	 value="1" '.$checked.'/>';

	echo '<p>Виджет «Блок» будет удален со стандартной страницы виджетов.</p>';
}







?>