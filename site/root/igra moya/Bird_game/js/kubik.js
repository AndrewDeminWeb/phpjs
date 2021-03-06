var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var leftPressed = false;
	var rightPressed = false;
	var jumpPressed = false;
	var jumpCount = 0;
	var jumpLength = 50;
  var jumpHeight = 0;
  
	var x = canvas.width/2;
	var y = canvas.height-35;
	var playerHeight = 50;
	var playerWidth = 50;
	var paddleX = (canvas.width-playerWidth)/2;

	document.addEventListener("keydown", keyRightHandler, false);
	document.addEventListener("keyup", keyLeftHandler, false);

	function keyRightHandler(e){
		if(e.keyCode == 39){
			rightPressed = true;
		}
		if(e.keyCode == 37){
			leftPressed = true;
		}
		if(e.keyCode == 38){
		  jumpPressed = true;
		}
    
	}

	function keyLeftHandler(e){
		if(e.keyCode == 39){
			rightPressed = false;
		}
		if(e.keyCode == 37){
			leftPressed = false;
		}
	}


function image() {
  ctx.beginPath();
  ctx.rect(paddleX, canvas.height-playerHeight-jumpHeight,  playerWidth, playerHeight);
  ctx.fillStyle = "#FF0000";
  ctx.fill();
  ctx.closePath();
}

/*
function earth(){
	ctx.beginPath();
	ctx.rect(0, 450, 700, 50);
	ctx.fillStyle = "green";
	ctx.fill();
	ctx.closePath();
}
*/


function draw(){
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	if(rightPressed && paddleX < canvas.width-playerWidth){
		paddleX += 7;
	}
	else if(leftPressed && paddleX > 0){
		paddleX -= 7;
	}
	if(jumpPressed){
    jumpCount++;
    jumpHeight = 4*jumpLength*Math.sin(Math.PI*jumpCount/jumpLength);
  }
	if(jumpCount>jumpLength){
    jumpCount=0;
    jumpPressed=false;
    jumpHeight=0;
	}
  
	image();

}
setInterval(draw, 10);
