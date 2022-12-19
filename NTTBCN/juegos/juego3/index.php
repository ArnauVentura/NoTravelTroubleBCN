<?php 
session_start();
// if(isset($_SESSION['usuario'])){
//     header('location: index.php');
// }
$nombreBD = "nttbcn"; //Hay que poner el nombre de la BBDD
$usuarioBD = "root"; //Hay que poner el nombre del admin de BBDD
$contraseñaBD = ""; //Hay que poner la contraseña del admin de BBDD
$conn = mysqli_connect("localhost", $usuarioBD, $contraseñaBD, $nombreBD);
if(!$conn){
    echo "No se pudo conectar con el servidor, porfavor inténtelo más tarde!";
}


if (isset($_GET["puntosfinales"])) {
    $puntuacion = $_GET["puntosfinales"];
    $usuario = $_SESSION['usuario']; 
    $idJuego = 3;
    //$usuario = "prueba";
        $verificar=$conn->query("select exists (select * from usuarios where Nombre='$usuario');");
        $row=mysqli_fetch_row($verificar);
            if ($row[0]=="1") {
                    $consulta = "select idUsuario from usuarios where Nombre='$usuario';";
                    $id = mysqli_query($conn, $consulta); 
                    $row = mysqli_fetch_assoc($id);
                    $id2 = $row['idUsuario'];
                    $verificar=$conn->query("select exists (select * from jugar where idUsuario='$id2');");
                    $row=mysqli_fetch_row($verificar);
                if ($row[0]=="1") {
                    $consulta = "UPDATE jugar SET Puntuacion='$puntuacion' where idUsuario='$id2'";
                    if (mysqli_query($conn, $consulta)) {
                        }else {
                        }
                }else{
                    $consulta = "INSERT INTO jugar (idJuego, idUsuario, Puntuacion) values ('$idJuego', '$id2', '$puntuacion')" ;
                    if (mysqli_query($conn, $consulta)) {
                        }else {
                        }
                }
       
            }
    } 
?>
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