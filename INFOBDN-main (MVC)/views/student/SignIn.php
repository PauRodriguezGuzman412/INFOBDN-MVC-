<link href="SignInGeneral.css" rel="stylesheet" type="text/css">

<form class="formulario" action="index.php?controller=student&action=ValidateStudent" method="POST">
    <h1>Iniciar Sessión como alumno</h1>
    <p>Email: <input type="text" name="email" required></p>    
    <p>Contraseña: <input type="password" name="password" required ></p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=user&action=mostrarHome">Volver atrás</a>