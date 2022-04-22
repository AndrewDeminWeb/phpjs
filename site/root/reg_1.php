<?php

header('Content-Type:text/html; charset=utf-8');

  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  $link = mysqli_connect('localhost','root','usbw','tester');
  if (!$link) die("Error");
  	if (!mysqli_set_charset($link, "utf8")){
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
    exit;}
  $query = "SELECT max(user_id) FROM siteusers";
  $result = mysqli_query($link, $query) or die(mysqli_error());
  $id = mysqli_fetch_row($result);
  if ($id[0] == null)
    $id[0] = '0';
  else
    $id[0]++;
  $query = "INSERT INTO siteusers (user_id, f_name,l_name,login,pass) VALUE ('$id[0]', '$f_name', '$l_name', '$login', '$pass')";
  if (mysqli_query($link, $query)) {
	$uploaddir = 'img/'.$id[0].'/';
	mkdir($uploaddir, 0777, true);
    header("Location: /");
  }
  else
    echo "Ошибка: ".mysqli_error($link);
  mysqli_close($link);
?>
