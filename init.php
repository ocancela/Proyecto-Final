<?php
//Todo lo necesario para instanciar clases.

require_once ("clases/db.php");
require_once ("clases/dbmysql.php");
require_once ("clases/dbjson.php");
require_once ("clases/usuario.php");
require_once ("clases/auth.php");
require_once ("clases/validador.php");

$data = "usuarios.json";
$auth = new Auth;
//$json = new DbJson($data);
//$db = new DbJson($data);
$db = new DbMysql();
