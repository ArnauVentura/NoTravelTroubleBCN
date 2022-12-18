<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Maze</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/big-shot" rel="stylesheet">
</head>
<body>
    

    <div id="board">
        <div id="player"></div>
        <div id="walls"></div>
    </div>
    <div id="logx"></div>
    <div id="logy"></div>
    

    <div class="scoreboard" style="display: block">
        <table class="scoreboardTable">
            <thead class="scoreboardTableHead">
                <tr class="scoreboardTableRow">
                    <tb>ESCAPE THE MAZE</tb>
                    
                    </br>
                    <tb>Time
                        </br>
                        <button id="TimeButton" onclick="timer()"> Start the game</button>
                        <button onclick="location.href=''" type="button">
                            Volver a la pagina principal</button>
                        <div id="Progress">
                            <div id="bar"></div>
                        </div>
                    </tb>
                    </br>
                    <tb>Map Pieces Found
                        <div id="score"> 0/4 </div>
                    </tb>
                    <br>
                    <tb>USA LAS FLECHAS DEL TECLADO PARA MOVERSE. <br> ENCUENTRA LAS 4 PIEZAS EN UN MINUTO PARA ESCAPAR. </tb>
                </tr>
            </thead>
        </table>
    </div>


    <script src="Main.js"></script>
</body>

</html>