<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$cod_est=$_POST['cod'];

	$sql = "DELETE FROM inscripciones WHERE cod_est='$cod_est'";	
	$result= pg_query($sql);


	$_SESSION['cur']=$cur;
	$_SESSION['year']=$year;
	$_SESSION['periodo']=$periodo;
	header("location: Estudiantes_Inscritos.php");



?>
