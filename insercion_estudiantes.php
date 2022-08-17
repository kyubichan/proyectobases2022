<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];

$_SESSION['cur']=$cur;
$_SESSION['year']=$year;
$_SESSION['periodo']=$periodo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripcion de estudiantes</title>
    <link rel="stylesheet" href="css/Insercion_estudiantes.css">
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
        <nav class="subtitle">
        <?php
            echo "<h1>CURSO: $cur</h1>"
            ?>
        </nav>
    </div>

  
    <table class="table">

        <tr>

            <th  id="title_table" style= "height:60px;"  colspan="3">
		<?php
                	echo "<nav id=curso_docentes>Inscripción año $year periodo $periodo</nav>";
		?>

            </th>


        </tr>

        <tr>

            <th id="subtitle_table" style="height:60px" colspan="3">


            <div class="total">


                <div id="imagen">
			<a href='Estudiantes_Inscritos.php'> <button><img src="imagenes/flechaback.png"></im></button></a>                    
                </div>

                <div id="text_imagen"><h1>Estudiante</h1></div> 

                
            </div>
                
		
            </th>

        </tr>

        <tr>

            <th>

           <!-- Dentro del Div Contenido Tabla debes agregar todo --> 

                <div id="contenido_tabla">     
                    
                <table class="registro">

                        <tr id="registro_uno">
                            
                			<td scope="col">No.</td>
                			<td scope="col">Codigo</td>
                			<td scope="col">Nombres</td>
                			<td></td>
                				
                		</tr>

                        <tr>

                            <?php
                            $sql = "select cod_est, nomb_est from estudiantes where cod_est not in (select cod_est from inscripciones where cod_cur in(select cod_cur from cursos where nomb_cur='$cur') and year='$year' and periodo='$periodo') order by cod_est";
                            $obj = pg_query($sql);
                            $i=0;
                            while ($fila = pg_fetch_array($obj)){
                            $i++;
                            ?> 

                			<td scope="col"><?=$i?></td>
                			<form action="inser_est_cur.php" method="POST">		        			
		        			<td scope="col"><?=$fila[0]?></td>
						    <input type="hidden" name="cod" value="<?=$fila['0']?>">
		        			<td name="nomb" scope="col"><?=$fila[1]?></td>
		        			<td><button class="edicion" type="submit" >Insertar</button></th>

					        </form>		

                		</tr>
                        
                		<?php
                		}
                		?>


                </table>
                		 
                		              		                		
            			
                </div>

            </th>


        </tr>

    </table>

    
    
    
</body>
</html>
