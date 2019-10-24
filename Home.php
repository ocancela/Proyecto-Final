<?php

  $titulo = "San Juan Bautista | Home";

  //require_once("funciones.php");
  require_once("init.php");

  //var_dump($_SESSION); //Para ver que realmente está cargado el dato en sesión.

  if(isset($_COOKIE['email'])){
    //Si está seteada la cookie es porque el usuario tildó recordarme. Vamos a loguerarlo desde la cookie.
    $auth->loguearUsuario($_COOKIE['email']);
  }

  if ($auth->usuarioLogueado()) {
    $usuario = $json->buscarUsuarioPorEmail($_SESSION['email']);  // code...
}

?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">

  <?php require_once("head.php") ?>

<body>
 <div class="contenedor">

   <header class="main-header">
     <img  class="logo" src="images/logo.png" alt="logotipo">
   </header>

   <main class="main-header">

     <?php if(!$auth->usuarioLogueado()): ?>
       <div class="d-flex flex-row-reverse flex-wrap">
         <a class="btn btn-success" href="login.php">Login</a>
         <a class="btn btn-primary" href="registracion.php">Registrarse</a>
       </div>
       <img  class="banner-inicial" src="images/inicio.png">

       <?php else: ?>
         <div class="d-flex flex-row-reverse flex-wrap">
           <a class="btn btn-danger" href="logout.php">Logout</a>
           <img class="avatar" src="avatar/<?= $usuario->getNombre()?><?= $usuario->getApellido() ?>.jpg">
           <span>Hola <?= $usuario->getEmail() ?></span>
        </div>

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

          </section>
        <?php endif ?>

        </div>
        </div>

  </main>

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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
