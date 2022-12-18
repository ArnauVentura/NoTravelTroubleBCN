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
?>


<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NTTBCN</title>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Rajdhani:wght@600&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./bootstrap-5.2.2-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./style/css.css" />
  <script src="./js/js.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top navbar-scroll navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a id="home" class="nav-link" aria-current="page" href="#sec1">HOME</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="#sec2">JUEGOS</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#sec3">LUGARES DE INTERES</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#sec4">NUESTRO EQUIPO</a>
          </li>

          <?php
            if(!isset($_SESSION['usuario'])){                                
            ?>
				    <li class="nav-item active">
              <a id="mi_cuenta" class="nav-link" onclick="openPopup();">MI CUENTA</a>
              <img id="mi_cuenta_img" src="./media/login_icon.png" onclick="openPopup();"
              class="d-inline-block align-text-top">
            </li>
                <?php
          } else {
            if ($_SESSION['usuario'] == "admin" && $_SESSION['contrasena'] == "2a2e9a58102784ca18e2605a4e727b5f") {
                ?>
               
                <!--Poner panel administracion-->
                <li class="nav-item active">
                  <a id="mi_cuenta" class="nav-link" onclick="openPopup2();">ADMIN</a>
                  <img id="mi_cuenta_img" src="./media/login_icon.png" onclick="openPopup2();"
                  class="d-inline-block align-text-top">
              </li>
                <?php
            } else {
                ?>
                <!--Poner panel usuario normal-->
                <li class="nav-item active">
                  <a id="mi_cuenta" class="nav-link" onclick="openPopup();"><?php echo $_SESSION['usuario'] ?></a>
                  <img id="mi_cuenta_img" src="./media/login_icon.png" onclick="openPopup();"
                  class="d-inline-block align-text-top">
                </li>
                <?php
            }
          }
          
                ?>
        </ul>
      </div>
    </div>
  </nav>


  <section id="sec1">
    <div class="contenedor-texto">
      <h1 class="display-2" id="title_bcn">
        ¡Conoce Barcelona Con Nosotros!
      </h1>
      <h3 class="display-2" id="title_funny">Mediante Juegos Interactivos</h3>
      <a id="sec2_button" href="#sec2">¡JUGAR YA!</a>

      <div class="popup" id="popup">
        <img src="./media/registro.png">
        <h2>Iniciar Sesión</h2>
        <form action="index.php" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Usuario</label>
            <input type="text" minlength="4" name="usuario" maxlength="12" class="form-control" id="exampleInputEmail1"
              aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" name="iniciosesion" onclick="closePopup()" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <form action="./registermodificado.php">
          <input id="new_account" type="submit" value="¿¿Todavia No Tienes Cuenta??" />
        </form>
      </div>


<!--
      <div class="popup2" id="popup2">
      <img src="./media/registro.png">
      <h2>Iniciar Sesión</h2>
     // <?php //Añadir boton para cerrar
            //  unset($_SESSION['usuario']);
            //  session_destroy();
            //  header('location: index.php');
    //  ?>
    </div>-->
    

      <script>
        let popup = document.getElementById("popup");

        function openPopup() {
          popup.classList.add("open-popup");
        }

        function closePopup() {
          popup.classList.remove("open-popup");
        }


        function openPopup2() {
          popup2.classList.add("open-popup");
        }

        function closePopup2() {
          popup2.classList.remove("open-popup");
        }
      </script>
    </div>
  </section>

  <section id="sec2">
    <div class="contenedor-texto">
      <h2>JUEGOS</h2>
      <img src="/consola.svg" height="750" width="750" />
    </div>
  </section>








  <section id="sec3">
    <div class="contenedor-texto">
      <!-- <h2>LUGARES DE INTERES</h2> -->
      <!-- <a href="#sec1">Section 1</a> -->
      <div id="card_palau" class="card_lugares">
        <div id="circulo_palau" class="circulo">
          <img id="img_palau" src="./media/palau_musica.jpg">
        </div>
      </div>

      <div id="card_zoo" class="card_lugares">
        <div id="circulo_zoo" class="circulo">
          <img id="img_zoo" src="./media/zoo.png">
        </div>
      </div>
    </div>
  </section>















  <section id="sec4">
    <div class="contenedor-texto">
      <h2>NUESTRO EQUIPO</h2>
      <a href="#sec1">Section 1</a>
    </div>
  </section>














  <div id="guitarhero" class="card-container">
    <div id="card_guitarhero" class="card">
      <a href="hottub">
        <div class="card--display">
          <div class="superfi_titulo">
            <i class="material-icons"></i>
          </div>
          <h2></h2>
        </div>
        <div class="card--hover">
          <div class="superfi_texto">
            <h2>GUITAR HERO</h2>
            <p>Consigue seguir el ritmo de la musica acertando las notas que caen presionando en el momento exacto.<br>
              <br>¡¡Vigila Tu Habilidad!! Ya que al fallar una nota tus posibilides de perder iran aumentando hasta
              perder la partida</p>
            <p class="link">HAZ CLICK PARA JUGAR!!</p>
          </div>
        </div>
      </a>
      <div class="card--border"></div>
    </div>
  </div>
  <div id="museo_historia" class="card-container">
    <div id="card_museo_historia" class="card "><a href="worldweb">
        <div class="card--display"><i class="material-icons"></i>
          <h2></h2>
        </div>
        <div class="card--hover ">
          <div class="superfi_texto">
            <h2>T-REX</h2>
            <p>texto t-rex.</p>
            <p class="link">HAZ CLICK PARA JUGAR!!</p>
          </div>
        </div>
      </a>
      <div class="card--border"></div>
    </div>
  </div>
  <div id="zoo" class="card-container">
    <div id="card_zoo" class="card card--dark"><a href="androidupdate">
        <div class="card--display"><i class="material-icons"></i>
          <h2></h2>
        </div>
        <div class="card--hover">
          <div class="superfi_texto">
            <h2>ZOO</h2>
            <p>texto zoo</p>
            <p class="link">HAZ CLICK PARA JUGAR!!</p>
          </div>
        </div>
      </a>
      <div class="card--border"></div>
    </div>
  </div>
  <div id="laberinto" class="card-container">
    <div id="card_laberinto" class="card"><a href="trainthings">
        <div class="card--display"><i class="material-icons"></i>
          <h2></h2>
        </div>
        <div class="card--hover">
          <div class="superfi_texto">
            <h2>Laberinto</h2>
            <p>Te encuentras perdido en el laberinto de Horta, encuentra las diferentes piezas para conseguir salir!!
              <br>Podras completarlo en tiempo record??</p>
            <p class="link">HAZ CLICK PARA JUGAR!!</p>
          </div>
        </div>
      </a>
      <div class="card--border"></div>
    </div>
  </div>
</body>

</html>