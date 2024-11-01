<?php

function wpclean_template_attachments(){

	// Получаем список всех опций плагина
	// $options = get_option('wpclean_plugin_options_attachments');
	// echo '<pre>';
	// print_r($options);
	// echo '</pre>';

?>

	<div class="wrap-plugin">

		<form action="options.php" method="POST" class="wpclean-form">

			<?php settings_fields('wpclean_group_attachments'); ?> <!-- для вывода скрытых полей страницы настроек -->
			<?php do_settings_sections('wpclean_dashboard_section_attachments'); ?> <!-- эта функция непосредственно выводит секции и поля настроек -->

			<!-- Кнопка для сохранения изменений -->
			<div class="wpclean-sumbit-update">
				<?php submit_button('Сохранить изменения'); ?> <!-- функция для вывода кнопки сохранения -->
			</div>

		</form>

	</div>

<?php

}

?>