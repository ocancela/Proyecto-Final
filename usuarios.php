<?php
//require_once "funciones.php";
require_once("init.php");


if(!usuarioLogueado()){
  header("Location:Home.php");
  exit;
}

if(isset($_COOKIE['email'])){
  //Si está seteada la cookie es porque el usuario tildó recordarme. Vamos a loguerarlo desde la cookie.
  loguearUsuario($_COOKIE['email']);
}

if (usuarioLogueado()) {
  $usuario = buscarUsuarioPorEmail($_SESSION['email']);
  $usuarios = $json->usuariosRegistrados();

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

 <?php require_once("head.php") ?>

  <body>
    <div class="container">
      <h1>Lista de usuarios registrados</h1>
      <div class="d-flex justify-content-between">
        <?php if(!usuarioLogueado()): ?>
          <a class="btn btn-success" href="login.php">Login</a>
          <a class="btn btn-warning" href="registracion.php">Registrarse</a>
        <?php else: ?>
          <div class="">
            <img class="avatar" src="avatar/<?= $usuario['nombre'] ?>.jpg" alt="<?= $usuario['nombre'] ?>">
            <span>Hola: <?= $usuario['nombre'] ?></span>
          </div>
          <div class="">
            <a href="Home.php">Home</a>
            <a class="btn btn-danger" href="logout.php">Logout</a>
          </div>
        <?php endif ?>
      </div>

      <h2>Lista</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">nombre</th>
            <th scope="col">apellido</th>
            <th scope="col">email</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr>nombre
              <th scope="row"><?= $usuario['id']?></th>
              <td><?= $usuario['nombre']?></td>
              <td><?= $usuario['apellido']?></td>
              <td><?= $usuario['email']?></td>
              <td>
                <a class="btn btn-warning" href="#">editar</a>
              </td>
            </tr>
          <?php endforeach ?>


        </tbody>
      </table>

    </div>



    <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
