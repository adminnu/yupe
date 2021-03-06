<?php
// подробнее про index.php http://www.yiiframework.ru/doc/guide/ru/basics.entry
date_default_timezone_set('Europe/Moscow');

// Выбираем конфигурацию development-main.php, если переменная окружения php_env установлена в development
// или совпадение домена на котором запущен проект
if (
	getenv('php_env') == 'development' ||
	strpos($_SERVER['SERVER_NAME'], 'localhost') !== false ||
	$_SERVER['SERVER_ADDR'] == '127.0.0.1'
) {
	// путь к фреймворку Yii
	$yii = dirname(__FILE__) . '/framework/yiilite.php';
	// путь к основному конфигурационному файлу Yii
	$config = dirname(__FILE__) . '/protected/config/main-development.php';

	defined('YII_DEBUG') or define('YII_DEBUG', true);
	defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
} else { //production считается во всех случаях, когда не выполнены условия
	// путь к фреймворку Yii
	$yii = dirname(__FILE__) . '/framework/yiilite.php';
	// путь к основному конфигурационному файлу Yii
	$config = dirname(__FILE__) . '/protected/config/main.php';
}

require_once($yii);
Yii::createWebApplication($config)->run();