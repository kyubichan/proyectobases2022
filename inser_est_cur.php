<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$cod_est=$_POST['cod'];
$result = pg_query("select cod_cur from cursos where nomb_cur='$cur'");
$row = pg_fetch_array($result);
$cod_cur = $row[0];
echo "<h1>$cod_est</h1>";
echo "<h1>$periodo</h1>";
echo "<h1>$year</h1>";
echo "<h1>$cod_cur</h1>";





	$sql = "INSERT INTO inscripciones (cod_cur, cod_est, year, periodo) VALUES ('$cod_cur', '$cod_est', '$year', '$periodo');";	
	$result= pg_query($sql);

	$_SESSION['cur']=$cur;
	$_SESSION['year']=$year;
	$_SESSION['periodo']=$periodo;
	header("location: insercion_estudiantes.php");



?>
