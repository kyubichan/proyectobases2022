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
    <title>Adiccion y Actualizacion</title>
    <link rel="stylesheet" href="css/Adiccion_Actualizacion.css">
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

    <div class="titulo">
        <nav class="subtitle"><h1>CREAR NOTAS CURSO</h1></nav>
    </div>

  
    <table class="table">

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
                			<th scope="col">Posicion</th>
                			<th scope="col">Descripcion</th>
                			<th scope="col">Porcentajes</th>
                			<th></th>
                				
                		</tr> 
                		<?php
                		$sql = "select posicion, desc_nota, porcentaje, nota from notas where cod_cur in (select cod_cur from cursos where nomb_cur='$cur') and year='$year' and periodo='$periodo' order by posicion";
                		$obj = pg_query($sql);
                		$i=0;
                		while ($fila = pg_fetch_array($obj)){
                		$i++;
                		?>               		                		
                		<tr>
                			<th scope="col"><?=$fila[0]?></th>

                				

		        			<th scope="col"><?=$fila[1]?></th>

					        <th scope="col"><?=$fila[2]?></th>


		        			<form action="editar_nota.php" method="POST">
                            <input type="hidden" name="nota" value="<?php echo $fila['3']; ?>">
                            <td><button type="submit" >Editar</button></th>
                            </form>	

                            <form action="del_nota.php" method="POST">
                            <input type="hidden" name="nota" value="<?php echo $fila['3']; ?>">
                            <td><button type="submit" >Borrar</button></th>
                            </form>	

                            <form action="Registro_Actualizacion.php" method="POST">
                            <input type="hidden" name="nota" value="<?php echo $fila['3']; ?>">
                            <td><button type="submit" >Registrar</button></th>
                            </form>	
					        	
                		</tr>
                		
                		<?php
                		}
                		?>
                </div>

            </th>


        </tr>

    </table>
    <br>
    <center>
    <h3>Error al insertar la nota</h3>
    </center>
    <footer>

    <div id="Notita">

    <nav class="subtitle">
        <h1>AQUI PUEDE ADICIONAR, ACTUALIZAR O ELIMINAR LA DESCRIPCION DE LAS NOTAS DE UN CURSO, ADEMAS PUEDE REGISTRAR LOS VALORES DE CADA NOTA. LA POSICION INDICA EL ORDEN DE APARICION EN LA PANTALLA</h1>
    </nav>

    </div>
    
    

    </footer>
    <div class="caja_padre">

    <div class="caja_hijo_uno"><a href='cursos.php'><button href="#" type="submit" class="boton_uno" >Salir</button></a></div>

    <div class="caja_hijo_dos"><a href='Estudiantes_Inscritos.php'><button href="#" type="submit" class="boton_uno" >Estudiantes inscritos</button></a></div>

    <div class="caja_hijo_dos"><a href='Reporte_Notas.php'><button href="#" type="submit" class="boton_uno" >Reporte de notas</button></a></div>


    </div> 
    
    
    
</body>
</html>