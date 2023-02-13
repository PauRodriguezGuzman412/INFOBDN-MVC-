<link href="CursosDisponibles.css" rel="stylesheet" type="text/css">
<?php
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol']=='alumno'){
            ?>
            <div>
                <?php
                if(!isset($llista1[0])){
                    echo "<br>NO estás inscrito en ningún curso";
                }else{
                    foreach($llista1 as $clave1 => $valor1){
                        if($valor1['activo']==1){
                            echo "<div class='divGeneral'>";
                            echo "<div class='name'>".$valor1['Nom']."</div>";
                            echo "<div class='details'>";
                                echo "Duración: ".$valor1['Data_inici']." - ".$valor1['Data_final']."<br>";
                                foreach($llista2 as $clave2 => $valor2){
                                    if($valor1['Codi']==$valor2['Codi']){
                                        echo "Profesor que imparte el curso: ".$valor2['Nom']."<br>";
                                    }
                                }
                            echo "</div>";
                            echo "<div class='link'>";
                                if($llista1[$clave1]['Data_inici']>date("Y-m-d")){
                                    $id= 'si';
                                    echo "<br><a href='index.php?controller=student&action=Matricularse&id=".$id."&email=".$_SESSION['email']."&valor=".$valor1['Codi']."'>Darse de alta</a>";
                                }
                                else{
                                    echo "El curso ya ha empezado";
                                }
                            echo "</div>";
                            echo "</div>";                               
                        }
                    }
                }
                ?>
            </div>
            <?php
        }
    }
?>