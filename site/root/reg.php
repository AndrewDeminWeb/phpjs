<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
  <link rel="shortcut icon" href="/images/reg.ico" type="image/x-icon">
    <meta charset="utf-8">
    <title>Регистрация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/css_auth_reg.css" rel="stylesheet">   
    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
  <body>
   <video autoplay loop muted class="bgvideo" id="bgvideo">
   <source src="bgvideo.mp4" type="video/mp4"></source>
  </video>
  <?php
error_reporting(0);
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
	    <li><a href="reg.php" class="current">Зарегистрироваться
			<form action="reg.php" method="post" enctype="multipart/form-data">
      </form></a></li>
</ul>
	</header>
          <div style="margin-right: 48px;">
          <form action="index.php" method="post" enctype="multipart/form-data">
          <p><input type="submit" value="🠔 Вернуться на главную страницу" name="submit" class="registerbtn_goindex"></p>
          </form>
       

        </div>
    

    <center><div class="container" style="float: center;">
    	<form action="reg_1.php" method="POST" enctype="multipart/form-data">
    		<label for="name"><b>Введите имя</b></label>
			<br>
    		<input name=f_name class="inptext" onkeyup="checkParams()" required>
			<br>
    			<label for="l_name"><b>Введите фамилию</b></label>
				<br>
    			<input name=l_name class="inptext" onkeyup="checkParams()" required>
				<br>
    				<label for="login"><b>Введите логин</b></label>
					<br>
    				<input name=login class="inptext" onkeyup="checkParams()" required>
					<br>
      				<label name="pass"><b>Введите пароль</b></label>
					<br>
      				<input name=pass class="inptext" onkeyup="checkParams()" required>
					<br>
            	<input type="submit" value="Зарегистрироваться" name="submit" class="registerbtn" style="margin-top: 25px;">
        </form>
    </div></center>
';
	}
?>
<?php
   if ($_COOKIE["user_id"] > -1)
    {
		echo '
		<header>
<ul class="menu-main">
  <li><a href="/index.php">Главная</a></li>
  <li><a href="aboutme.php">Обо мне</a></li>
  <li><a href="/feedback.php">Feedback</a></li>
   <li><a href="pass_ch.php">Изменить пароль
  <form action="pass_ch.php" method="post" enctype="multipart/form-data">
      </form>
  </a></li>
      <li><a href="/profile.php">Профиль</a></li>
  <li><a href="exit.php">Выйти
  <form action="exit.php" method="post" enctype="multipart/form-data">
      </form>
  </a></li>
  </a></li>
  </ul>
  </header>
	<br>
	<br>
	<center><h1>Вы уже зарегистрированы как '.$_COOKIE["name"].'!</h1></center>
		';
	}
?>
</body>
</html>