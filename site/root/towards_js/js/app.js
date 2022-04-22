 var requestAnimFrame = (function(){
    return window.requestAnimationFrame    || //указывает браузеру на то, что вы хотите произвести анимацию, и просит его запланировать перерисовку на следующем кадре анимации.
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame    ||
        window.oRequestAnimationFrame      ||
        window.msRequestAnimationFrame     ||
        function(callback){
            window.setTimeout(callback, 1000 / 60);
        };
})();

//Возвращает случайное число от мин (включительно) до макс. (исключая)
function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}

// Возвращает случайное целое число между мин (включено) и макс (исключено)
// Использование функции Math.round() даст вам неоднородное распределение!
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

// Создать холст
var canvas = document.createElement("canvas");
var ctx = canvas.getContext("2d");
canvas.width = 1024;
canvas.height = 520;
document.body.appendChild(canvas);

// Главная   игра
var lastTime;
function main() {
    var now = Date.now();
    var dt = (now - lastTime) / 1000.0;

    update(dt);
    render();

    lastTime = now;
    requestAnimFrame(main);
}

function init() {
    terrainPattern = ctx.createPattern(resources.get('img/terrain.png'), 'repeat');

	document.getElementById('play-again').addEventListener('click', function() {
        reset();
    });

    reset();
    lastTime = Date.now();
    main();
}

resources.load([
    'img/tower.png',
	'img/sprites.png',
	'img/spider.png',
    'img/hero.png',
	'img/bullet.png',
    'img/terrain.png'
]);
resources.onReady(init);

// Состояние игры
var player = {
    pos: [0, 0],
    sprite: new Sprite('img/hero.png', [0, 0], [48, 30], 5, [0, 1, 2, 1]),
	down: new Sprite('img/hero.png', [0, 0], [48, 30], 5, [0, 1, 2, 1]),
	up: new Sprite('img/hero.png', [0, 144], [48, 30], 5, [0, 1, 2, 1]),
	left: new Sprite('img/hero.png', [0, 48], [48, 30], 5, [0, 1, 2, 1]),
	right: new Sprite('img/hero.png', [0, 96], [48, 30], 5, [0, 1, 2, 1])
};

var towers = [];
var bullets = [];
var enemies = [];
var explosions = [];

var lastTower = 0;
var gameTime = 0;
var isGameOver;
var terrainPattern;

var score = 0;
var scoreEl = document.getElementById('score');

// Скорость в пикселях в секунду/
var playerSpeed = 150;
var bulletSpeed = 350;
var enemySpeed = 50;

// Обновление игровых объектов
function update(dt) {
    gameTime += dt;

    handleInput(dt);
    updateEntities(dt);

    // Со временем становится все труднее добавлять врагов, используя это уравнение
    if (Math.random() < 1 - Math.pow(0.993, gameTime)) {
		switch (getRandomInt(0,4)) {
		    case 0:
			enemies.push({
				pos: [0, Math.random() * (canvas.height - 30)],
				sprite: new Sprite('img/spider.png', [0, 0], [40, 30], 5, [0, 1, 2, 1])
			});
			break;
		    case 1:
			enemies.push({
				pos: [Math.random() * canvas.width, 0],
				sprite: new Sprite('img/spider.png', [0, 0], [40, 30], 5, [0, 1, 2, 1])
			});
			break;
			case 2:
			enemies.push({
				pos: [Math.random() * canvas.width, canvas.height - 30],
				sprite: new Sprite('img/spider.png', [0, 0], [40, 30], 5, [0, 1, 2, 1])
			});
			break;
			default:
			enemies.push({
				pos: [canvas.width, Math.random() * (canvas.height - 30)],
				sprite: new Sprite('img/spider.png', [0, 0], [40, 30], 5, [0, 1, 2, 1])
			});
			break;
		}
    }

    checkCollisions();

    scoreEl.innerHTML = score;
}

function handleInput(dt) {
    if (input.isDown('DOWN') || input.isDown('s')) {
        player.pos[1] += playerSpeed * dt;
		player.sprite = player.down;
    }

    if (input.isDown('UP') || input.isDown('w')) {
        player.pos[1] -= playerSpeed * dt;
		player.sprite = player.up;
	}

    if (input.isDown('LEFT') || input.isDown('a')) {
        player.pos[0] -= playerSpeed * dt;
		player.sprite = player.left;
    }

    if (input.isDown('RIGHT') || input.isDown('d')) {
        player.pos[0] += playerSpeed * dt;
		player.sprite = player.right;
    }

    if (input.isDown('SPACE') && !isGameOver) {
		var isClosest = false;
		for (var i = 0; i < towers.length; i++) {
			if (Math.abs(player.pos[0] - towers[i].pos[0]) < 50 &&
				Math.abs(player.pos[1] - towers[i].pos[1]) < 50) {
				isClosest = true;
			}
		}

		if (!isClosest) {
			towers[lastTower % 3] = {
				pos: [player.pos[0], player.pos[1]],
				lastFire: Date.now(),
				sprite: new Sprite('img/tower.png', [0, 0], [38, 35], 8, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15])
			};
			lastTower++;
		}
    }
}

