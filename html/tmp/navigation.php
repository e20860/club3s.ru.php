    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <img class="img-logo" src="img/3star3.png" alt="logo">&nbsp&nbsp
      <a class="navbar-brand" href="#">Клуб *Три*Звезды*</a>;
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Главная <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Для всех</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="statut.php">Устав клуба</a>
              <a class="dropdown-item" href="#">Кодекс чести офицера</a>
              <a class="dropdown-item" href="blog.php">Блог клуба</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <?php
               if(isset($_SESSION['user_id'])) {
                  $curenable_class = '';
                } else {
                   $curenable_class = 'disabled';
                }
                echo '<a class="nav-link dropdown-toggle ' . $curenable_class .'" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Для членов клуба</a>';
             ?>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="#">Архив заседаний</a>
              <a class="dropdown-item" href="#">Обсуждаемые вопросы</a>
              <a class="dropdown-item" href="#">Курилка клуба</a>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">Контакты</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST">
          <?php
             if(isset($_SESSION['user_id'])) {
                echo '<a class="nav-link" href="#">' . $_SESSION['user_name'] . ' <span class="sr-only">(current)</span></a>';
              } else {
               echo '<a class="nav-link" href="signin.php">Войти <span class="sr-only">(current)</span></a>';
               //echo '<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Войти</button>';     
              }                   
          ?>
          
        </form>
      </div>
    </nav>
