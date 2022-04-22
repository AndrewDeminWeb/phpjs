<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="ch_file.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </script>
  </head>
  <body style="background: url('images/photo_ch.png') repeat-x;">
    <div id="nav">
    <div class="row">
    	<div class="col-lg-12 col-xs-8"> <h1 align="center" > Регистрация </h1>
    	</div>
    	</div>


    <div class="container" id="navigazia">

          <div class="col-lg-3 col-xs-3" style="margin-right: 48px;">
          <form action="index.php" method="post" enctype="multipart/form-data">
          <p><input type="submit" value="Вернуться на главную страницу" name="submit" class="btn-oval"></p>
          </form>
        </div>

        </div>
    		</div>
      </div>
    </div>

    <div id="centr">
      <div class="row">
        <div class="col-lg-12 col-xs-8">

                <table align="center" style="border-spacing: 50px 0;">
                			<?php
                			$link = mysqli_connect('localhost','root','usbw','tester');
                			if (!mysqli_set_charset($link, "utf8")){
                		    printf("Error loading character set utf8: %s\n", mysqli_error($link));
                		    exit;}


                		  $query = "SELECT * FROM photo WHERE user_id = '1'";
                			$result = mysqli_query($link, $query);
                				while ($line = mysqli_fetch_row($result))
                				{
                					echo "
                			<tr><td style='padding: 10px 15px;'>
                					<image width='400' height='300' src='$line[3]'> </td>
                				<td style='vertical-align: top;'>
                                <form action='photo_change.php' method='post'>
                								<input type='submit' value='Изменить' name='submit' class='btn-oval' style='margin-bottom: 16px;'>
                                <p><label></label>Введите новое имя</p>
                                <p><input name=photo_name class='textovii' style='width:300px;'></p>
                                <p><label></label>Введите новый тег</p>
                                <p><input name=h_tags class='textovii'></p>
                                <input name=photo_id value='$line[0]' type='hidden'>
                								</form>
                                <td style='vertical-align: top;'>
                                <form action='photo_delete.php' method='post'>
                								<input name='photo_id' value='$line[0]' type='hidden'>
                								<input type='submit' value='Удалить' name='submit' class='btn-oval'>
                								</form>
                                </td>
                				</td>
                				</tr>
                					";
                				}
                				mysqli_close($link);
                			?>
                			</table>
            </div>
            </div>
    </div>

</body>
 </head>
