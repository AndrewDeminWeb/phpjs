<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

  $pass = $_POST['pass'];
  $npass = $_POST['npass'];
  $id = $_COOKIE['user_id'];

  $link = mysqli_connect('localhost','root','usbw','tester');
  if (!$link) die("Error");
  if (!mysqli_set_charset($link, "utf8")){
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
    exit;}
  $query = ("UPDATE `siteusers` SET `pass` = '$npass' WHERE `user_id` = '$id' and `pass` = '$pass'");
  if (mysqli_query($link, $query)) {
    mysqli_close($link);
  header("Location: /");
	   
  } else {
    echo "Ошибка";
  }
?>
