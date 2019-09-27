<?php

  $titulo = "SJB | Login";
  $datosregistracion = [];
  require_once("funciones.php");

  if($_POST){
    $errores = validarLogin($_POST);

    if(!$errores){
      loguearUsuario($_POST['email']); //Logueamos al usuario y lo mandamos logueado al home.

      header("Location:Home.php");
      exit; //Siempre después de una redirección.

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
      	<h1>Bienvenido</h1>

	      <form action="login.php" method="POST">

<!--     Login solo con Email asique saco el campo username

	        <div class="field-group">
	          <label for="username">Nombre de Usuario</label>
	          <input type="text" name="username" maxlength="15" required><br>
	        </div>  -->

	        <div class="field-group">
	          <label for="email">Email</label>
            <?php  if(!isset($errores['email'])): ?>
              <input type="email" id="email" name="email" value="">
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
	          <input type="password" name="password" value=""><br>
	        </div>
					<br>
					<div class="field-group remember-me">
						<input type="checkbox" id="rememberMe" name="rememberMe" value="">
						<label for="rememberMe">Recordarme</label><br>
					</div>

					<button type="submit" name="send"><strong>Ingresar</strong></button>

	      </form>
	    </section>

    </main>
  </body>
</html>
