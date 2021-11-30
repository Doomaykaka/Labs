<?php

	/* Задаём общие настройки выполнения серверных скриптов */

	# Режим работы
	set_time_limit (10);
	error_reporting (E_ALL);
	ignore_user_abort (false);

	# Пути
	$dir = '.'; 
	#$www = 'http://localhost/lab-3/';

	# SMARTY
	require_once $dir . '/smarty/Smarty.class.php';
	$smarty = new Smarty();

	$smarty -> setTemplateDir($dir . '/tpls');
	$smarty -> setConfigDir($dir . '/tpls/configs');
	$smarty -> setCompileDir($dir . '/tpls/compile');
	$smarty -> setCacheDir($dir . '/tpls/cache');

//	$smarty -> assign ('www', $www);