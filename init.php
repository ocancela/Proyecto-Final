<?php
//Todo lo necesario para instanciar clases.

include "clases/dbjson.php";
include "clases/usuario.php";
include "clases/auth.php";
include "clases/validador.php";

$data = "usuarios.json";
$auth = new Auth;
$json = new DbJson($data);
