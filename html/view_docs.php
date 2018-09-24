<?php
// Этот файл представляет список документов заседания Клуба
// Номер заседания - параметр GET
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
     <p class="h1">Документы клуба *Три*Звезды*</p>
     <?php
              // Получение информации о заседании
         if(!$_GET['cma']) {
            exit('Получение данных невозможно');
         }
         $cur_id = (int) $_GET['cma'];
         if($cur_id ==0) {
            exit('Неверные параметры');
         }

         // Запрос данных
      	$q = "SELECT cma_date, place FROM club_meets_arc WHERE cma_id = '$cur_id'";		
      	$r = mysqli_query($dbc, $q);

      	if (mysqli_num_rows($r) > 0) { // было выполнено сравнение
            $row = mysqli_fetch_assoc($r);
            $adate = date_parse($row['cma_date']);
            $cur_date =''. $adate['day'] .'.' . $adate['month'] . '.' . $adate['year'] ;

            echo '<p clas="h2"> принятые на заседании Клуба ' .$cur_date . '</p>';
          }
     ?>
     <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Номер решения</th>
            <th scope="col">Наименование </th>
            <th scope="col">Краткое содержание документа</th>
            <th scope="col">Ссылка на документ</th>
          </tr>
        </thead>
        <tbody>
        <?php
          // Получение данных из базы
         // Запрос данных
      	$q = "SELECT dcn_id, dcn_name, dcn_text, dcn_file FROM cma_decisions WHERE cma_id = '$cur_id'"; 		
      	$r = mysqli_query($dbc, $q);
      	if (mysqli_num_rows($r) > 0) { // было выполнено сравнение
      	    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
               $c1 = '<tr> <th scope="row">' . $row['dcn_id'] .'</th> ';
               $c2 = '<td> '. $row['dcn_name'] .'</td>';
               $c3 = '<td>' . $row['dcn_text'] .'</td>';
               $c4 = '<td>' . ((empty($row['dcn_file'])) ? 'нет файла' : ('<a href="' .$row['dcn_file'] .'"> посмотреть...</a>')) . '</td>';
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