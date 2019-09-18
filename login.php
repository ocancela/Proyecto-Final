<?php
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">
		<title>Comunidad | Login</title>
	</head>
	<body>
		<div class=""form-container""> <!-- Contenedor ppal -->
			<header> <!-- Encabezadp -->
				<nav class="main-nav">
					<a href="index.html"> <img  ="logo" src="images/logo.png" alt="logotipo" class="logo"></a>
					<ul class="menu">
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Tablets</a></li>
						<li><a href="#">Computadoras</a></li>
					</ul>
					<ul class="menu access">
						<li><a href="login.html">login</a></li>
						<li><a href="register.html">registro</a></li>
					</ul>
				</nav>
			</header>
			<main> <!-- Cuerpo principal del sitio -->
				<section class="form-container">
					<h1>Bienvenido</h1>
					<form class="access-form" action="" method="get">
						<div class="field-group">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" placeholder="Email" value="" required>
						</div>
						<div class="field-group">
							<label for="password">Contraseña</label>
							<input type="password" id="passsword" name="password" placeholder="password" value="" required>
						</div>
						<div class="field-group remember-me">
							<input type="checkbox" id="remember-me" name="remember-me" value="">
							<label for="remember-me">Recordarme</label>
						</div>
						<p class="form-text alert-hide">
							La combinación ingresada de email y contraseña no es válida.
						</p>
						<button type="submit" name="send">Ingresar</button>
					</form>
				</section>
			</main>
		</div>

	</body>
</html>
