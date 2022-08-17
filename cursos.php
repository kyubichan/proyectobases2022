<?php

include_once("conexion.php");
session_start();
$usuario=$_SESSION['nombre_usuario'];
$result = pg_query("select nomb_doc from docentes where cod_doc='$usuario'");
$row = pg_fetch_array($result);
$nomb_usuario = $row[0];
echo "<h1>Bienvenido $nomb_usuario</h1>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccion de curso, año y periodo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header>
        <div class="contenedor">
            <nav class="header">
                
                    <h1>REGISTRO DE NOTAS</h1><br>
                    <h2 id="demo"></h2>

                            <script>

                            var fecha = new Date();
                            var month = fecha.getUTCMonth() + 1;
                            var day = fecha.getUTCDate() -1;
                            var year = fecha.getUTCFullYear();
                            document.getElementById("demo").innerHTML = day+"/"+month+"/"+year;

                            </script>
                 
                
            </nav>
        </div>
    </header>

  
    <div class="title">
        <nav class="subtitle"><h1>INFORMACION DOCENTES</h1></nav>
    </div>

  
    <table class="table">

        <tr>

            <th  id="title_table" style= "height:60px;"  colspan="3">

                <nav id="curso_docentes">CURSO DOCENTES</nav>


            </th>


        </tr>

        <tr>

            <th>

                <div id="contenido_tabla">
		<form action="sesion_est.php" method="POST">
                    <div id="cursos">Cursos</div>

                    <div class="select">

                        <select name="curso">

                            <option selected>-- Seleccione una materia --</option>
			    <?php
				$sql = "select nomb_cur from cursos where cod_doc='$usuario' group by nomb_cur";
				$query = pg_query($sql);
				while ($fila = pg_fetch_array($query)) {
			    ?>
                            <option><?=$fila[0]?></option>
                            <?php
                            }
                            ?>

                        </select>
                        <div class="select_arrow"></div>

                    </div>

                    <div id="Año">Año</div>

                    <div id="select_dos" class="select">

                        <select name="anio">

                            <option selected>-- Seleccione un año --</option>
                            <option>2022</option>
                            <option>2021</option>
                        </select>
                        <div class="select_arrow"></div>

                    </div>

                    <div id="Periodo">Periodo</div>

                    <div id="select_tres" class="select">

                        <select name="periodo">

                            <option selected>-- Seleccione un periodo --</option>
                            <option>Periodo I</option>
                            <option>Periodo II</option>
                            
                        </select>
                        <div class="select_arrow"></div>

                    </div>

                    <div class="boton"> 
                        <button href="#" type="submit" class="boton_uno" >Ver Listado</button>
                    </div>


		</form>
                </div>

                

            </th>


        </tr>

    </table>