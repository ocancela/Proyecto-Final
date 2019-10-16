<?php
session_start();

/* validar la registracion */
function validarRegistro($datos){
	$errores = [];
	$datosfinales = [];

  foreach($datos as $key => $value){
    if($key == "email"){
      $datosFinales[$key] = trim($value);
    }else{
      $datosFinales[$key] = $value;
    }
  }

	// Validar nombre
	if(strlen($datosFinales['nombre']) == 0){
	  $errores['nombre'] = "El campo es obligatorio.";
	} else if( !ctype_alpha($datosFinales['nombre'])){
	  $errores['nombre'] = "Por favor ingrese caracteres alfabéticos.";
	}

	// Validar apellido
	if(strlen($datosFinales['apellido']) == 0){
	  $errores['apellido'] = "El campo es obligatorio.";
	} else if( !ctype_alpha($datosFinales['apellido'])){
	  $errores['apellido'] = "Por favor ingrese caracteres alfabéticos.";
	}

	//validar email
	if(strlen($datosFinales['email']) == 0){
	  $errores['email'] = "El campo es obligatorio.";
	} else if(!filter_var($datosFinales['email'], FILTER_VALIDATE_EMAIL)){
	  $errores['email'] = "Por favor ingrese un email en formato correcto.";
	}  else if( existeUsuario($datosFinales['email']) ){
	   $errores['email'] = "El email ya se encuentra registrado.";
	 }

 	//validar contraseña
  if(strlen($datosFinales['password']) == 0){
    $errores['password'] = "El campo es obligatorio.";
  } else if(strlen($datosFinales['password']) < 8){
    $errores['password'] = "La contraseña debe tener al menos 8 caracteres.";
  }

   //Validar retypePassword
   if(strlen($datosFinales['retypepassword']) == 0){
     $errores['retypepassword'] = "El campo es obligatorio.";
   } else if($datosFinales['password'] !== $datosFinales['retypepassword']){
      $errores['retypepassword'] = "Las contraseñas no coinciden";
    }

    //Validar TYC
    if(!isset($datosFinales['tyc'])){
      $errores['tyc'] = "Por favor acepte los términos y condiciones.";
    }

    //Validar errores en la carga de la imagen de perfil.
    if(strlen($_FILES['avatar']['name']) == 0){
      $errores['avatar'] = "Por favor suba una imagen de perfil.";
    } else {
      $ext = pathinfo($_FILES["avatar"]['name'], PATHINFO_EXTENSION);

      if($ext !== "jpg" && $ext !== "png" && $ext !== "jpeg"){
        $errores['avatar'] = "El archivo debe ser una imagen de tipo .jpg, .jpeg, .png";
      }
		}

  return $errores;
}

// Buscar siguiente numero de id
function nextId(){
  $json = file_get_contents("usuarios.json");
  $usuarios = json_decode($json, true);

  $lastUser = array_pop($usuarios['usuarios']);
  $lastId = $lastUser['id'];

  return $lastId + 1;
}

// Funcion para Crear el usuario
function crearUsuario(){
  return [
    "id" => nextId(), //tenemos que autoincrementar el nº
		"nombre" => trim($_POST['nombre']),
		"apellido" => trim($_POST['apellido']),
    "email" => trim($_POST['email']),
    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
  ];
}

// Funcion para Guardar el usuario en el archivo json
function guardarUsuario($user){
  $json = file_get_contents("usuarios.json");
  $usuarios = json_decode($json, true);
  $usuarios['usuarios'][] = $user;

  $json = json_encode($usuarios, JSON_PRETTY_PRINT);
  file_put_contents("usuarios.json", $json);
}

// Funcion para buscar un usuario por email
function buscarUsuarioPorEmail($email){
  $json = file_get_contents("usuarios.json");
  $usuarios = json_decode($json, true);

  foreach ($usuarios['usuarios'] as $usuario) {
    if($usuario['email']=== $email){
      return $usuario;
    }
  }
  return null;
}

// Funcion que retorna el usuario encontrado
function existeUsuario($email){
  return buscarUsuarioPorEmail($email) !== null;
}

// Funcion que valida los datos del LOGIN
function validarLogin($datos){
  $errores = [];
  //validar email
  if(strlen($datos['email']) == 0){
    $errores['email'] = "El campo es obligatorio.";
  } else if(!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)){
    $errores['email'] = "Por favor ingrese un email en formato correcto.";
  } else if( !existeUsuario($datos['email']) ){
    $errores['email'] = "El email no se encuentra registrado.";
   }

 //validar contraseña
  if(strlen($datos['password']) == 0){
    $errores['password'] = "El campo es obligatorio.";
  } else {
    $usuario = buscarUsuarioPorEmail($datos['email']);
    if( !password_verify($datos['password'], $usuario['password']) ){
    $errores['password'] = "La contraseña es incorrecta.";
    }
  }
  return $errores;
}

// Funcion que hace login del usuario que ingreso
function loguearUsuario($email){
  $_SESSION['email'] = $email; //Nos falta iniciar la sesión. Colocamos session_start() al inicio de este archivo.

  if(isset($_POST['rememberMe'])){
    //Si el usuario tildó "recordarme" vamos a crear la cookie y guardar su email.
    setcookie("email", $email, time()+ 60 * 60);
  }
}

// Funcion que devuelve true o false segun el usuario se haya o no logueado
function usuarioLogueado(){
  return isset($_SESSION['email']);
}

// Funcion que carga en un array de usuarios todos los usuario guardados en el json
function usuariosRegistrados(){
  $json = file_get_contents("usuarios.json");
  $data = json_decode($json, true);
  $usuarios = $data['usuarios'];
  return $usuarios;
}



?>
