<?php
header('Content-Type: text/html; charset=utf-8');

  $login = $_POST['login'];
  $pass = $_POST['pass'];
  $link = mysqli_connect('localhost','root','usbw','tester');
  if (!$link) die("Error");
    if (!mysqli_set_charset($link, "utf8")){
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
    exit;}
  $query = "SELECT * FROM siteusers WHERE login = '$login' AND pass = '$pass'";
  $result = mysqli_query($link, $query);
  $count = mysqli_fetch_row($result);
  if($count>0) {
    setcookie("user_id","$count[0]", time()+3600);
    setcookie("name","$count[1]"." "."$count[2]", time()+3600);
	setcookie("login","$count[3]", time()+3600);
	setcookie("photo_name","$count[4]", time()+3600);
      header("Location: /");
  }
  else {
    echo "<script type='text/javascript'>alert('Неверный логин или пароль');</script>";
  }
  mysqli_close($link);
?>
