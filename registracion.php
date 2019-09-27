<?php

  $titulo = "SJB | Registrarme";

  require_once("funciones.php");

  $errores = [];
  $nombreOk = "";
  $apellidoOk = "";
  $emailOk = "";

  if($_POST){
    $errores = validarRegistro($_POST);
    //var_dump($_POST, $errores);

    $nombreOk = trim($_POST['nombre']);
    $apellidoOk = trim($_POST['apellido']);
    $emailOk = trim($_POST['email']);


  if(!$errores){
      $usuario = crearUsuario();
      guardarUsuario($usuario);

      // var_dump($_FILES);
      // exit;
      $ext = pathinfo($_FILES["avatar"]['name'], PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["avatar"]['tmp_name'], "avatar/". $_POST['nombre']. $_POST['apellido']. "." . $ext);

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

        <form action="registracion.php" method="POST">
          <div class="field-group">
            <label for="nombre">Nombre</label>
            <?php  if(!isset($errores['nombre'])): ?>
              <input type="text" id="nombre" name="nombre" value="<?= $nombreOk ?>">
            <?php else: ?>
              <input type="text" id="nombre" name="nombre" value="">
            <?php endif ?>
            <small id="emailHelp" class="mensaje_error">
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
            <small id="emailHelp" class="mensaje_error">
              <?php if(isset($errores['apellido'])) :?>
                <?= $errores['apellido'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="field-group">
            <label for="email">Email</label>
            <?php  if(!isset($errores['apellido'])): ?>
              <input type="email" id="email" name="email" value="<?= $emailOk ?>">
            <?php else: ?>
              <input type="email" id="email" name="email" value="">
            <?php endif ?>
            <small id="emailHelp">
              <?php if(isset($errores['email'])) :?>
                <?= $errores['email'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="field-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="">
            <small id="emailHelp">
              <?php if(isset($errores['password'])) :?>
                <?= $errores['password'] ?>
              <?php endif ?>
            </small>
          </div>

          <div class="field-group">
            <label for="retypepassword">Confirmar Contraseña</label>
            <input type="password" name="retypepassword" value=""><br>
            <small id="emailHelp">
              <?php if(isset($errores['retypepassword'])) :?>
                <?= $errores['retypepassword'] ?>
              <?php endif ?>
            </small>
          </div>

          <br>
          <input type="checkbox" id="tyc" name="tyc" value="yes" required>
          <label for="tyc">Acepto los términos y condiciones.</label><br>
          <small id="emailHelp">
            <?php if(isset($errores['tyc'])) :?>
              <?= $errores['tyc'] ?>
            <?php endif ?>
           </small>
          <br>
          <button type="submit"><strong>Registrarme</strong></button>
          <a href="Home.php">Cancelar</a>
          <a href="login.php">Login</a>


        </form>
      </section>

    </main>
  </body>
</html>
