<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<?php
	error_reporting(-1);
	header('Content-Type: text/html; charset=utf-8');

	  $name = $_POST["photo_name"];
	  $hash = $_POST["photo_hash"];
	  $view = $_POST["photo_view"];
	  $user_id = $_COOKIE['user_id'];


		$link = mysqli_connect('localhost','root','usbw','tester');
		if (!mysqli_set_charset($link, "utf8")){
	    printf("Error loading character set utf8: %s\n", mysqli_error($link));
	    exit;}

	    $query = "SELECT max(photo_id) FROM photo";
	    $result = mysqli_query($link, $query) or die(mysql_error());
	    $id = mysqli_fetch_row($result);
	    if ($id[0] == null)
	      $id[0] = '0';
	    else
	      $id[0]++;

	  $uploaddir = 'img/'.$_COOKIE['user_id'].'/';
	  //$uploadfile = $uploaddir.'Untitled'.$id[0].'.png';
	  //$uploadfile = $uploaddir.'Untitled0.png';
	  $uploadfile = $uploaddir.''.$_COOKIE["user_id"].'.png';
	  if ($_FILES['img_file']['size'] > 1024*1024)
	    echo "Размер файла превышает 1 МБ";
	  if ($_FILES["img_file"]["type"] == 'image/png' || $_FILES["img_file"]["type"] == 'image/jpeg') {
	    imagepng(
	      imagecreatefromstring(
	          file_get_contents($_FILES["img_file"]["tmp_name"])
	      ),
	      $uploadfile
	    );

	    $query = "INSERT INTO photo (photo_id, user_id, photo_name, file, h_tags, view)
						VALUE ('$id[0]', '$user_id', '$name',  '$uploadfile', '$hash', '$view')";
	    if (mysqli_query($link, $query)) {
				header("Location: /");
	    } else {
	      echo 'Ошибка';
	    }

	    } else
	    echo "Неверный формат файла";
	?>
</body>
</head>
