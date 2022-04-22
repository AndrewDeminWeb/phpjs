<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
  <link rel="shortcut icon" href="/images/feedback.ico" type="image/x-icon">
    <meta charset="utf-8">
    <title>Комментарии</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/cssindex.css" rel="stylesheet">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<style>
.borders{
	border: 4px black;
	display: block;
}
</style>
</head>
  <body>
   <video autoplay loop muted class="bgvideo" id="bgvideo">
   <source src="bgvideo.mp4" type="video/mp4"></source>
  </video>

<?php
error_reporting(0);
    if ($_COOKIE["user_id"] < -1)
    {
      echo '<header>
<ul class="menu-main">
  <li><a href="/index.php">Главная</a></li>
  <li><a href="aboutme.php">Обо мне</a></li>
  <li><a href="/feedback.php" class="current">Feedback</a></li>
   <li><a href="/auth.php">Войти
			<form action="auth.php" method="post" enctype="multipart/form-data">
      </form></a></li>
   <li><a href="/reg.php">Зарегистрироваться
      <form action="reg.php" method="post" enctype="multipart/form-data">      
      </form></a></li>
</ul>
	</header>
	<br>
  <div class="container borders">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">
                    Комментарии пользователей
                </h2>
            </div>
            <div class="col-lg-6">
                <div id="comment-field"></div>
            </div>
    
        </div>
    </div>
	';
    }
    ?>

      <div style="margin-right: 20px;">
			<?php
    if ($_COOKIE["user_id"] > -1)
    {
		echo ' <header>
<ul class="menu-main">
  <li><a href="/index.php">Главная</a></li>
  <li><a href="aboutme.php">Обо мне</a></li>
  <li><a href="/feedback.php" class="current">Feedback</a></li>
   <li><a href="pass_ch.php">Изменить пароль
  <form action="pass_ch.php" method="post" enctype="multipart/form-data">
      </form>
  </a></li>
   <li><a href="/profile.php">Профиль</a></li>
  <li><a href="exit.php">Выйти
  <form action="exit.php" method="post" enctype="multipart/form-data">
      </form>
  </a></li>
  </ul>
  </header>
  <br>
  <div class="container borders">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">
                    Комментарии пользователей
		
                </h2>
				<br>
            </div>
		
            <div class="col-lg-6">
			
                <div id="comment-field">
						
				</div>
			
            </div>
            <div class="col-lg-6">
                    <form>
                            <div class="form-group">
                              <label for="comment-name">Имя пользователя:</label>
                              <input type="email" class="form-control" value='.$_COOKIE["name"].' id="comment-name"  placeholder="Ваше имя" title="Ваше имя" disabled>
                            </div>
                            <div class="form-group">
                              <label for="comment-body">Ваш комментарий:</label>
                              <textarea type="password" class="form-control" id="comment-body" placeholder="Комментарий..." required></textarea>
                            </div>
                            <div class="form-group form-check text-right">
                                    <button type="submit" id="comment-add" class="btn btn-primary">Отправить</button>
                            </div>
                          </form>
            </div>
        </div>
    </div>
  
  ';
   
	 
    }
    ?>
	  
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</body>
 </html>
