<?php

function wpclean_template_search(){

	// Получаем список всех опций плагина
	// $options = get_option('wpclean_plugin_options_search');
	// echo '<pre>';
	// print_r($options);
	// echo '</pre>';

?>

	<div class="wrap-plugin">

		<form action="options.php" method="POST" class="wpclean-form">

			<?php settings_fields('wpclean_group_search'); ?> <!-- для вывода скрытых полей страницы настроек -->
			<?php do_settings_sections('wpclean_dashboard_section_search'); ?> <!-- эта функция непосредственно выводит секции и поля настроек -->

			<!-- Кнопка для сохранения изменений -->
			<div class="wpclean-sumbit-update">
				<?php submit_button('Сохранить изменения'); ?> <!-- функция для вывода кнопки сохранения -->
			</div>

		</form>

	</div>

<?php

}

?>