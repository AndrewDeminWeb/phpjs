<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
  <link rel="shortcut icon" href="/images/index.ico" type="image/x-icon">
    <meta charset="utf-8">
    <title>Мои JavaScript игры</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/cssindex.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
	<style>
	.bulletsBlock:after {
    content: "";
    display: table;
    clear: both;
	float: center;
}
 
.bulletsBlock > div {
    width: 100%;
    float: center;
    background: rgba(0,0,0,0.3);
    margin-left:5%;
    text-align: center;
    position: relative;
    padding-bottom: 31.7%;
    cursor: pointer;
    -webkit-transition:all 0.35s linear;
    transition:all 0.35s linear;
}
 
.bulletsBlock > div:first-child {
    margin-left:0;
}
 
/*Тень снизу у блока при наведении*/
.bulletsBlock > div:hover {
    -webkit-box-shadow: 0 35px 35px -35px #000000;
    -moz-box-shadow: 0 35px 35px -35px #000000;
    box-shadow: 0 35px 35px -35px #000000;
}
.titleBullet, .hideText {
    position: absolute;
    left:0;
    bottom:0;
    text-align: center;
    width: 100%;
    margin: 0;
    color: #fff;
    -webkit-transition:all 0.35s ease;
    transition:all 0.35s ease;
}
 
.titleBullet {
    line-height: 2.5em;
    /*font-size: 2.1875em;*/
    background:#3B3B3B;
    z-index: 10;
}
 
.hideText {
    line-height: 1.3em;
    font-size: 1.25em;
    padding: 1em 0;
    background:#3B3B3B;
    font-weight: 300;
    z-index: 8;
    height: 50px;
    -webkit-transition:all 0.35s linear 0.2s;
    transition:all 0.35s linear 0.2s;
}
 
/*Анимация при наведении видимого текстового блока*/
.bulletsBlock > div:hover p.titleBullet{
    bottom:80px;
}
 
/*Анимация при наведении скрытого текстового блока*/
.bulletsBlock > div:hover p.hideText{
    background:#454545;
}
.bullet-item span{
	margin-top: 10px;
    line-height: 1.5em;
    font-size: 12.5em;
    color:#fff;
    position: absolute;
    top:0;
    left:0;
    display: block;
    width: 100%;
    -webkit-transition:all 0.35s ease;
    transition:all 0.35s ease;
	
}
 
/*Анимация иконки при наведении - уменьшение и сдвиг вверх*/
.bulletsBlock > div:hover span.iconBullet{
    line-height: 1.35em;
    font-size: 10.625em;
    top:-2.7%;
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
  <li><a href="/index.php" class="current">Главная</a></li>
  <li><a href="aboutme.php">Обо мне</a></li>
<li><a href="/feedback.php">Feedback</a></li>
   <li><a href="/auth.php">Войти
			<form action="auth.php" method="post" enctype="multipart/form-data">
      </form></a></li>
   <li><a href="/reg.php">Зарегистрироваться
      <form action="reg.php" method="post" enctype="multipart/form-data">      
      </form></a></li>
</ul>
	</header>';
    }
    ?>


			<?php
    if ($_COOKIE["user_id"] > -1)
    {
		echo ' <header>
<ul class="menu-main">
  <li><a href="/index.php" class="current">Главная</a></li>
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
  </ul>
  </header>';
     
    }
    ?>
	</div>
	<div>
				<?php
    if ($_COOKIE["user_id"] > -1)
    {
      echo "<center><h1>Здравствуйте, ".$_COOKIE["name"]."!</h1></center>";
		}
    else
    {
      echo ' ';
		}
    ?>
    </div>
	<br>
	<br>
<div class="bulletsBlock" align="center">
<div id="container">
<div class="img"><img src="images/screenshot1.png" width="300" height="300" style="box-shadow: 0 0 2px 1.5px black;" /></div>
<div class="content">
<div class="date" style="color: white;">17.10.2019</div>
<div class="title" style="color: white;">Квадрат против препятствий</div>
<div class="text" style="color: white;" title="Суть игры заключается в том, чтобы зеленый квадрат не задели синие двигающиеся препятствия. 
У игрока всего одна попытка. При соприкосновении с препятствием – игрок начинает заново.">
Моя первая игра, которую я разработал в колледже Информатики и Программирования
</div>
<div class="bulletsBlock" align="center">
    <div class="bullet-item">
        <span class="iconBullet fa fa-cog"></span>
        <p class="titleBullet" style="font-size: 18pt;">Опробовать</p>
        <p class="hideText"><br><b><a href="igra moya/Bird_game/menu.html">Играть</a></b></p>
    
</div>
	</div>
</div>


<div style="padding-top: 350px;">
<div class="img"><img src="images/screenshot2.png" width="300" height="300" style="box-shadow: 0 0 2px 1.5px black;" /></div>
<div class="content">
<div class="date" style="color: white;">08.04.2020</div>
<div class="title" style="color: white;">Рыцарь и изгои</div>
<div class="text" style="color: white;" title="На бар напали изгои, но рыцарь, в тот момент находящийся там, не дает им возможности ограбить 
его любимое место для времяпрепровождения, ставя около себя магических защитников, тем самым обороняясь от огромного количества недоброжелателей.">
Вы играете за главного героя - рыцаря, который держит оборону против воров-изгоев, позарившихся на местный бар.
</div>
<div class="bulletsBlock" align="center">
    <div class="bullet-item">
        <span class="iconBullet fa fa-cog"></span>
        <p class="titleBullet" style="font-size: 18pt;">Опробовать</p>
        <p class="hideText"><br><b><a href="/towards_js/index.html">Играть</a></b></p>
    
</div>
	</div>
</div>

</div>


<div style="padding-top: 350px;">
<div class="img"><img src="images/screenshot3.png" width="300" height="300" style="box-shadow: 0 0 2px 1.5px black;" /></div>
<div class="content">
<div class="date" style="color: white;">12.05.2020</div>
<div class="title" style="color: white;">Змейка</div>
<div class="text" style="color: white;">
Игра за змейку, которая должна собирать поинты, чтобы вырасти, главная задача - не съесть самого себя и 
вырастить змейку до размеров игровой площади.
</div>
<div class="bulletsBlock" align="center">
    <div class="bullet-item">
        <span class="iconBullet fa fa-cog"></span>
        <p class="titleBullet" style="font-size: 18pt;">Опробовать</p>
        <p class="hideText"><br><b><a href="/snake_js/snake.html">Играть</a></b></p>
    
</div>
	</div>
</div>

</div>
</div>
</body>
</html>
