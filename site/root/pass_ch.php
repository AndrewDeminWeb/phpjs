<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
  <link rel="shortcut icon" href="/images/settings.ico" type="image/x-icon">
    <meta charset="utf-8">
    <title>Смена пароля</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link href="css/bootstrap.min.css" rel="stylesheet">
       <link href="css/css_auth_reg.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  <video autoplay loop muted class="bgvideo" id="bgvideo">
   <source src="bgvideo.mp4" type="video/mp4"></source>
  </video>
  <?php
  error_reporting(0);

   if ($_COOKIE["user_id"] > -1)
    {
		echo '
		<header>
<ul class="menu-main">
  <li><a href="/index.php">Главная</a></li>
  <li><a href="/aboutme.php">Обо мне</a></li>
  <li><a href="/feedback.php">Feedback</a></li>
   <li><a href="pass_ch.php" class="current">Изменить пароль
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
    <div style="margin-right: 48px;">
          <form action="index.php" method="post" enctype="multipart/form-data">
          <p><input type="submit" value="🠔 Вернуться на главную страницу" name="submit" class="registerbtn_goindex"></p>
          </form>
       

        </div>
      <center><div class="container" style="float: center;">
    	<form action="pass_ch_1.php" method="POST" enctype="multipart/form-data">
    		<label><b>Введите старый пароль</b></label>
			<br>
    		<input name=pass class="inptext" onkeyup="checkParams()">
			<br>
    			<label><b>Введите новый пароль</b></label>
				<br>
    			<input name=npass class="inptext" onkeyup="checkParams()">
				<br>
            	<input type="submit" value="Изменить пароль" name="submit" class="registerbtn" style="margin-top: 25px;">
        </form>
    </div></center>

	';
	}
?>
<?php
   if ($_COOKIE["user_id"] < -1)
    {
		echo '
	  <header>
<ul class="menu-main">
  <li><a href="/index.php">Главная</a></li>
  <li><a href="/aboutme.php">Обо мне</a></li>
   <li><a href="/feedback.php">Feedback</a></li>
   <li><a href="/auth.php">Войти
			<form action="auth.php" method="post" enctype="multipart/form-data">
      </form></a></li>
	    <li><a href="reg.php">Зарегистрироваться
			<form action="reg.php" method="post" enctype="multipart/form-data">
      </form></a></li>
</ul>
	</header> 
  <br>
  <br>
  <center><h1>Вы не авторизированы! Сначала <a href="/reg.php">зарегистрируйтесь</a> или <a href="/auth.php">войдите</a>.</h1></center>
		
		';
    }
    ?>

</body>
</html>
