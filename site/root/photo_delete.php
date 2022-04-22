<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

  $id = $_POST["photo_id"];
  $user_id = $_COOKIE['user_id'];
  $link = mysqli_connect('localhost','root','usbw','tester');
  	if (!mysqli_set_charset($link, "utf8")){
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
    exit;}
  $query = ("SELECT file FROM `photo` WHERE `photo_id` = '$id' AND `user_id` = '$user_id'");
  $result= mysqli_query($link, $query);
  $dir=mysqli_fetch_row($result);
  $query = ("DELETE FROM `photo` WHERE `photo_id` = '$id' AND `user_id` = '$user_id'");
  if (mysqli_query($link, $query)) {
	unlink("$dir[0]");
    header("Location: /profile.php");
  } else {
    echo "Ошибка";
  }
?>

<?php 
if (unlink('img/'.$_COOKIE["user_id"].'/'.$_COOKIE["user_id"].'.png')) 
{
	echo "Файл удален"; 
	 header("Location: /profile.php");
	} 
	else
		{ 
	echo "Ошибка при удалении файла"; 
	} 
	?>