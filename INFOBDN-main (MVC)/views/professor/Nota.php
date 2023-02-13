<link href="Nota.css" rel="stylesheet" type="text/css">
<div class="content">
<?php
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol']=='profesor'){
            if(isset($llista)){
                echo "<table border>";
                echo "<tr>";
                echo "<td>Alumnos</td>";
                echo "<td>Nota</td>";
                echo "<td>Poner nota</td>";
                echo "</tr>";
                foreach($llista as $clave1 => $valor1){
                    echo "<tr>";
                    echo "<td>".$valor1['Nom']."</td>";
                    echo "<td>".$valor1['Nota']."</td>";
                    if($valor1['Data_final']<date("Y-m-d")){
                        echo "<td><a href='index.php?controller=professor&action=ChangeMarksForm&Email=".$valor1['Email']."&id=".$valor1['Codi']."'>Poner Nota</a></td>";
                    }
                    else{
                        echo "<td>El curso no ha acabado todavía</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "No hay alumnos en este curso<br>";
            }
            
        }    
    }else{
        echo "No deberías estar aquí<br> ";
    }
?>
</div>
<a href="index.php?controller=professor&action=mostrarHome">Volver atrás</a>