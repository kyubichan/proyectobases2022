<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$nota=$_POST['nota'];

$_SESSION['cur']=$cur;
$_SESSION['year']=$year;
$_SESSION['periodo']=$periodo;
$_SESSION['nota']=$nota;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<center>
	<h1 class="miclase1"><i class="fad fa-user"></i>Actualizacion de nota</h1>
	<form action="edit_nota.php" method="POST">
		<input type="text" name="desc" placeholder="Descripcion de la nota">
		<br><br>
		<input type="number" name="porc" placeholder="Porcentaje de la nota">
		<br><br>
        <input type="number" name="pos" placeholder="Posicion de la nota">
		<br><br>
		<button type="submit" >Ingresar</button>
	</form>
	</center>

</body>
</html>