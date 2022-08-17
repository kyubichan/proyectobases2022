<?php
$conexion=pg_connect("host=localhost dbname=pruebas user=postgres password=postgres");
if ($conexion){
        echo "exito";
}
else{
        echo "error";
}

$query = "SELECT * FROM clientes";
$conn =pg_connect("dbname=pruebas");
$query = pg_query($query);
while($row= pg_fetch_array($query,NULL,PGSQL_ASSOC)){ 
	echo "Codigo: ".$row['cod_cli']."<br/>"; 
	echo "Nombre: ".$row['nomb_cli']."<br/>"; 
}   
   
?>
<html>
<head>
</head>
<body background="#fdfdfd">
<h4>Holaaa mundo</h4>
</body>
</html>
