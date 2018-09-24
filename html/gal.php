<?php
// Этот файл представляет галерею фотографий клуба *Три*Звезды*
// доступен со страницы cma.php
// Параметры определяются супермассивом $_GET
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
    <script type="text/javascript"  src="js/jquery_3_2_1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
        <?php
         // Получение информации о заседании: когда  и где происходило, обсуждаемые вопросы 
         if(!$_GET['gal']) {
            exit('Получение данных невозможно');
         }
         $cur_id = (int) $_GET['gal'];
         if($cur_id ==0) {
            exit('Неверные параметры');
         }

         // Запрос данных
      	$q = "SELECT cma_date, place, description, (SELECT COUNT(*) FROM cma_decisions WHERE cma_decisions.cma_id = club_meets_arc.cma_id) num_docs FROM club_meets_arc WHERE cma_id = '$cur_id'";		
      	$r = mysqli_query($dbc, $q);

      	if (mysqli_num_rows($r) > 0) { // было выполнено сравнение
            $row = mysqli_fetch_assoc($r);
            
            $adate = date_parse($row['cma_date']);
            $cur_date =''. $adate['day'] .'.' . $adate['month'] . '.' . $adate['year'] ;
            
            $c1 = ' <p class=" h1 jumbotron-heading">Заседание '  . $cur_date . ' г.</p>';
            $c2 = ' <p class="lead text-muted"> Место проведения: '. $row['place'] . '; '.  $row['description'] .'</p>';
            // в случае принятия документов - вывести кнопку для ознакомления с ними
            $c3 = '<p>Документов нет</p>';
             if($row['num_docs']) {
                $c3 = '<p> <a href="view_docs.php?cma='. $cur_id . '" class="btn btn-primary my-2">Посмотреть документы</a> </p>'; 
             }
             echo $c1 . $c2 . $c3;
          }
     
        ?>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
         <div class="gallery">
          <div class="row">
          
          <?php
             $q = "SELECT img_descr, img_path FROM cma_gallery WHERE cma_id = '$cur_id' ";
             $r = mysqli_query($dbc,$q);
             while($row = mysqli_fetch_assoc($r)) { 
                $c1 = '<div class="col-md-4"><div class="card mb-4 shadow-sm">';
                $c2 = '<a href="'. $row['img_path'] .'" class="fancybox card-img-top" rel="gallery" title=""><img src="' . $row['img_path'] . '" /></a>';  
                $c3 = '<div class="card-body"><p class="card-text">'. $row['img_descr'] .'</p></div></div></div>';
                echo $c1 . $c2 . $c3;    
            }
         /* Шаблон для  вывода карточки с фотографией            
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="img/gal2014/2014_09.jpg" class="fancybox card-img-top" rel="gallery" title=""><img src="img/gal2014/2014_09.jpg" /></a>
                <div class="card-body">
                  <p class="card-text">рабочие моменты заседания</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
                  */   
         ?>   
          </div>
        </div>  
        </div>
      </div>

    </main>
   
   <script type="text/javascript">
   <!--
      $(document).ready(function(){
         $("a.fancybox").fancybox({
         transitionIn: 'elastic',
         transitionOut: 'elastic',
         speedIn: 500,
         speedOut: 500,
         hideOnOverlayClick: false,
         titlePosition: 'over'
         });
      });      
   // -->
   </script>
    
  </body>
</html>
