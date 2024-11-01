<?php

// Действия при деактивации плагина
function wpclean_deactivate(){

	// Записываем событие в лог
	$date_deactivation = '['. date('Y-m-d H:i:s').']';
	error_log($date_deactivation.' Плагин деактивирован', 3, dirname(__FILE__).'/wpclean_errors_logs.log');
}

?>