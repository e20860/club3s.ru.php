<?php
// Этот файл представляет блог клуба *ТРИ*ЗВЕЗДЫ*
// Использован фреймворк Bootstrap 4.1.3
//************************************************************

   // Подключение файла конфигурации перед выполнением кода PHP для контроля сообщений об ошибках
   require('./include/config.inc.php');

   // Подключаем базу данных 
    require(MYSQL);
   
   // Поключение файла заголовка:
   include('./include/header.html');
   
   // Подключение навигационной панели
   include('./include/navigation.php');
   
   /* ДАЛЬШЕ - КОНТЕНТ СТРАНИЦЫ! */
?>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-3 pt-1">
            <a class="text-muted" href="#">Подписаться</a>
          </div>
          <div class="col-6 text-center">
            <a class="h1 " href="#">Блог клуба *Три*Звезды*</a>
          </div>
          <div class="col-3 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
            <!-- 
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
             -->  
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="#">Зарегистрироваться</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">Мир</a>
          <a class="p-2 text-muted" href="#">Россия</a>
          <a class="p-2 text-muted" href="#">Армия</a>
          <a class="p-2 text-muted" href="#">Насущное</a>
          <a class="p-2 text-muted" href="#">Не в тему</a>
        </nav>
      </div>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <p class="h1 display-4 font-italic">Заголовок самого важного поста</p>
          <p class="lead my-3">Несколько строк, информирующих о содержании статьи и рассказывающих о том, зачем её необходимо читать</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Продолжить...</a></p>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">Мир</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Типовая статья</a>
              </h3>
              <div class="mb-1 text-muted">12 сентября</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#">Продолжить...</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="img/fun/1.jpg" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">Армия</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Заголовок статьи</a>
              </h3>
              <div class="mb-1 text-muted">11 сентября</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#">Продолжить...</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="img/fun/2.jpg" alt="Card image cap">
          </div>
        </div>
      </div>
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom"> Горяченькое </h3>

          <div class="blog-post">
            <h2 class="blog-post-title">Образец статьи</h2>
            <p class="blog-post-meta">1 сентября 2018 г. <a href="#">Широкопетлев</a></p>
            <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
            <hr>
            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            <blockquote>
              <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </blockquote>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            <h2>Заголовок</h2>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            <h3>Подзаголовок</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <pre><code>Example code block</code></pre>
            <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
            <h3>Подзаголовок</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <ul>
              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
              <li>Donec id elit non mi porta gravida at eget metus.</li>
              <li>Nulla vitae elit libero, a pharetra augue.</li>
            </ul>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
            <ol>
              <li>Vestibulum id ligula porta felis euismod semper.</li>
              <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
              <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
            </ol>
            <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
          </div><!-- /.blog-post -->

          <div class="blog-post">
            <h2 class="blog-post-title">Другая статья</h2>
            <p class="blog-post-meta">12 сентября 2018 г. <a href="#">Широкопетлев</a></p>

            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            <blockquote>
              <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </blockquote>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          </div><!-- /.blog-post -->

          <div class="blog-post">
            <h2 class="blog-post-title">Новые возможности</h2>
            <p class="blog-post-meta">10 сентября 2018 г. <a href="#">Белоногов</a></p>

            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <ul>
              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
              <li>Donec id elit non mi porta gravida at eget metus.</li>
              <li>Nulla vitae elit libero, a pharetra augue.</li>
            </ul>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">О блоге</h4>
            <p class="mb-0">В блоге <em>клуб *Три*Звезды*</em> отражает события окружающего мира глазами членов клуба. Мы описываем события так как мы их видим, не претендуя на объективность...</p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Архивы</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#">2018 август</a></li>
              <li><a href="#">2018 июль</a></li>
              <li><a href="#">2018 июнь</a></li>
              <li><a href="#">2018 май</a></li>
              <li><a href="#">2018 апрель</a></li>
              <li><a href="#">2018 март</a></li>
              <li><a href="#">2018 февраль</a></li>
              <li><a href="#">2018 январь</a></li>
              <li><a href="#">2017 декабрь</a></li>
              <li><a href="#">2017 ноябрь</a></li>
              <li><a href="#">2017 октябрь</a></li>
              <li><a href="#">2017 сентябрь</a></li>
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Что-нибудь ещё</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </aside> <!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

 <?php 
   /* КОНЕЦ КОНТЕНТА СТРАНИЦЫ! */
   // Подключение файла футера, завершающего шаблон
   include('./include/footer.html');
 ?>