<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="/images/profile.ico" type="image/x-icon">
    <title>Профиль</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
	<style>
	.line { 
    border-left: 2px solid black;
    padding-left: 10%;
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
	<center><h2>Сначала <a href="/reg.php">зарегистрируйтесь</a> или <a href="/auth.php">войдите</a>!</h2></center>
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
    <li><a href="/profile.php" class="current">Профиль</a></li>
  <li><a href="exit.php">Выйти
  <form action="exit.php" method="post" enctype="multipart/form-data">
      </form>
  </a></li>

  </ul>
  </header>
  <br>
  <br>
  <div style="padding: 20px;">
  <label><p style="font-size: 14pt;">Ваше имя: '.$_COOKIE["name"].'</p></label>
  <label><p style="font-size: 14pt;">Ваш логин: '.$_COOKIE["login"].'</p></label>
 <label><p style="font-size: 14pt;">Ваша аватарка:</p></label>  
<tr><td style="padding: 10px;">
<form action=photo_delete.php method=post enctype="multipart/form-data">
                					<img width=250 height=300 src=/img/'.$_COOKIE["user_id"].'/'.$_COOKIE["user_id"].'.png style="border-radius: 25px 25px 25px 25px;"> </td>
									<br>
							<br>
                		<td style=vertical-align: top;>
                            
                                
                								<input name=photo_id value=$line[0] type=hidden>
                								<input type=submit value=Удалить name=submit class=registerbtn_goindex style="width: 14%;">
                								</form>
                                </td>
                				</td>
                				</tr>
								
								</div>
								
<div class="container line" align="right" style="float: right; transform: translate(-10%, -140%);">
	<form action="photo_load.php" method="POST" enctype="multipart/form-data">
		<p style="margin-top: 25px;"><label></label>Введите название</p>
		<p><input name=photo_name class="inptext"></p>
			
				<p><label></label>Введите хештег</p>
				<p><input name=photo_hash class="inptext"></p>
				<br>
        <div class="custom-file" style="margin-top: -35px;">
  <input type="file" name="img_file" id="customFile">
  <label class="registerbtn_goindex" for="customFile">Выбрать изображение</label>

				<!--p style="margin-top: 30px;"><input type="file" name="img_file" id="img_file"></p-->
				<br>
				<input type="submit" value="Загрузить" name="submit" class="registerbtn_goindex" style="margin-top: 36px;">
    </form>


</div>
								';
		
   
   }
		
    ?>
	
	</div>

<!--p><label></label>Уровень доступности</p>
      <select class="textovii" style="margin-bottom: 50px;">
        <option name=photo_view class="inptext">Доступно</option>
        <option name=photo_view class="inptext" value="0">Недоступно</option>
      </select>


<form action=photo_change.php method=post>
                								<input type=submit value=Изменить name=submit class=registerbtn_goindex style=margin-bottom: 16px;>
                                <p><label></label>Введите новое имя</p>
                                <p><input name=photo_name class=inptext style=width:300px;></p>
                                <p><label></label>Введите новый тег</p>
                                <p><input name=h_tags class=inptext style=" width: 10%;"></p>
                                <input name=photo_id value=$line[0] type=hidden>
                								</form>


	<form action="my_photo.php" method="POST">
	<input type="submit" value="Посмотреть фотографии" class="registerbtn_goindex" style="width: 30%; margin-bottom: 40px; margin-top: 40px;">
	</form>
	
	
	 <form action="find_users.php" method="POST">
  <input type="submit" value="Просмотр фотографий по другим пользователям" class="registerbtn_goindex" style="width: 50%; margin-bottom: 40px;">
  </form>
  <form action="find_photo.php" method="POST">
  <input type="submit" value="Поиск фото по названию" class="registerbtn_goindex" style="width: 30%; margin-bottom: 40px;">
  </form>
  <form action="find_h_tags.php" method="POST">
  <input type="submit" value="Поиск фото по хештегу" class="registerbtn_goindex" style="width: 30%; margin-bottom: 40px;">
  </form>
	
  <form action="im_ch.php" method="POST">
	<input type="submit" value="Изменить/Удалить фотографии" class="registerbtn_goindex" style="width: 30%; margin-bottom: 40px;">
	</form-->

</body>

</html>
