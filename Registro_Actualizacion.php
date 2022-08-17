<?php
require 'conexion.php';
session_start();
$cur=$_SESSION['cur'];
$year=$_SESSION['year'];
$periodo=$_SESSION['periodo'];
$nota=$_SESSION['nota'];
$nota=$_SESSION['nota'];

$_SESSION['cur']=$cur;
$_SESSION['year']=$year;
$_SESSION['periodo']=$periodo;
$_SESSION['nota']=$nota

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Actualizacion</title>
    <link rel="stylesheet" href="css/Estudiantes_Inscritos.css">
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

                <nav id="curso_docentes">ESTUDIANTES INSCRITOS</nav>


            </th>


        </tr>

        <tr>

            <th id="subtitle_table" style="height:60px" colspan="3">


            <div class="total">


                <div id="imagen">
                    <a href='insercion_notas.php'> <button><img src="imagenes/mas.png"></im></button></a>
                </div>

                <div id="text_imagen"><h1>Notas</h1></div> 

                
            </div>
                

            </th>

        </tr>

        <tr>

            <th>

           <!-- Dentro del Div Contenido Tabla debes agregar todo --> 

                <div id="contenido_tabla">                		
                		<tr>
                            <th scope="col">Codigo</th>
                			<th scope="col">Nombre</th>
                			<th scope="col">Nota</th>
                			<th></th>
                				
                		</tr> 
                		<?php
                		$sql = "select c.cod_est, e.nomb_est, c.valor, c.cod_cal from calificaciones c, estudiantes e where c.cod_est=e.cod_est and c.cod_cur in (select cod_cur from cursos where nomb_cur='$cur') and c.year='$year' and c.periodo='$periodo' and c.nota='$nota'";
                		$obj = pg_query($sql);
                		$i=0;
                		while ($fila = pg_fetch_array($obj)){
                		$i++;
                		?>               		                		
                		<tr>
                			<th scope="col"><?=$fila[0]?></th>

                				

		        			<th scope="col"><?=$fila[1]?></th>
                           

                            <form action="edit_cal.php" method="POST">

                            <th scope="col"><input name="calificacion" value="<?php echo $fila['2']; ?>"></th>
                            <input type="hidden" name="cod_cal" value="<?php echo $fila['3']; ?>">
                            

                            <th scope="col"><button type="submit" >Actualizar</button></th>
                            </form>	
					        	
                		</tr>
                		
                		<?php
                		}
                		?>
                </div>

            </th>


        </tr>

    </table>
    
    <footer>
    
    

    </footer>
    <div class="caja_padre">

    <div class="caja_hijo_uno"><a href='Adiccion_Actualizacion.php'><button href="#" type="submit" class="boton_uno" >Atras</button></a></div>


    </div> 
   

  
  

   

    
    
    
</body>
</html>