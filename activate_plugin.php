<?php

// Действия при активациия плагина
function wpclean_activate(){

	// Записываем событие в лог
	$date_activation = '['. date('Y-m-d H:i:s').']';
	error_log($date_activation.' Плагин активирован', 3, dirname(__FILE__).'/wpclean_errors_logs.log');

}

?>