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
    <header>

    </header>
    <main> <!-- Cuerpo principal del sitio -->
      <section class="form-container">

      <h1>Registrate</h1>
      <form action="Home.php" method="POST">
        Nombre:
        <input type="text" name="nombre" maxlength="50" required><br><br>
        Apellido:
        <input type="text" name="apellido" maxlength="50" required><br><br>
        Género:
        <input type="radio" name="genero" value="f">Femenino</input>
        <input type="radio" name="genero" value="m">Masculino</input><br><br>
        Fecha de Nacimiento:
        <input type="date" name="fechanac"><br><br>
        <br>
        Domicilio:
        <input type="text" name="nombre" maxlength="100"><br><br>
        Localidad:
        <select name="localidad">
            <option value="BE">Benavidez</option>
            <option value="GA">Garín</option>
            <option value="GA">Gral Pacheco</option>
            <option value="GA">La Paloma</option>
            <option value="GA">Las Tunas</option>
            <option value="MA">Malvinas Argentinas</option>
            <option value="PN">Pablo Nogues</option>
            <option value="RR" selected="selected">Ricardo Rojas</option>
        </select> <br><br>
        Celular:
        <input type="number" name="celular"><br>
        <br>
        Instituciones Parroquiales a las que perteneces/perteneciste:
          <br>
          <input type="checkbox" name="institucion" value="cam">Casa del Niño Amanecer</input><br>
          <input type="checkbox" name="institucion" value="spc">San Pedro Claver</input><br>
          <input type="checkbox" name="institucion" value="cai">CAI San Juan Bautista</input><br>
          <input type="checkbox" name="institucion" value="lyc">Casa de Jóvenes Levántate y Camina</input><br>
          <input type="checkbox" name="institucion" value="car">Cáritas</input><br>
          <input type="checkbox" name="institucion" value="mis">Grupo Misionero</input><br>
          <br>
        Educacion:
        <select name="educacion">
            <option value="sin-estudios">Sin estudios</option>
            <option value="primario">Primario Completo</option>
            <option value="secundario" selected="selected">Secundaria Completa</option>
            <option value="formacion-profesional">Formación profesional</option>
            <option value="universidad">Universidad</option>
        </select>
        <br><br>
        Tenés título:
          <input type="radio" name="titulo" value="si">Sí</input>
          <input type="radio" name="titulo" value="no">No</input>
          <input type="radio" name="titulo" value="tr">En trámite</input>
        <br><br>
        Profesión:
        <input type="text" name="profesion" maxlength="50"><br>
        <br>
        Áreas de Interés:
          <br>
          <input type="checkbox" name="interes" value="tr">Ofertas de Empleo</input><br>
          <input type="checkbox" name="interes"  value="cu">Cursos y Capacitaciones</input><br>
          <input type="checkbox" name="interes" value="em">Emprendimientos</input><br>
          <input type="checkbox" name="interes" value="ti">Obtener Título</input><br>
          <input type="checkbox" name="interes" value="ay">Quiero Ayudar</input><br>
          <input type="checkbox" name="interes" value="re">Recreación</input><br>
        <br>
        Dejanos tus comentarios:
        <textarea name="comentarios" rows="5" cols="40"></textarea>
        <br><br>
        <button type="submit"><strong>Registrarme</strong></button>
        <button type="reset"><img src="" alt=""><strong>Cancelar</strong></button>

      </form>
      </section>
    </main>
  </body>
</html>
