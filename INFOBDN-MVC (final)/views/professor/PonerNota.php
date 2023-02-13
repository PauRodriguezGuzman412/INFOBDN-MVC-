<link href="css/PonerNota.css" rel="stylesheet" type="text/css">
<?php
    if($_SESSION['rol']=='profesor'){
?>
<form class="formulario" action="<?php echo "index.php?controller=professor&action=ChangeMarks&Email=".$_GET['Email']."&id=".$_GET['id']."" ?> " method="POST" name="PonerNota">
    <h1> Poner Nota </h1>
    <p>Nota: <input type="number" name="Nota" min="1" max="10" required>
    <button type="submit">Enviar</button>
</form>
<a href=" <?php echo "index.php?controller=professor&action=ShowCourseWithMarks&id=".$_GET['id']."" ?> ">Volver atrás</a>
<?php
    }else{
        echo"No deberías estar aquí";
    }
?>