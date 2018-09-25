<?php
// Этот файл представляет контактную информацию Клуба
// Версия: 2.0
// Использован фреймворк Bootstrap 4.1.3
//************************************************************

   // Подключение файла конфигурации перед выполнением кода PHP для контроля сообщений об ошибках
   require('./include/config.inc.php');
   // Файл конфигурации также запускает сеанс

   // Подключаем базу данных 
    require(MYSQL);
   // Поключение файла заголовка:
   include('./include/header.html');
   // Подключение навигационной панели
   include('./include/navigation.php');
   
   /* ДАЛЬШЕ - КОНТЕНТ СТРАНИЦЫ! */
?>
  <div class="container">
    <div class="container">   
       <div class="row">
          <div class="col-sm-2">    
             <figure id="pic3page" >
             <img src="img/contact.png" alt="club logo"  class="rounded float-left">
             </figure>
          </div>
          <div class="col-sm-10">    
             <p class="h1">Контактная информация</p>
             <p class=" h2">для связи с руководством Клуба</p>
           </div>
        </div>
     </div>
    <hr>
   <div class="card-deck">
   <?php
   $q = 'SELECT cnt_name, cnt_img, cnt_descr, cnt_ord, cnt_phone, cnt_email FROM `contacts` WHERE cnt_actual ORDER BY cnt_ord';
   $r = mysqli_query($dbc,$q);
   while($row = mysqli_fetch_assoc($r)) { 
      $c1 = '<div class="card border-secondary">';
      $c2 = '<img class="card-img-top" src="' . $row['cnt_img'] . '" alt="Picture">';
      $c3 = '<div class="card-body">';
      $c4 = '<h5 class="card-title">' . $row['cnt_name'] . '</h5>';
      $c5 = '<p class="card-text">' . $row['cnt_descr'] . '</p>';
      $c6 = '<ul class="list-group list-group-flush">';
      $c7 = '<li class="list-group-item">'. $row['cnt_phone'] .'</li>';
      $c8 = '<li class="list-group-item">email: <a href="mailto:'. $row['cnt_email'] . '?subject= Вопрос по деятельности клуба">'. $row['cnt_email'] . '</a></li>';
      $c9 = '</div></div>';
      echo $c1 . $c2 . $c3 . $c4 . $c5 . $c6 . $c7 . $c8 .$c9;      
   }
    /* Шаблон карточки
     <div class="card border-secondary">
       <img class="card-img-top" src="img/4_01.jpg" alt="Chairman">
       <div class="card-body">
         <h5 class="card-title">Председатель правления</h5>
         <p class="card-text">Описание контактной информации</p>
         <ul class="list-group list-group-flush">
             <li class="list-group-item">+7(383) 241-06-10</li>
             <li class="list-group-item">email: <a href="mailto:chairman@club3s.ru?subject= Вопрос по деятельности клуба">chairman@club3s.ru</a></li>
         </ul>
         <p class="card-text"><small class="text-muted">звонать с 9.00 до 18.00</small></p>
       </div>
     </div>
     */
   ?>
     
     
   </div>  
   </div>
 <?php 
   /* КОНЕЦ КОНТЕНТА СТРАНИЦЫ! */
   // Подключение файла футера, завершающего шаблон
   include('./include/footer.html');
 ?>