<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$descripcion=$_POST['desc'];
$porcentaje=$_POST['porc'];
$posicion=$_POST['pos'];
$nota=$_SESSION['nota'];


$sql = "select * from notas where cod_cur in (select cod_cur from cursos where nomb_cur='$cur') and year='$year' and periodo='$periodo' and posicion='$posicion' and nota<>'$nota'";
$consulta=pg_query($sql);
$cantidad=pg_num_rows($consulta);

$sql1 = "select sum(porcentaje) from notas where cod_cur in (select cod_cur from cursos where nomb_cur='$cur') and year='$year' and periodo='$periodo' and nota<>$nota;";
$consulta1=pg_query($sql1);
$row = pg_fetch_array($consulta1);
$sum = $row[0];
$total = $sum+$porcentaje;
echo "<h1>$total</h1>";
echo "<h1>$descripcion</h1>";

if($cantidad>0){
	$_SESSION['nombre_usuario']=$usuario;
	header("location: Adiccion_Actuaizacionerror.php");
}


else if($total>100){
	$_SESSION['nombre_usuario']=$usuario;
	header("location: Adiccion_Actuaizacionerror.php");
}


else{

	$sql = "update notas set porcentaje='$porcentaje' where nota='$nota';";	
	$result= pg_query($sql);

    $sql = "update notas set desc_nota='$descripcion' where nota='$nota';";	
	$result= pg_query($sql);

    $sql = "update notas set posicion='$posicion' where nota='$nota';";	
	$result= pg_query($sql);

	$_SESSION['cur']=$cur;
	$_SESSION['year']=$year;
	$_SESSION['periodo']=$periodo;
	header("location: Adiccion_Actualizacion.php");
}


?>

