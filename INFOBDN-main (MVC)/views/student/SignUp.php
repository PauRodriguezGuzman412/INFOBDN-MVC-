<link href="SignUp.css" rel="stylesheet" type="text/css">
 
<form class="formulario" action="index.php?controller=student&action=SignUp" method="POST" name="InicioSession" ENCTYPE="multipart/form-data">
    <h1>Registrarse</h1>
    <p>Email: <input type="text" name="Email" required></p>
    <p>DNI: <input type="text" name="DNI" required></p>    
    <p>Nombre: <input type="text" name="Nom" required></p>    
    <p>Cognoms: <input type="text" name="Cognoms" required></p>
    <p>Contraseña: <input type="password" name="Password" required></p>
    <p>Edat: <input type="text" name="Edat" required></p>
    <p>Avatar: <input type="file" name="Foto" accept=".png, .jpg, .jpeg"></p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=user&action=mostrarHome">Volver atrás</a>