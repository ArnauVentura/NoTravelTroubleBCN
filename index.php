<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./media/icon.gif">
    <title>Evolution Race</title>
    <link rel="stylesheet" href="./style/estilos.css">
</head>
<body>
    <div id="Puntuacion">
        Puntos: <span id="puntos">0</span>
    </div>
    <div id="Tiempo">
        Tiempo: <span id="tiempo">0</span>
    </div>
    <div id="board">
        <div id="fondo">

        </div>
        <div id="jugador">
            <img src="./media/jugador1.gif" alt="player" id="player">
        </div>
        <div id="enemigo">
            <img src="./media/enemigo1.gif" alt="enemigo la roca" id="imgEnemigo">
        </div>
<!--        <div id="pajaro">
            <img src="./media/pajaro.png" alt="un pajarraco">
        </div> -->
    </div>
    <div class="menu">
        <button id="buttonPlayStop" class="button play"></button>
        <button id="Reiniciar">Reiniciar Juego</button>
    </div>

    <script src="./js/scripts.js">
    </script>
</body>
</html>