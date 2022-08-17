<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$descripcion=$_POST['desc'];
$porcentaje=$_POST['porc'];
$posicion=$_POST['posicion'];



$sql = "select * from notas where cod_cur in (select cod_cur from cursos where nomb_cur='$cur') and year='$year' and periodo='$periodo' and posicion='$posicion';";
$consulta=pg_query($sql);
$cantidad=pg_num_rows($consulta);
$sql1 = "select sum(porcentaje) from notas where cod_cur in (select cod_cur from cursos where nomb_cur='$cur') and year='$year' and periodo='$periodo';";
$consulta1=pg_query($sql1);
$row = pg_fetch_array($consulta1);
$sum = $row[0];
$total = $sum+$porcentaje;
echo "<h1>$total</h1>";
echo "<h1>$cantidad</h1>";
if($cantidad>0){
	$_SESSION['nombre_usuario']=$usuario;
	header("location: Adiccion_Actuaizacionerror.php");
}




//$row = pg_fetch_array($sql);

else if($total>100){
	$_SESSION['nombre_usuario']=$usuario;
	header("location: Adiccion_Actuaizacionerror.php");
}

else{
$result = pg_query("select cod_cur from cursos where nomb_cur='$cur'");
$row = pg_fetch_array($result);
$cod_cur = $row[0];


	$sql = "INSERT INTO notas (desc_nota, porcentaje, posicion, cod_cur, year, periodo) VALUES ('$descripcion', '$porcentaje', '$posicion', '$cod_cur', '$year', '$periodo');";	
	$result= pg_query($sql);

	$_SESSION['cur']=$cur;
	$_SESSION['year']=$year;
	$_SESSION['periodo']=$periodo;
	header("location: Adiccion_Actualizacion.php");
}


?>
