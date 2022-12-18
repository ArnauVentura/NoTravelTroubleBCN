<?php 
session_start();


$nombreBD = "nttbcn"; //Hay que poner el nombre de la BBDD
$usuarioBD = "root"; //Hay que poner el nombre del admin de BBDD
$contraseñaBD = ""; //Hay que poner la contraseña del admin de BBDD
$conn = mysqli_connect("localhost", $usuarioBD, $contraseñaBD, $nombreBD);
if(!$conn){
    echo "No se pudo conectar con el servidor, porfavor inténtelo más tarde!";
}else{
      if(isset($_POST["iniciosesion"])){
        $username = $_POST['usuario'];
        $password = md5($_POST['contrasena']);
        $verificar=$conn->query("select exists (select * from usuarios where Nombre='$username' and Contraseña='$password');");
        $row=mysqli_fetch_row($verificar);
        if ($row[0]=="1"){
                session_start();
                $_SESSION['usuario'] = $username;
                $_SESSION['contrasena'] = $password;
                header('location: index.php');
        }else{
          echo ('Error en el inicio de sesión');
        } 
    }
}

function selectRanking(){

  $sql = "SELECT * FROM jugar";
  $result = $conn->query($sql);

  if($result -> num_row > 0){
    while ($row = $result->fetchassoc()){
      echo "id: " . $row["idJuego"]. " - Nombre: " . $row["idUsuario"]. "- Fecha" . $row["DateTimePlay"] . "- Puntuacion" .  $row["Puntuacion"]; 
    }
  }

}



?>
