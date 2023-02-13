<link href="EditCurso.css" rel="stylesheet" type="text/css">
<form class='formulario' action="index.php?controller=curso&action=SignUp" method="POST" name="InicioSession">
    <?php
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol']=='admin'){
    ?>
    <h1>Registrar Curso</h1>
    <p>Nombre del curso: <input type="text" name="Nom" required></p>    
    <p>Descripción: <input type="text" name="Descripcion" required></p>    
    <p>Horas: <input type="number" name="Hores" required></p>
    <p>Data inicio: <input type="date" name="Data_inici" required></p>
    <p>Data final: <input type="date" name="Data_final" required></p>
    <p>
        <label for="Dni_Profesores">Profesor:
            <select name="Dni_Profesores" id="Dni_Profesores"> 
                <?php
                    for($i=0;$i<($result);$i++){
                        ?>                        
                        <option value="<?php print($array[$i]['DNI']) ?>"><?php print($array2[$i]['Nom']) ?></option>
                        <?php
                    }
                ?>
            </select>
        </label>
    </p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=admin&action=AdminCurso">Volver atrás</a>
<?php
        }else{
            echo"No deberías estar aquí";
        }
    }
?>