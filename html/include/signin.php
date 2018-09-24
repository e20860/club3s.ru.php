<?php
   // Подключение файла конфигурации перед выполнением кода PHP для контроля сообщений об ошибках
   require('./include/config.inc.php');
   // Подключаем базу данных 
    require(MYSQL);
   // Включение файла заголовка
   $page_title = 'Вход в систему';
   include('./include/header.html');
   
   // Массив, предназначенный для хранения сообщений об ошибках
   $login_errors = array();
   
   // Подключение навигационной панели
   include('./include/navigation.php');

   // Обработка передачи данных формы в запросе POST
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Проверка адреса электронной почты
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      	$e = escape_data($_POST['email'], $dbc);
       } else {
      	$login_errors['email'] = 'Введите корректный адрес электронной почты!';
       }
      // Проверка пароля
       if (!empty($_POST['pass'])) {
      	$p = $_POST['pass'];
       }  else {
      	$login_errors['pass'] = 'Пожалуйста, введите пароль!';
      }
      // Проверки прошли, продолжаем...
      if (empty($login_errors)) { // OK для обработки!
      
      	// Запрос базы данных
      	$q = "SELECT id, username, type, pass, IF(date_expires >= NOW(), true, false) AS expired FROM users WHERE email='$e'";		
      	$r = mysqli_query($dbc, $q);
      
      	if (mysqli_num_rows($r) === 1) { // было выполнено сравнение
      
      		// Получение данных
      		$row = mysqli_fetch_array($r, MYSQLI_ASSOC); 
      		
      		// Проверка пароля
      		if (password_verify($p, $row['pass'])) { // корректно
      			// Если пользователь является администратором, безопаснее создать новый идентификатор сеанса
      			if ($row['type'] === 'admin') {
      				session_regenerate_id(true);
      				$_SESSION['user_admin'] = true;
      			}
      			// Сохранение данных в сеансе
      			$_SESSION['user_id'] = $row['id'];
      			$_SESSION['username'] = $row['username'];
      			// Показывает, что срок действия учетной записи пользователя не истек
      			if ($row['expired'] === 1) $_SESSION['user_not_expired'] = true;
      		} else { // корректный адрес электронной почты, неверный пароль
      			$login_errors['login'] = 'Адрес электронной почты и пароль не соответствуют адресу и паролю, которые хранятся в файле.';
      		}
      	
      	} else { // Сравнение не выполнено (технически неверен только адрес электронной почты)
      		$login_errors['login'] = 'Адрес электронной почты соответствуют адресу, который хранится в базе данных.';
      	}
      	
      } // Конец $login_errors IF.
      
   } //if ($_SERVER['REQUEST_METHOD'] === 'POST')
?>
   <main role="main" class="container">
    <form class="form-signin">
      <img class="mb-4" src="../img/3star3.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Представьтесь</h1>
      <label for="inputEmail" class="sr-only">Ваш Email</label>
      <input type="email" id="email" class="form-control" placeholder="Введите Email" required autofocus>
      <label for="inputPassword" class="sr-only">Ваш пароль</label>
      <input type="password" id="pass" class="form-control" placeholder="Ввелите пароль" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Запомнить меня
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
   </main>