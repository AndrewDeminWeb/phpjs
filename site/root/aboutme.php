<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="/images/developer.ico" type="image/x-icon">
    <title>О разработчике</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" type="text/css" href="css/cssindex.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
	<style>
	.bg_text{
		border-radius: 15px 15px 15px 15px; 
		background-color: rgba(255, 255, 255, 0.9);
		padding: 10px;
		width: 30%;
	}
	#submit {
font-family: sans-serif;
color: #ffffff;
font-size: 18px;
padding: 0px;
text-decoration: none;
box-shadow: 0px 1px 3px #666666;
-webkit-box-shadow: 0px 1px 3px #666666;
-moz-box-shadow: 0px 1px 3px #666666;
text-shadow: 1px 1px 3px #666666;
background: -webkit-gradient(linear, 0 0, 0 100%, from(#ce1515), to(#8b0d0d));
background: -moz-linear-gradient(top, #ce1515, #8b0d0d);
}
 
#submit:hover {
 background: -webkit-gradient(linear, 0 0, 0 100%, from(#8b0d0d), to(#ce1515));
 background: -moz-linear-gradient(top, #8b0d0d, #ce1515)
}
#respond input[type=text], textarea {
 -webkit-transition: all 0.30s ease-in-out;
 -moz-transition: all 0.30s ease-in-out;
 -ms-transition: all 0.30s ease-in-out;
 -o-transition: all 0.30s ease-in-out;
 outline: none;
 padding: 3px 0px 3px 3px;
 margin: 5px 1px 3px 0px;
 border: 1px solid #DDDDDD;
}
#respond input[type=text]:focus, textarea:focus {
 box-shadow: 0 0 5px rgba(81, 203, 238, 1);
 margin: 5px 1px 3px 0px;
 border: 1px solid rgba(81, 203, 238, 1);
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
		echo '
  <header>
<ul class="menu-main">
  <li><a href="/index.php">Главная</a></li>
  <li><a href="aboutme.php" class="current">Обо мне</a></li>
<li><a href="/feedback.php">Feedback</a></li>
   <li><a href="/auth.php">Войти
			<form action="auth.php" method="post" enctype="multipart/form-data">
      </form></a></li>
   <li><a href="/reg.php">Зарегистрироваться
      <form action="reg.php" method="post" enctype="multipart/form-data">      
      </form></a></li>
</ul>
	</header>
	<br>
	<br>
<center><div class="bg_text">
  <div style="width: 80%; font-size: 14pt;">
<p><b>Я - Демин Андрей из группы 4ПКС-216.</b></p>
<p><b> Оканчиваю обучение в колледже Информатики и Программирования (КИП). </b></p>
<p><b>Также являюсь разработчиком этого интернет-каталога, который носит название «Мои JavaScript игры».</b></p>
</div>
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
  <li><a href="aboutme.php" class="current">Обо мне</a></li>
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

  </ul>
  </header>
  <br>
  <br>
  <center><div class="bg_text">
  <div style="width: 80%; font-size: 14pt;">
<p><b>Я - Демин Андрей из группы 4ПКС-216.</b></p>
<p><b>Оканчиваю обучение в колледже Информатики и Программирования (КИП). </b></p>
<p><b>Также являюсь разработчиком этого интернет-каталога, который носит название «Мои JavaScript игры».</b></p>
</div>
</div>
</center>
  ';
	}
	?>
  </body>
  </html>