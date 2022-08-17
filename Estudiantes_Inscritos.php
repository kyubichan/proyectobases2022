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

        <tr class="registro_uno">

            <th  id="title_table" style= "height:60px;"  colspan="3">

                <nav id="curso_docentes">ESTUDIANTES INSCRITOS</nav>


            </th>


        </tr>

        <tr>

            <td id="subtitle_table" style="height:60px" colspan="3">


            <div class="total">


                <div id="imagen">
                    <a href='insercion_estudiantes.php'> <button><img src="imagenes/agregar.png"></im></button></a>
                </div>

                <div id="text_imagen"><h1>Estudiante</h1></div> 

                
            </div>
                
		
            </td>

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
                			<td scope="col"></td>

                				
                		</tr> 

                    <tr>

                                <?php
                                $sql = "select cod_est, nomb_est from estudiantes where cod_est in (select cod_est from inscripciones where cod_cur in(select cod_cur from cursos where nomb_cur='$cur') and year='$year' and periodo='$periodo')";
                                $obj = pg_query($sql);
                                $i=0;
                                while ($fila = pg_fetch_array($obj)){
                                $i++;
                                ?>   

                                <td scope="col"><?=$i?></td>
                                <form action="del_est_cur.php" method="POST">		        			
                                <td scope="col"><?=$fila[0]?></td>
                                <input type="hidden" name="cod" value="<?=$fila['0']?>">
                                <td name="nomb" scope="col"><?=$fila[1]?></td>
                                <td><button class="edicion" type="submit" >Eiminar</button></td>      
                 

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

    <div class="caja_padre">

    <div class="caja_hijo_uno"><a href='cursos.php'><button href="#" type="submit" class="boton_uno" >Salir</button></a></div>

    <div class="caja_hijo_dos"><a href='Adiccion_Actualizacion.php'><button href="#" type="submit" class="boton_uno" >Editar Notas</button></a></div>

    

    
    </div> 
 
</body>
</html>
