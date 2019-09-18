<?php
  $datosregistracion = [];
  include "validar.php";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Registracion</title>
  </head>
  <body>
    <header  class="main-header">
      <img  ="logo" src="images/logo.png" alt="logotipo" class="logo">
    </header>

    <main>
      <section class="form-container">
      <h1>Registrate</h1>
      
      <form action="Home.php" method="POST">
        <div class="field-group">
          <label for="username">Nombre de Usuario</label>
          <input type="text" name="username" maxlength="15" required><br>
        </div>

        <div class="field-group">
          <label for="email">Email</label>
          <input type="email" name="email" required><br>
        </div>

        <div class="field-group">
          <label for="password">Contraseña</label>
          <input type="password" name="password" value="" required><br>
        </div>

        <div class="field-group">
          <label for="retypepassword">Confirmar Contraseña</label>
          <input type="password" name="retypepassword" value="" required><br>
        </div>

        <br>
        <input type="checkbox" id="tyc" name="tyc" value="yes" required>
        <label for="tyc">Acepto los términos y condiciones.</label><br>
        <br>
        <button type="submit"><strong>Registrarme</strong></button>
        <button type="reset"><img src="" alt=""><strong>Cancelar</strong></button>

          </form>
      </section>

    </main>
  </body>
</html>
