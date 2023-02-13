<link href="css/EditCurso.css" rel="stylesheet" type="text/css">
<?php
if(isset($_SESSION['rol'])){
    if($_SESSION['rol']=='admin'){
?>
<form class='formulario' action="index.php?controller=professor&action=SignUp" method="POST" name="InicioSession" ENCTYPE="multipart/form-data">
    <h1>Registrar profesor</h1>
    <p>DNI: <input type="text" name="DNI" required></p>    
    <p>Nombre: <input type="text" name="Nom" required></p>    
    <p>Cognoms: <input type="text" name="Cognoms" required></p>
    <p>Contraseña: <input type="text" name="Password" required></p>
    <p>Titol: <input type="text" name="Titol" required></p>
    <p>Avatar: <input type="file" name="Foto" accept=".png, .jpg, .jpeg" required></p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=admin&action=AdminProfesor">Volver atrás</a>
<?php
        }else{
            echo"No deberías estar aquí";
        }
    }
?>