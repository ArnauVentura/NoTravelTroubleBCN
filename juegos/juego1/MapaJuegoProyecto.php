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
    $idJuego = 1;
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

<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
    <link rel="stylesheet" href="EstiloProyecto.css">
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
    
</head>

<body>
    <div id="fondo"></div>
        <img src="./vida.png" class="vida" id="vida">
        <img src="./vida.png" class="vida1" id="vida1">
        <img src="./vida.png" class="vida2" id="vida2">
        
    <div id="lienzo"> 
        <h3 id= "titulo">Puntuación: </h3>
        <div class="points" id="puntuacion">
            <img src="./puntuacion2.png" id="punto" class="punto">
        </div>
        <h3 id= "punto2"></h3>

            <div id="imagenpajaro"><img id="imagen" src="Ciguena-Con-Nino.gif" class="accion" alt="eclipse" /></div>
                <div id="imagen1">
                    <img id="imagencesta" src="CestaCompleta.png">
                    <h3 id= "text2"></h3> 
                </div>    
       
       <!-----<div> ----->
            <div class="one" id="primero">
                <img id ="button1" src="./localizador.png" class="localizador">
                <h3 id= "error"></h3> 
            </div>
            <div class="two" id="segundo">
                <img id ="button2" src="./localizador.png" class="localizador">
                <h3 id= "error2"></h3> 
            </div>
            <div class="three" id="cebra">
                <img id ="cebra2" src="./localizador.png" class="localizador">
                <h3 id= "text1"></h3> 
            </div>
            <div class="four" id="titi">
                <img id ="titi2" src="./localizador.png" class="localizador">
                <h3 id= "text22"></h3> 
            </div>
            <div class="five" id="mapache">
                <img id ="mapache2" src="./localizador.png" class="localizador">
                <h3 id= "text3"></h3> 
            </div>
            <div class="six" id="sexto">
                <img id ="button3" src="./localizador.png" class="localizador">
                <h3 id= "error3"></h3> 
            </div>
            <div class="seven" id="septimo">
                <img id ="button4" src="./localizador.png" class="localizador">
                <h3 id= "error4"></h3>
            </div>
            <div class="eight" id="octavo">
                <img id ="button5" src="./localizador.png" class="localizador">
                <h3 id= "error5"></h3> 
            </div>
            <div class="nine" id="noveno">
                <img id ="button6" src="./localizador.png" class="localizador">
                <h3 id= "error6"></h3> 
            </div>
            <div class="ten" id="decimo">
                <img id ="button7" src="./localizador.png" class="localizador">
                <h3 id= "error7"></h3> 
            </div>
            <div class="eleven" id="once">
                <img id ="button8" src="./localizador.png" class="localizador">
                <h3 id= "error8"></h3> 
            </div>
            <div class="twelve" id="doce">
                <img id ="button9" src="./localizador.png" class="localizador">
                <h3 id= "error9"></h3> 
            </div>
            <div class="thirteen" id="trece">
                <img id ="button10" src="./localizador.png" class="localizador">
                <h3 id= "error13"></h3> 
            </div>
           
    </div>    
    
   

    <!--</div>-->
    <script src="./JavaScript.js"></script>
    <div class="selector"></div>
</body>
</html>