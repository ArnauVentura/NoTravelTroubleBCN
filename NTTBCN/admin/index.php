<?php
  // Conexión a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "nttbcn") or die(mysqli_error($conexion));

  // Obtiene todos los usuarios
  $consulta = "SELECT * FROM usuarios";
  $resultado = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
  $usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Administración</title>
  </head>
  <body>
    <div class="container mt-5">
      <h1>Usuarios</h1>
      <table class="table table-bordered table-striped" id="tablaUsuarios">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($usuarios as $usuario) {
              echo "
                <tr>
                  <td>{$usuario['idUsuario']}</td>
                  <td>{$usuario['idTipo']}</td>
                  <td>{$usuario['Nombre']}</td>
                  <td>{$usuario['Email']}</td>
                  <td>{$usuario['Contraseña']}</td>
                  <td>
                    <form action='modificar.php' method='post'>
                      <input type='hidden' name='idUsuario' value='{$usuario['idUsuario']}'>
                      <button class='btn btn-warning' type='submit'><i class='fas fa-edit'></i></button>
                    </form>
                    </td>
                    <td>
                      <form action='eliminar.php' method='post'>
                        <input type='hidden' name='idUsuario' value='{$usuario['idUsuario']}'>
                        <button class='btn btn-danger' type='submit'><i class='fas fa-trash-alt'></i></button>
                      </form>
                    </td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table>
        <a href="agregar.php" class="btn btn-primary mt-3">Agregar usuario</a>
      </div>
  
      <!-- Optional JavaScript -->
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
  </html>
  
