<?php
require 'conexion.php';
/*$conexion = pg_connect("host=localhost dbname=proyecto user=postgres password=postgres");*/
session_start();
$usuario=$_POST['user'];
$clave=$_POST['pass'];
$query="select * from docentes where cod_doc='$usuario' and clave='$clave'";
$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
if($cantidad>0){
	$_SESSION['nombre_usuario']=$usuario;
	header("location: cursos.php");
}
else{
	header("location: indexerror.php");
}
?>
