<link href="cursos.css" rel="stylesheet" type="text/css">           
<?php
    if($_SESSION['rol']=='profesor'){
        if(isset($llista)){
            foreach($llista as $clave){
                if($clave['activo']==1){
                    echo "<div class='divGeneral'>";
                        echo "<div class='name'>".$clave['Nom']."</div>";
                        echo "<div class='details'>";
                        echo "Descripcion: ".$clave['Descripcion']."<br>";
                        echo "Horas: ".$clave['Hores']."<br>";
                        echo "Duración: ".$clave['Data_inici']."_";
                        echo $clave['Data_final'];
                        echo "</div>";
                        echo "<div class='link'><a href='index.php?controller=professor&action=ShowCourseWithMarks&id=".$clave['Codi']."'>Detalles</a></div>";
                    echo "</div>";
                }
            } 
        }if(!isset($llista)){
            echo "No eres profesor de ningún curso";
        }
    }
?>