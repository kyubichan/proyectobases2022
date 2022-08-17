<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$nota=$_SESSION['nota'];
$_SESSION['cur']=$cur;
$_SESSION['year']=$year;
$_SESSION['periodo']=$periodo;
$_SESSION['nota']=$nota;
$cal=$_POST['calificacion'];
$cod_cal=$_POST['cod_cal'];
echo "<h1>$cal</h1>";
echo "<h1>$cod_cal</h1>";


if($cal>5){
	header("location: Registro_Actualizacion.php");
}


else if($cal<0){
	header("location: Registro_Actualizacion.php");
}


else{

	$sql = "update calificaciones set valor='$cal' where cod_cal='$cod_cal';";	
	$result= pg_query($sql);

	header("location: Registro_Actualizacion.php");
}


?>

