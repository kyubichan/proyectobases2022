<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$nota=$_POST['nota'];

	$sql = "DELETE FROM notas WHERE nota='$nota'";	
	$result= pg_query($sql);


	$_SESSION['cur']=$cur;
	$_SESSION['year']=$year;
	$_SESSION['periodo']=$periodo;
	header("location: Adiccion_Actualizacion.php");



?>
