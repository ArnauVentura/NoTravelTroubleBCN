<?php 
session_start();
if(isset($_SESSION['usuario'])){
    header('location: index.php');
}
$nombreBD = "nttbcn"; //Hay que poner el nombre de la BBDD
$usuarioBD = "root"; //Hay que poner el nombre del admin de BBDD
$contraseñaBD = ""; //Hay que poner la contraseña del admin de BBDD
$conn = mysqli_connect("localhost", $usuarioBD, $contraseñaBD, $nombreBD);
if(!$conn){
    echo "No se pudo conectar con el servidor, porfavor inténtelo más tarde!";
}else{
    if(isset($_POST["registrado"])){
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $contrasena = md5($_POST['contrasena']);
        $verificar=$conn->query("SELECT EXISTS (SELECT * FROM usuarios WHERE Nombre='$usuario');");
        $row=mysqli_fetch_row($verificar);
        if ($row[0]=="1") {
            echo "Este usuario ya existe!";
        }else{
            $insert = "INSERT INTO usuarios (Nombre,Email,Contraseña) VALUES ('$usuario', '$email','$contrasena')";
            if (mysqli_query($conn, $insert)) {
                echo "Usuario registrado correctamente!";
            }else {
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in into your account | NTTBCN</title>
    <link rel="stylesheet" href="../style/login.css" />
    <link rel="stylesheet" href="../bootstrap-5.2.2-dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari:wght@500&family=Bebas+Neue&display=swap"
        rel="stylesheet">
</head>
<header>
    <img src="../media/sample_icon.png">
</header>
<img id="linea" src="../media/linea.png">
<section>
    <div class="ventajas">
        

        <div id="img">
            <img src="../media/arcade_login.png">
        </div>
        <div id="text">
            <h2>Play Our Games</h2>
            <p></p>
        </div>


        <div class="rank">
            <div id="img">
                <img src="../media/ranking_login.png">
            </div>
            <div id="text">
                <h2>See the global Rankings</h2>
                <p></p>
            </div>
        </div>

        <div class="info">
            <div id="img">
                <img src="../media/info_login.png">
            </div>
            <div id="text">
                <h2>Receive Additional Information</h2>
                <p></p>
            </div>
        </div>
    </div>


    <div class="login">
        <h1>Register</h1>
        <div class="form">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User</label>
                    <input type="text" minlength="4" maxlength="12" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>

    </div>
</section>

</html>