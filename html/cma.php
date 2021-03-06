<?php
// Этот файл представляет rодекс чести российского офицера
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
     <p class="h1">Архив заседаний клуба *Три*Звезды*</p>
     <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Год</th>
            <th scope="col">Дата заседания</th>
            <th scope="col">Место заседания</th>
            <th scope="col">Принятые решения</th>
            <th scope="col">Фотогалерея</th>
          </tr>
        </thead>
        <tbody>
        <?php
          // Получение данных из базы
         // Запрос данных
      	$q = "SELECT cma_id, cma_year, cma_date, place, description, (SELECT COUNT(*) FROM cma_gallery WHERE cma_gallery.cma_id = club_meets_arc.cma_id) num_photo, (SELECT COUNT(*) FROM cma_decisions WHERE cma_decisions.cma_id = club_meets_arc.cma_id) num_docs FROM club_meets_arc";		
      	$r = mysqli_query($dbc, $q);
      	if (mysqli_num_rows($r) > 0) { // было выполнено сравнение
      	    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
               $c1 = '<tr> <th scope="row">' . $row['cma_year'] . '</th> <td> '. $row['cma_date'] .'</td>';
               $c2 = '<td>' . $row['place'] .'</td>';
               $c3 = '<td>' . (($row['num_docs'] == 0) ? 'не принимались' : ('<a href="view_docs.php?cma=' .$row['cma_id'] .'"> посмотреть...</a>')) . '</td>';
               $c4 = '<td>' . (($row['num_photo'] == 0) ? 'нет фото' : ('<a href="gal.php?gal=' .$row['cma_id'] .'"> посмотреть...</a>')) . '</td>';
               echo $c1 . $c2 . $c3 . $c4;              
      	    }
            } else {
              exit("Нет связи с базой данных");
            }
        ?>
        </tbody>
      </table>
  </div>   
  <?php 
   /* КОНЕЦ КОНТЕНТА СТРАНИЦЫ! */
   // Подключение файла футера, завершающего шаблон
   include('./include/footer.html');
 ?>