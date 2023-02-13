<link href="css/EditCurso.css" rel="stylesheet" type="text/css">

<form class='formulario' action="index.php?controller=professor&action=updateAvatar" method="POST" name="InicioSession" ENCTYPE="multipart/form-data">
    <?php
        if(isset($_SESSION['rol'])){
            if($_SESSION['rol']=='admin'){
                if(isset($_GET['dni'])){
                    $_SESSION['dni']= $_GET['dni'];
                }
    ?>
    <h1>Modificar Foto </h1>
    <p>Avatar: <input type="file" name="Foto" accept=".png, .jpg, .jpeg" required></p>
    <button type="submit">Enviar</button>
</form>
<a href="index.php?controller=admin&action=AdminProfesor">Volver atrás</a>
<?php
    }else{
        echo"No deberías estar aquí";
    }}
?>