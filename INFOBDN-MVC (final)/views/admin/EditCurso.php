<link href="css/EditCurso.css" rel="stylesheet" type="text/css">

<form class='formulario' action="index.php?controller=curso&action=updateCurso&curso=<?php echo$_GET['curso']?> " method="POST" name="InicioSession">
    <h1>Edit Curso</h1>
    <p>Nombre del curso: <input type="text" name="Nom" required value="<?php echo($row['Nom']); ?>"></p>    
    <p>Descripción: <input type="text" name="Descripcion" required value="<?php echo($row['Descripcion']); ?>"></p>    
    <p>Horas: <input type="number" name="Hores" required value="<?php echo($row['Hores']); ?>"></p>
    <p>Data inicio: <input type="date" name="Data_inici" required value="<?php echo($row['Data_inici']); ?>"></p>
    <p>Data final: <input type="date" name="Data_final" required value="<?php echo($row['Data_final']) ?>"></p>
    <p>
        <label for="Dni_Profesores">Profesor:
            <select name="Dni_Profesores"> 
                <?php
                    for($i=0;$i<($result);$i++){
                        if($array[$i]['DNI']==$row['Dni_Profesores']){
                            ?>
                                <option value="<?php print($array[$i]['DNI']) ?>"selected><?php print($array2[$i]['Nom'])  ?></option>
                            <?php
                        }else{
                            ?>
                                <option value="<?php print($array[$i]['DNI']) ?>"><?php print($array2[$i]['Nom']) ?></option>
                        <?php
                        }
                    }
                ?>
            </select>
        </label>
    </p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=admin&action=AdminCurso">Volver atrás</a>