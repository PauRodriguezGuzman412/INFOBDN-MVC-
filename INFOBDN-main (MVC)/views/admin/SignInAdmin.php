<link href="css/SignInGeneral.css" rel="stylesheet" type="text/css">

<form class="formulario" action="index.php?controller=admin&action=validateAdmin" method="POST">
    <h1>Iniciar Sessión como admin</h1>
    <p>DNI: <input type="text" name="DNI" required></p>    
    <p>Contraseña: <input type="password" name="password" required></p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=user&action=mostrarHome">Volver atrás</a>