<link href="EditCurso.css" rel="stylesheet" type="text/css">
<?php
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol']=='admin'){
?>
    <form class='formulario' action="index.php?controller=professor&action=updateProfessor&curso=<?php echo$_GET['curso']?>" method="POST" name="InicioSession">
        <h1>Editar profesor </h1>
        <p>DNI: <input type="text" name="DNI" value="<?php echo($row['DNI']); ?>" required></p>    
        <p>Nombre: <input type="text" name="Nom" value="<?php echo($row['Nom']); ?>" required></p>    
        <p>Cognoms: <input type="text" name="Cognoms" value="<?php echo($row['Cognoms']); ?>" required></p>
        <p>Contraseña: <input type="text" name="Password" value="<?php echo($row['Password']); ?>" required></p>
        <p>Titol: <input type="text" name="Titol" value="<?php echo($row['Titol']); ?>" required></p>
        <button type="submit">Enviar</button>
    </form>
    <a href="index.php?controller=admin&action=AdminProfesor">Volver atrás</a>
<?php
    }else{
        echo"No deberías estar aquí";
    }}
?>