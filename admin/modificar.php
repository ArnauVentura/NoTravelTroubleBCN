<?php
  // Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "nttbcn");
  // Si se ha enviado el formulario
  if (isset($_POST['modificar'])) {
    // Se escaparán los caracteres especiales para evitar ataques de inyección SQL
    $idUsuario = mysqli_real_escape_string($conexion, $_POST['idUsuario']);
    $idTipo = mysqli_real_escape_string($conexion, $_POST['idTipo']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

    // Se actualiza el registro en la tabla usuarios
    $consulta = "UPDATE usuarios SET idTipo='$idTipo', Nombre='$nombre', Email='$email', Contraseña='$contraseña' WHERE idUsuario='$idUsuario'";
    mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

    // Se muestra un mensaje de éxito y se redirige a la página de administración
    $_SESSION['mensaje'] = "Usuario modificado exitosamente";
    header("Location: index.php");
  }

  // Si se ha enviado el ID del usuario a modificar a través de un campo oculto
  if (isset($_POST['idUsuario'])) {
    // Se escapa el ID para evitar ataques de inyección SQL
    $idUsuario = mysqli_real_escape_string($conexion, $_POST['idUsuario']);

    // Se obtiene el usuario de la base de datos
    $consulta = "SELECT * FROM usuarios WHERE idUsuario='$idUsuario'";
    $resultado = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    $usuario = mysqli_fetch_assoc($resultado);
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
    <div class="container mt-5">
      <h2>Modificar usuario</h2>
      <form method="post">
        <div class="form-group">
          <label for="idUsuario">ID de usuario</label>
          <input type="text" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="idTipo">Tipo de usuario</label>
          <select class="form-control" id="idTipo" name="idTipo">
            <option value="1" <?php if ($usuario['idTipo'] == 1) echo "selected"; ?>>Administrador</option>
            <option value="2" <?php if ($usuario['idTipo'] == 2) echo "selected"; ?>>Usuario</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Nombre">Nombre</label>
          <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $usuario['Nombre']; ?>">
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $usuario['Email']; ?>">
        </div>
        <div class="form-group">
          <label for="Contraseña">Contraseña</label>
          <input type="password" class="form-control" id="Contraseña" name="Contraseña" value="<?php echo $usuario['Contraseña']; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="modificar">Modificar</button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
