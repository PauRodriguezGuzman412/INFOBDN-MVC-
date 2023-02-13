<link href="css/SignInGeneral.css" rel="stylesheet" type="text/css">
<?php
    
?>

<form class="formulario" action="index.php?controller=professor&action=validateProfessor" method="POST">
    <h1>Iniciar Sessión como profesor</h1>
    <p>DNI: <input type="text" name="DNI" required></p>    
    <p>Contraseña: <input type="password" name="password" required ></p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=professor&action=mostrarHome">Volver atrás</a>