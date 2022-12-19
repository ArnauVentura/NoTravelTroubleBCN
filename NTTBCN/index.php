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


          <li class="nav-item active">
            <a href="./lang/catalan.html"> <img id="catalan_img" src="./media/catalan.png"
                class="d-inline-block align-text-top"> </a>
          </li>
          <li class="nav-item active">
            <a href="./lang/ingles.html"> <img id="ingles_img" src="./media/ingles.png"
                class="d-inline-block align-text-top"> </a>
          </li>

          <?php
            if(!isset($_SESSION['usuario'])){                                
            ?>
          <li class="nav-item active">
            <a id="mi_cuenta" class="nav-link" href="#sec1" onclick="openPopup();">MI CUENTA</a>
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
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Usuario</label>
            <input type="text" minlength="4" maxlength="12" class="form-control" id="exampleInputEmail1"
              aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" onclick="closePopup()" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <form action="./register.html">
          <input id="new_account" type="submit" value="¿¿Todavia No Tienes Cuenta??" />
        </form>
      </div>
      <script>
        let popup = document.getElementById("popup");

        function openPopup() {
          popup.classList.add("open-popup");
        }

        function closePopup() {
          popup.classList.remove("open-popup");
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
      <div id="card_palau" class="card_lugares">
        <div id="circulo_palau" class="circulo">
          <div class="content">
            <h2>PALAU DE LA MUSICA</h2>
            <p>El Palacio de la Música Catalana es un auditorio de música situado en la calle Sant Pere
              més Alt en el barrio de la Ribera. Fue proyectado por el arquitecto barcelonés Lluís
              Domènech i Montaner.<br>Es propiedad de la Associació Orfeó Català, que fomenta la cultura catalana, en
              especial en la vertiente
              musical y con una atención preferente a la música coral.</p>
            <a class="card_button" href="https://www.palaumusica.cat/es/" target="_blank">Pagina Oficial</a>
          </div>
          <img id="img_palau" src="./media/palau_musica.jpg">
        </div>
      </div>

      <div id="card_zoo" class="card_lugares">
        <div id="circulo_zoo" class="circulo">
          <div class="content">
            <h2>ZOO DE BARCELONA</h2>
            <p>El Parque Zoológico de Barcelona es un zoológico situado en el parque de la Ciudadela. El zoo de
              Barcelona cuenta con una de las colecciones de animales más
              importantes de Europa. Durante años, concretamente desde 1966 hasta 2003, la estrella del Zoo fue el
              famoso Copito de Nieve, único gorila albino conocido.</p>
            <a class="card_button" href="https://www.zoobarcelona.cat/es" target="_blank">Pagina Oficial</a>
          </div>
          <img id="img_zoo" src="./media/zoo.png">
        </div>
      </div>

      <div id="card_laberinto" class="card_lugares">
        <div id="circulo_laberinto" class="circulo">
          <div id="content_laberinto" class="content">
            <h2>LABERINTO DE HORTA</h2>
            <p>El parque del Laberinto de Horta es un jardín histórico ubicado
              en el distrito de Horta-Guinardó de Barcelona.<br> Es el jardín más antiguo que se conserva en la ciudad.
              <br>Este espacio cuenta con numerosas obras de arte principalmente esculturas, así como diversos
              estanques,
              cascadas, fuentes y un canal que recorre el recinto superior.</p>
            <a class="card_button"
              href="https://www.barcelona.cat/es/que-hacer-en-bcn/parques-y-jardines/parque-del-laberint-dhorta_92086011952.html"
              target="_blank">Pagina Oficial</a>
          </div>
          <img id="img_laberinto" src="./media/laberinto.jpg">
        </div>
      </div>

      <div id="card_museo" class="card_lugares">
        <div id="circulo_museo" class="circulo">
          <div id="content_museo" class="content">
            <h2>Museo Cataluña</h2>
            <p>El Museo de Historia de Cataluña también conocido como
              MHC, se creó en 1996 por el Gobierno de la Generalidad de Cataluña. Una de las razones
              fundamentales de la creación del museo es narrar a sus visitantes la historia de Cataluña mediante una
              colección de objetos y documentos relacionados.</p>
            <a class="card_button" href="https://www.mhcat.cat/" target="_blank">Pagina Oficial</a>
          </div>
          <img id="img_museo" src="./media/museo.jpg">
        </div>
      </div>
    </div>
  </section>





  <section id="sec4">
    <div class="contenedor-texto">
      <h2 id="equipo">NUESTRO EQUIPO</h2>
      <!-- <a href="#sec1">Section 1</a> -->
      <div class="container">
        <div class="card">
          <div id="arnau1" class="slide slide_1">
            <div class="content">
              <div id="icon_arnau" class="icon">
                <i class="fa fa-user-circle" aria-hidden="true">
                </i>
              </div>
            </div>
          </div>
          <div id="arnau2" class="slide slide_2">
            <div class="content">
              <h3>
                Arnau Ventura Cívico
              </h3>
              <p>Management Developer & Zoo Game</p>
            </div>
          </div>

          <div id="alexis1" class="slide slide_1">
            <div class="content">
              <div id="icon_alexis" class="icon">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div id="alexis2" class="slide slide_2">
            <div class="content">
              <h3>
                Alexis Escobales Garcia
              </h3>
              <p>Front-End Developer & Guitar Hero Game</p>
            </div>
          </div>

          <div id="desi1" class="slide slide_1">
            <div class="content">
              <div id="icon_desi" class="icon">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div id="desi2" class="slide slide_2">
            <div class="content">
              <h3>
                Desirée Diaz Tamargo
              </h3>
              <p>Backend Developer & Zoo Game</p>
            </div>
          </div>

          <div id="oriol1" class="slide slide_1">
            <div class="content">
              <div id="icon_oriol" class="icon">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div id="oriol2" class="slide slide_2">
            <div class="content">
              <h3>
                Oriol Espejo Lorenzo
              </h3>
              <p>Backend Developer & Evolution Game</p>
            </div>
          </div>
        </div>
      </div>
  </section>


























  <div id="guitarhero" class="card-container">
    <div id="card_guitarhero" class="card">
      <a href="">
        <div class="card--display">
          <div class="superfi_titulo">
            <i class="material-icons"></i>
          </div>
          <h2></h2>
        </div>
        <div class="card--hover">
          <div class="superfi_texto">
            <h2>GUITAR HERO</h2>
            <p>Consigue seguir el ritmo de la musica acertando las notas que caen presionando en el momento exacto.
              <p class="link">HAZ CLICK PARA JUGAR!!</p>
          </div>
        </div>
      </a>
      <div class="card--border"></div>
    </div>
  </div>
  <div id="museo_historia" class="card-container">
    <div id="card_museo_historia" class="card "><a href="">
        <div class="card--display"><i class="material-icons"></i>
          <h2></h2>
        </div>
        <div class="card--hover ">
          <div class="superfi_texto">
            <h2>T-REX</h2>
            <p>Esquiva a los enemigos y consigue evolucionar seras capaz de llegar al final?</p>
            <p class="link">HAZ CLICK PARA JUGAR!!</p>
          </div>
        </div>
      </a>
      <div class="card--border"></div>
    </div>
  </div>
  <div id="zoo" class="card-container">
    <div id="card_zoo" class="card card--dark"><a href="">
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
    <div id="card_laberinto" class="card"><a href="">
        <div class="card--display"><i class="material-icons"></i>
          <h2></h2>
        </div>
        <div class="card--hover">
          <div class="superfi_texto">
            <h2>Laberinto</h2>
            <p>Te encuentras perdido en el laberinto de Horta.<br>Encuentra las diferentes piezas para conseguir salir!!
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