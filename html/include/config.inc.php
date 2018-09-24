﻿<?php

/**
	* Название: config.inc.php
	* Файл конфигурации для сайта club3s.ru
	* выполняет следующие действия:
	* - Собирает настройки сайта в одном месте.
	* - Хранит URL и URI в виде констант.
	* - Начинает сеанс.
	* - Задает порядок обработки ошибок.
	* - Определяет функцию перенаправления.
*/

// ********************************** //
// ************ НАСТРОЙКИ ************ //

// Развернут ли сайт в Интернете?
if (!defined('LIVE')) DEFINE('LIVE', false);

// Информация об ошибках отправлена по электронной почте
DEFINE('CONTACT_EMAIL', 'sey@club3s.ru');

// ************ НАСТРОЙКИ ************ //
// ********************************** //

// ********************************** //
// ************ КОНСТАНТЫ *********** //

// Идентификация местоположения файлов и URL-ссылки на сайт
define ('BASE_URI', '/home/eugenie/www/php.st/club3s.ru/');
define ('BASE_URL', 'localhost/');
define ('DOCS_DIR', BASE_URI . 'docs/'); 
define ('MYSQL', BASE_URI . 'mysql.inc.php');

$page_title  = 'Клуб *ТРИ*ЗВЕЗДЫ*';
// ************ КОНСТАНТЫ *********** //
// ********************************** //

// ********************************* //
// ************ СЕАНСЫ *********** //

// Запуск сеанса
session_start();

// ************ СЕАНСЫ *********** //
// ********************************* //

// ****************************************** //
// ************ УПРАВЛЕНИЕ ОШИБКАМИ ************ //

// Функция, применяемая для обработки ошибок
// Принимает пять аргументов: номер ошибки, сообщение об ошибке (строка), название файла с ошибкой (строка), 
// номер строки с ошибкой и переменные, существующие в данный момент времени (массив).
// Возвращает true
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

	// Создание сообщения об ошибке
	$message = "Ошибка произошла в сценарии '$e_file' в строке $e_line:\n$e_message\n";
	
	// Добавление обратной трассировки
	$message .= "<pre>" .print_r(debug_backtrace(), 1) . "</pre>\n";
	
	// Либо просто добавляется $e_vars в сообщение
	//	$message .= "<pre>" . print_r ($e_vars, 1) . "</pre>\n";

	if (!LIVE) { // отображение ошибки в окне браузера
	
		echo '<div class="alert alert-danger">' . nl2br($message) . '</div>';

	} else { // разработка (печать сообщения об ошибке)

		// Отправка сообщения об ошибке
		error_log ($message, 1, CONTACT_EMAIL, 'От:db_adm1@ecommerce1');
		
		// Вывод сообщения об ошибке в окне браузера
		if ($e_number != E_NOTICE) {
			echo '<div class="alert alert-danger">Произошла системная ошибка. Приносим свои извинения за возможные неудобства.</div>';
		}

	} // завершение $live IF-ELSE
	
	return true; // этот код PHP не пытается обрабатывать ошибку

} // завершение определения функции my_error_handler()

// Использование собственного обработчика ошибок
set_error_handler('my_error_handler');

// ************ УПРАВЛЕНИЕ ОШИБКАМИ ************ //
// ****************************************** //

// ******************************************* //
// ************ ФУНКЦИЯ ПЕРЕНАПРАВЛЕНИЯ ************ //

// Эта функция перенаправляет некорректных пользователей
// Она принимает два аргумента: 
// - проверяется элемент сеанса
// - местоположение, в которое перенаправляется пользователь 
function redirect_invalid_user($check = 'user_id', $destination = 'index.php', $protocol = 'http://') {
	
	// Проверка элемента сеанса
	if (!isset($_SESSION[$check])) {
		$url = $protocol . BASE_URL . $destination; // определение URL-ссылки
		header("Location: $url");
		exit(); // выход из сценария
	}
	
} // Завершение описания функции redirect_invalid_user()

// ************ ФУНКЦИЯ ПЕРЕНАПРАВЛЕНИЯ ************ //
// ******************************************* //

// Пропуск закрывающего тега PHP во избежание ошибок 'headers are sent'!