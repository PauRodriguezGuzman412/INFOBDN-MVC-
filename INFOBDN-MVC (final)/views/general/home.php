<link rel="stylesheet" href="css/index.css">
<?php
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol']=='admin'){
            ?>
            <div class="a1">
                <a class="admin" href="index.php?controller=admin&action=AdminProfesor">Ver listado de profesores</a>
                <a class="admin" href="index.php?controller=admin&action=AdminCurso">Ver listado de cursos</a>
            </div>
            <?php
        }

        if($_SESSION['rol']=='alumno'){
            echo "<div class='profetotal'>";
            if($llista){
                echo "<div class='CursosTotal'>";
                foreach($llista as $clave => $valor){
                    if($valor['activo']==1){
                        echo "<div class='CursosTotal2'>";
                            echo $valor['Nom']."<br>";
                            echo "</div>";
                        }
                    }
                echo "</div>";
            }
            ?>

            <div class='cursosProfe'>
                <p class="texto">Usuario <?php echo($_SESSION['NombreHeader'])  ?>, <br>Cursos en los que estás inscrito:</p>
                <?php
                if(!isset($llista1[0])){
                    echo "<br>NO estás inscrito en ningún curso";
                }else{
                        echo "<br>";
                        echo "<table class='tabla'>";
                        foreach($llista1 as $clave1 => $valor1){
                            if($valor1['activo']==1){
                                echo "<tr class='tabla'>";
                                echo "<td class='tabla'>".$valor1['Nom']." </td>";
                                echo "<td class='tabla'>".$valor1['Data_inici']." </td>";
                                echo "<td class='tabla'>".$valor1['Data_final']."<br></td>";
                                echo "</tr>";
                            }
                        echo "</table>";
                    }
                }
                echo "</div>";
                ?>
            </div>
            <?php
        }
        if($_SESSION['rol']=='profesor'){
            echo "<div class='profetotal'>";
            if($llista){
                echo "<div class='CursosTotal'>";
                foreach($llista as $clave => $valor){
                    if($valor['activo']==1){
                        echo "<div class='CursosTotal2'>";
                        echo $valor['Nom'];
                        echo "</div>";
                    }
                }
                echo "</div>";
            }
            ?>
                <div class='cursosProfe'>
                    <p class="texto">Usuario <?php echo($_SESSION['NombreHeader']) ?>, <br>Cursos en los que eres profesor:<br></p>
                    <?php
                    if(!isset($llista1[0])){
                        echo "<br>NO estás inscrito en ningún curso";
                    }else{
                        echo "<br>";
                        echo "<table class='tabla'>";
                        foreach($llista1 as $clave1 => $valor1){
                            if($valor1['activo']==1){

                            echo "<tr class='tabla'>";
                            foreach($valor1 as $clave2 => $valor2){
                                echo "<td class='tabla'>".$valor2."</td>";
                            }
                            echo "";
                            echo "<td style='background-color: white'><a class='blanco' href='index.php?controller=professor&action=ShowCourseWithMarks&id=".$valor1['Codi']."'>Detalles</a></td>";
                            echo "</tr>";
                            }
                        }
                        echo "</table>";
                    }
                    ?>
                </div> 
            <?php
            echo "</div>";
        }
    }
?>
<footer>
    <a href="index.php?controller=admin&action=SignInAdmin">Configuración</a>
</footer>