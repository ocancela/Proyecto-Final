<?php

  $titulo = "San Juan Bautista | Home";

  require_once("funciones.php");

  //var_dump($_SESSION); //Para ver que realmente está cargado el dato en sesión.

  if(isset($_COOKIE['email'])){
    //Si está seteada la cookie es porque el usuario tildó recordarme. Vamos a loguerarlo desde la cookie.
    loguearUsuario($_COOKIE['email']);
  }

  if (usuarioLogueado()) {
    $usuario = buscarUsuarioPorEmail($_SESSION['email']);  // code...
}

?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">

  <?php require_once("head.php") ?>

<body>
 <div class="contenedor">

   <header class="main-header">
     <img  class="logo" src="images/logo.png" alt="logotipo">
     <ul>
       <li><a href="login.php">Ingresar</a></li>
       <li><a href="registracion.php">Registrarse</a></li>
     </ul>
     <nav class="categorias">
       <ul>
         <li><a href="#">Trabajo</a></li>
         <li><a href="#">capacitación</a></li>
         <li><a href="#">Emprendimientos</a></li>
         <li><a href="#">Obtener Título</a></li>
         <li><a href="#">Recreación</a></li>
       </ul>
     </nav>
   </header>

  <section class="posteos">
    <article class="post">
      <h2>OFERTAS DE TRABAJO</h2>
      <div class="photo-container">
        <img class="photo" src="images/trabajo.jpg" alt="foto 01">
        <a class="more" href="#">ver más</a>
      </div>
      <p>Breve descripción del post.</p>
    </article>
    <article class="post">
      <h2>OFERTAS DE CAPACITACIÓN</h2>
      <div class="photo-container">
        <img class="photo" src="images/capacitacion.png" alt="foto 01">
        <a class="more" href="#">ver más</a>
      </div>
      <p>Breve descripción del post.</p>
    </article>
    <article class="post">
      <h2>OBTENER TÍTULO</h2>
      <div class="photo-container">
        <img class="photo" src="images/graduacion.jpg" alt="foto 01">
        <a class="more" href="#">ver más</a>
      </div>
      <p>Breve descripción del post.</p>
    </article>
    <article class="post">
      <h2>EMPRENDIMIENTOS</h2>
      <div class="photo-container">
        <img class="photo" src="images/emprendimiento.jpg" alt="foto 01">
        <a class="more" href="#">ver más</a>
      </div>
      <p>Breve descripción del post.</p>
    </article>
    <article class="post">
      <h2>RECREACIÓN</h2>
      <div class="photo-container">
        <img class="photo" src="images/entretenimiento.jpg" alt="foto 01">
        <a class="more" href="#">ver más</a>
      </div>
      <p>Breve descripción del post.</p>
    </article>

  </section>

   <footer>
     <nav class="main-footer">
       <img  class="logo-footer" src="images/logo-footer.png" alt="logotipo">
       <ul>
         <li><a href="#">Contacto</a></li>
         <li><a href="#">Quiero Ayudar</a></li>
       </ul>
     </nav>
   </footer>
</div>
</body>
</html>
