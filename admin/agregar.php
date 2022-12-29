<?php
  // Conexión a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "nttbcn") or die(mysqli_error($conexion));

  // Si se ha enviado el formulario
  if (isset($_POST['agregar'])) {
    // Se escaparán los caracteres especiales para evitar ataques de inyección SQL
    $idTipo = mysqli_real_escape_string($conexion, $_POST['idTipo']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

    // Se inserta un nuevo registro en la tabla usuarios
    $consulta = "INSERT INTO usuarios (idTipo, Nombre, Email, Contraseña) VALUES ('$idTipo', '$nombre', '$email', '$contraseña')";
    mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

    // Se muestra un mensaje de éxito y se redirige a la página de administración
    $_SESSION['mensaje'] = "Usuario agregado exitosamente";
    header("Location: index.php");
  }
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Agregar usuario</title>
  </head>
  <body>
    <div class="container mt-5">
      <h1>Agregar usuario</h1>
      <form action="./index.php" method="post">
        <div class="form-group">
          <label for="idTipo">Tipo</label>
          <input type="number" class="form-control" id="idTipo" name="idTipo" required>
        </div>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="contraseña">Contraseña</label>
          <input type="password" class="form-control" id="contraseña" name="contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary" name="agregar">Agregar</button>
      </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
