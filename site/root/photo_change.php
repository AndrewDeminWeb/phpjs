<?php
	error_reporting(-1);
	header('Content-Type: text/html; charset=utf-8');

    $link = mysqli_connect('localhost', "root", "usbw", "tester");
    if (!mysqli_set_charset($link, "utf8")){
		printf("Error loading character set utf8: %s\n", mysqli_error($link));
		exit;}

    $id = $_POST['photo_id'];
    $name = $_POST['photo_name'];
		$tags = $_POST['h_tags'];

    $query = "UPDATE photo SET photo_name='$name', h_tags='$tags' WHERE photo_id='$id'";

    if (mysqli_query($link, $query)) {
		mysqli_close($link);
		header("Location: /");
    } else
		echo 'Ошибка';
?>
