<?php

  $titulo = "SJB | Registrarme";

  require_once("init.php");

  if($auth->usuarioLogueado()){
    header("Location:Home.php");
    exit;
  }

  $errores = [];
  $nombreOk = "";
  $apellidoOk = "";
  $emailOk = "";


  if($_POST){
    $errores = Validador::validarRegistro($_POST);


    $nombreOk = trim($_POST['nombre']);
    $apellidoOk = trim($_POST['apellido']);
    $emailOk = trim($_POST['email']);


  if(!$errores){

      $usuario= new Usuario($_POST);

      $json->guardarUsuario($usuario);

      $ext = pathinfo($_FILES["avatar"]['name'], PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["avatar"]['tmp_name'], "avatar/". $_POST['nombre']. $_POST['apellido']. "." . $ext);

      $auth->loguearUsuario($_POST['email']);

      header("Location:Home.php");
      exit;
    }

  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once("head.php") ?>

  <body>
    <header  class="main-header">
      <img  ="logo" src="images/logo.png" alt="logotipo" class="logo">
    </header>

    <main>
      <section class="form-container">
      <h1>Registrate</h1>

        <form action="registracion.php" method="POST" enctype="multipart/form-data">
          <div class="field-group">
            <label for="nombre">Nombre</label>
            <?php  if(!isset($errores['nombre'])): ?>
              <input type="text" id="nombre" name="nombre" value="<?= $nombreOk ?>">
            <?php else: ?>
              <input type="text" id="nombre" name="nombre" value="">
            <?php endif ?>
            <small id="emailHelp" class="form-text text-danger">
              <?php if(isset($errores['nombre'])) :?>
                <?= $errores['nombre'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="field-group">
            <label for="apellido">Apellido</label>
            <?php  if(!isset($errores['apellido'])): ?>
              <input type="text" id="apellido" name="apellido" value="<?= $apellidoOk ?>">
            <?php else: ?>
              <input type="text" id="apellido" name="apellido" value="">
            <?php endif ?>
            <small id="emailHelp" class="form-text text-danger">
              <?php if(isset($errores['apellido'])) :?>
                <?= $errores['apellido'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="field-group">
            <label for="email">Email</label>
            <?php  if(!isset($errores['email'])): ?>
              <input type="email" id="email" name="email" value="<?= $emailOk ?>">
            <?php else: ?>
              <input type="email" id="email" name="email" value="">
            <?php endif ?>
            <small id="emailHelp" class="form-text text-danger">
              <?php if(isset($errores['email'])) :?>
                <?= $errores['email'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="field-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="">
            <small id="emailHelp" class="form-text text-danger">
              <?php if(isset($errores['password'])) :?>
                <?= $errores['password'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="field-group">
            <label for="retypepassword">Confirmar Contraseña</label>
            <input type="password" name="retypepassword" value=""><br>
            <small id="emailHelp" class="form-text text-danger">
              <?php if(isset($errores['retypepassword'])) :?>
                <?= $errores['retypepassword'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="field-group">
            <label for="avatar">Imagen de perfil</label>
            <input name="avatar" type="file" id="avatar" class="form-control-file">
            <small id="emailHelp" class="form-text text-danger">
              <?php if(isset($errores['avatar'])) :?>
                <?= $errores['avatar'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="form-check">
            <?php if(isset($_POST['tyc'])): ?>
                <input type="checkbox" class="form-check-input" name="tyc" id="tyc" value="tyc" checked>
            <?php else: ?>
              <input type="checkbox" class="form-check-input" name="tyc" id="tyc" value="tyc" >
            <?php endif ?>
            <label for="tyc" class="form-check-label">Acepto los términos y condiciones.</label>
            <small id="emailHelp" class="form-text text-danger">
              <?php if(isset($errores['tyc'])) :?>
                <?= $errores['tyc'] ?>
              <?php endif ?>
             </small>
          </div>

          <button type="submit" class="btn btn-primary">Registrarme</button>
          <a class="btn btn-success float-right" href="login.php">Login</a>
          <a class="btn btn-outline-secondary float-right" href="Home.php">Cancelar</a>

        </form>
      </section>

    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
