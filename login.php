<?php

  $titulo = "SJB | Login";
  $datosregistracion = [];
  require_once("funciones.php");

  if(usuarioLogueado()){
    header("Location:index.php");
    exit;
  }

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

	        <div class="field-group">
	          <label for="email">Email</label>
            <?php  if(!isset($errores['email'])): ?>
              <input type="email" id="email" name="email" value="">
            <?php else: ?>
              <input type="email" id="email" name="email" value="">
            <?php endif ?>
          <small id="emailHelp" class="form-text text-muted">
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

					<button type="submit" class="btn btn-primary" name="send"><strong>Ingresar</strong></button>
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
