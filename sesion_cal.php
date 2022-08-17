<?php
require 'conexion.php';
//$conexion = pg_connect("host=localhost dbname=proyecto user=postgres password=postgres");
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$nota=$_SESSION['nota'];
$nota=$_POST['nota'];

$_SESSION['cur']=$cur;
$_SESSION['year']=$year;
$_SESSION['periodo']=$periodo;
$_SESSION['nota']=$nota;

	header("location: Registro_Actualizacion.php");



?>

