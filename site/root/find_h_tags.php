<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>


  <script src="https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js"></script>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex">
  <script src="https://static.codepen.io/assets/editor/live/console_runner-a7d19dfb8db35c27bf343618f838527f62153df43b74154074f4a8ccb026cd27.js"></script><link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
  <link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">
  <link rel="canonical" href="https://codepen.io/ycw/pen/QVeYMP?editors=1111">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" type="text/css" href="myphotostyle.css">

  </head>
<body style="background: url('images/gallery.png') repeat-x;">

  <div class="row" style=" color: white; font-family: 'Monotype Corsiva'; font-size: 40px;">
    <div class="col-lg-12 col-xs-8"> <h1 align="center" > Галлерея </h1>
    </div>
    </div>


  <div class="container" >

        <div class="row">

        <div class="col-lg-3 col-xs-3" style="margin-top: 48px;" align="center">
        <form action="index.php" method="post" enctype="multipart/form-data">
        <p><input type="submit" value="Вернуться на главную страницу" name="submit" class="btn-oval" style=" color: white; font-family: 'Monotype Corsiva'; font-size: 30px;"></p>
        </form>
      </div>

      </div>
      </div>


			<div class="row" style=" color: white; font-family: 'Monotype Corsiva'; font-size: 30px;">
				<form action="" method="post" style="margin-bottom: -100px; margin-top: 20px; font-size: 30px;">
	    		<p>Введите хештег фотографии</p>
	    		<p><input name=h_tag id='login' class="textovii" onkeyup="checkParams()" style="margin-top: 25px; font-size: 25px;"></p>
	    			  	<input type="submit" value="Найти фотографию" name="submit" class="btn-oval" style="margin-top: 25px; font-size: 25px;">
	        </form>
				</div>
				</div>


	<div class="w">
	<div class="ts">

	<?php
	$idea=0;
		error_reporting(-1);
		header('Content-Type: text/html; charset=utf-8');

		$link = mysqli_connect('localhost','root','usbw','tester');
		if (!mysqli_set_charset($link, "utf8")){
	    printf("Error loading character set utf8: %s\n", mysqli_error($link));
	    exit;}

				$tag=$_POST['h_tag'];

$query = "SELECT * FROM photo WHERE h_tags = '$tag' AND view='1'";
$result = mysqli_query($link, $query) or die(mysql_error());

		$colvo=0;
		while($row = mysqli_fetch_row($result)){
				$colvo++;
				if ($colvo==1	){
					$ideaVid="c1";
					$file=$row['3'];
					$ph_name=$row['2'];
					 $ch='checked="checked"';
				}
				if ($colvo==2	){
					$ideaVid="c2";
					$file=$row['3'];
					$ph_name=$row['2'];
					$ch="";
				}
				else if ($colvo==3){
					$ideaVid="c3";
					$file=$row['3'];
					$ph_name=$row['2'];
 $ch="";
				}
				else if ($colvo==4){
					$ideaVid="c4";
					$file=$row['3'];
					$ph_name=$row['2'];
$ch="";
				}
				else if ($colvo==5){
					$ideaVid="c5";
					$file=$row['3'];
					$ph_name=$row['2'];
$ch="";
				}
				else if ($colvo==6){
					$ideaVid="c6";
					$file=$row['3'];
					$ph_name=$row['2'];
$ch="";}
else if ($colvo==7){
	$ideaVid="c7";
	$file=$row['3'];
	$ph_name=$row['2'];
$ch="";
}
else if ($colvo==8){
	$ideaVid="c8";
	$file=$row['3'];
	$ph_name=$row['2'];
$ch="";
}
	?>
	<input type="radio" id="<?=$ideaVid?>" name="ts" <?=$ch?>>
	<label class="t" for="<?=$ideaVid?>" ><img src="<?=$file?>"></label>
<?php }
	    mysqli_close($link);
	?>
</div>
</div>

<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script id="rendered-js" data="__CP_INLINE_JS__">
  const els = document.querySelectorAll("[type='radio']");
for (const el of els)
el.addEventListener("input", e => reorder(e.target, els));
reorder(els[0], els);

function reorder(targetEl, els) {
  const nItems = els.length;
  let processedUncheck = 0;
  for (const el of els) {
    const containerEl = el.nextElementSibling;
    if (el === targetEl) {//checked radio
      containerEl.style.setProperty("--w", "100%");
      containerEl.style.setProperty("--l", "0");
    } else
    {//unchecked radios
      containerEl.style.setProperty("--w", `${100 / (nItems - 1)}%`);
      containerEl.style.setProperty("--l", `${processedUncheck * 100 / (nItems - 1)}%`);
      processedUncheck += 1;
    }
  }
}
  //# sourceURL=pen.js
</script>

</body>
</html>
