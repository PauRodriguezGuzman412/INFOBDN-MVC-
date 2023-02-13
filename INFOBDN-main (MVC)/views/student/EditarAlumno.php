<link href="css/EditCurso.css" rel="stylesheet" type="text/css">

<form class='formulario' action="index.php?controller=student&action=EditSelf" method="POST" name="InicioSession">
    <?php
    if($_SESSION['rol']=='alumno'){
    ?>
    <h1>Edit Alumno</h1>
    <p>DNI: <input type="text" name="DNI" required value="<?php echo($row['DNI']); ?>"></p>    
    <p>Nombre: <input type="text" name="Nom" required value="<?php echo($row['Nom']); ?>"></p>    
    <p>Cognoms: <input type="text" name="Cognoms" required value="<?php echo($row['Cognoms']); ?>"></p>
    <p>Contraseña: <input type="text" name="Password" required value="<?php echo($row['Password']); ?>"></p>
    <p>Edat: <input type="text" name="Edat" required value="<?php echo($row['Edat']) ?>"></p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=student&action=mostrarHome">Volver atrás</a>
<?php
    }else{
        echo"No deberías estar aquí";
    }
?>