function updateEntities(dt) {
    // Обновление анимации  игрока
    player.sprite.update(dt);

	// Обновиление анимацию защиты/
	for(var i = 0; i < towers.length; i++) {
		var tower = towers[i];
		tower.sprite.update(dt);

		if (!isGameOver && Date.now() - tower.lastFire > 500) {
			var pi = Math.PI;
			var x = tower.pos[0] + tower.sprite.size[0] / 2;
			var y = tower.pos[1] + tower.sprite.size[1] / 2;

			bullets.push({
				pos: [x, y],
				k: getRandomArbitrary(-5 * pi, 5 * pi),
				sprite: new Sprite('img/bullet.png', [0, 0], [24, 24])
			});
			tower.lastFire = Date.now();
		}
	}

    //обновление зимных шаров
    for (var i = 0; i < bullets.length; i++) {
        var bullet = bullets[i];

		var c = dt * bulletSpeed;
		var sin = Math.sin(bullet.k);
		var cos = Math.cos(bullet.k);

		bullet.pos[0] += sin * c;
		bullet.pos[1] += cos * c;

        // Удалиние шара, если она выйдет из экрана
        if (bullet.pos[1] < 0 || bullet.pos[1] > canvas.height ||
			bullet.pos[0] > canvas.width) {

            bullets.splice(i, 1);
            i--;
        }
    }

     // Обновиление всех врагов
    for (var i = 0; i < enemies.length; i++) {
	    var x0 = enemies[i].pos[0];
		var y0 = enemies[i].pos[1];
		var x1 = player.pos[0];
		var y1 = player.pos[1];
		var c = enemySpeed * dt;
		var l = Math.sqrt((x1 - x0) * (x1 - x0) + (y1 - y0) * (y1 - y0));

		enemies[i].pos[0] += (x1 - x0) * c / l;
		enemies[i].pos[1] += (y1 - y0) * c / l;

		enemies[i].sprite.update(dt);

          // Удалиние, если за кадром
        if (enemies[i].pos[0] + enemies[i].sprite.size[0] < 0) {
            enemies.splice(i, 1);
            i--;
        }
    }

// Обновиление все взрывы
    for (var i = 0; i < explosions.length; i++) {
        explosions[i].sprite.update(dt);

  // Удалите, если анимация сделана
        if (explosions[i].sprite.done) {
            explosions.splice(i, 1);
            i--;
        }
    }
}

// столкновение

function collides(x, y, r, b, x2, y2, r2, b2) {
    return !(r <= x2 || x > r2 || b <= y2 || y > b2);
}

function boxCollides(pos, size, pos2, size2) {
    return collides(pos[0], pos[1],
                    pos[0] + size[0], pos[1] + size[1],
                    pos2[0], pos2[1],
                    pos2[0] + size2[0], pos2[1] + size2[1]);
}

function checkCollisions() {
    checkPlayerBounds();

   // Обнаружение столкновения для всех врагов и шаров
    for (var i = 0; i < enemies.length; i++) {
        var pos = enemies[i].pos;
        var size = enemies[i].sprite.size;

        for (var j = 0; j < bullets.length; j++) {
            var pos2 = bullets[j].pos;
            var size2 = bullets[j].sprite.size;

            if (boxCollides(pos, size, pos2, size2)) {
              // Удалить врага
                enemies.splice(i, 1);
                i--;

               // Добавить счет
                score += 10;

             // Добавить взрыв
                explosions.push({
                    pos: pos,
                    sprite: new Sprite('img/sprites.png',
                                       [0, 117],
                                       [39, 39],
                                       16,
                                       [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                                       null,
                                       true)
                });

             // Удалите шар
                bullets.splice(j, 1);
                break;
            }
        }

        if (boxCollides(pos, size, player.pos, player.sprite.size)) {
            gameOver();
        }
    }
}

function checkPlayerBounds() {
    // Проверить границы
    if (player.pos[0] < 0) {
        player.pos[0] = 0;
    }
    else if (player.pos[0] > canvas.width - player.sprite.size[0]) {
        player.pos[0] = canvas.width - player.sprite.size[0];
    }

    if (player.pos[1] < 0) {
        player.pos[1] = 0;
    }
    else if (player.pos[1] > canvas.height - player.sprite.size[1]) {
        player.pos[1] = canvas.height - player.sprite.size[1];
    }
}

// Рендер всего
function render() {
    ctx.fillStyle = terrainPattern;
    ctx.fillRect(0, 0, canvas.width, canvas.height);

 // Отправить игрока, если игра еще не закончена
    if (!isGameOver) {
        renderEntity(player);
		renderEntities(towers);
		renderEntities(enemies);
    }

    renderEntities(bullets);
    renderEntities(explosions);
}

function renderEntities(list) {
    for(var i=0; i<list.length; i++) {
        renderEntity(list[i]);
    }
}

function renderEntity(entity) {
    ctx.save();
    ctx.translate(entity.pos[0], entity.pos[1]);
    entity.sprite.render(ctx);
    ctx.restore();
}

// Игра закончилась
function gameOver() {
	document.getElementById('game-over').style.display = 'block';
    document.getElementById('game-over-overlay').style.display = 'block';
    isGameOver = true;
}

// Сброс игры до исходного состояния
function reset() {
	document.getElementById('game-over').style.display = 'none';
    document.getElementById('game-over-overlay').style.display = 'none';
    isGameOver = false;
    gameTime = 0;
	lastTower = 0;
    score = 0;

	towers = [];
    enemies = [];
    bullets = [];

    player.pos = [canvas.width / 2, canvas.height / 2];
}
