<link href="AdminProfesor.css" rel="stylesheet" type="text/css">
<?php
if(isset($_SESSION['rol'])){
    if($_SESSION['rol']=='admin'){
    ?>
        <form action="index.php?controller=professor&action=buscadorAdmin" method="POST" name="buscador">
            Buscador:<input type="text" id="buscador" name="buscador" placeholder="Busca el profesor por nombre"></input>
            <button type="submit">Buscar</button>
        </form>
        <a href="index.php?controller=professor&action=SignUpProfesor">Registrar profesor</a>
    <?php

    echo("<table border class='TablaProfesores'>");
    echo("<tr>");
    echo("<td>DNI</td>");
    echo("<td>Nom</td>");
    echo("<td>Cognoms</td>");
    echo("<td>Titol</td>");
    echo("<td>Foto</td>");
    echo("<td>Activo</td>");
    echo("<td>Editar Profesor</td>");
    echo("<td>Editar Foto</td>");
    echo("<td>Desactivar</td>");
    echo("</tr>");

    if(isset($_POST['buscador']) && $_POST['buscador']!=""){
        foreach($result as $clave => $valor){
            echo "<tr>";
            foreach($valor as $clave1 => $valor1){
                if($valor['Foto']==$valor1){
                    echo "<td> <img width='50' height='50' src=".$valor1."> </td>";
                }else if($valor['Password']!=$valor1 && $valor['activo']!=$valor1){
                    echo "<td> ".$valor1." </td>";
                }else if($valor['activo']==$valor1 && $valor['activo']==0){
                    echo "<td> No </td>";
                }else if($valor['activo']==$valor1 && $valor['activo']==1){
                    echo "<td> Si </td>";
                }
            }
            echo "<td> <a href='index.php?controller=professor&action=EditProfessor&curso=".$valor['DNI']."'>
            <img src='https://cdn-icons-png.flaticon.com/512/45/45406.png' 
            width='50px' height='50px'></a> </td>";
            echo "<td> <a href='index.php?controller=professor&action=EditAvatar&dni=".$valor['DNI']."&foto=".$valor['Foto']."'>
            <img src='https://es.seaicons.com/wp-content/uploads/2015/11/Users-Edit-User-icon.png' 
            width='50px' height='50px'></a> </td>";

            if($valor['activo']==1){
                echo "<td> <a href='index.php?controller=professor&action=desactivarProfesor&eliminar=".$valor['activo']."&dni=".$valor['DNI']."'><img src='https://cdn-icons-png.flaticon.com/512/458/458594.png' 
                width='50px' height='50px'></a> </td>";
            }else{
                echo "<td> <a href='index.php?controller=professor&action=desactivarProfesor&eliminar=".$valor['activo']."&dni=".$valor['DNI']."'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/768px-Flat_tick_icon.svg.png' 
                width='50px' height='50px'></a> </td>";
            }
            echo "</tr>";
        }
        
        echo("</table>");
    }else{
        foreach($result as $clave => $valor){
            echo "<tr>";
            foreach($valor as $clave1 => $valor1){
                if($valor['Foto']==$valor1){
                    echo "<td> <img width='50' height='50' src=".$valor1."> </td>";
                }else if($valor['Password']!=$valor1 && $valor['activo']!=$valor1){
                    echo "<td> ".$valor1." </td>";
                }else if($valor['activo']==$valor1 && $valor['activo']==0){
                    echo "<td> No </td>";
                }else if($valor['activo']==$valor1 && $valor['activo']==1){
                    echo "<td> Si </td>";
                }
            }
            echo "<td> <a href='index.php?controller=professor&action=EditProfessor&curso=".$valor['DNI']."'>
            <img src='https://cdn-icons-png.flaticon.com/512/45/45406.png' 
            width='50px' height='50px'></a> </td>";
            echo "<td> <a href='index.php?controller=professor&action=EditAvatar&dni=".$valor['DNI']."&foto=".$valor['Foto']."'>
            <img src='https://es.seaicons.com/wp-content/uploads/2015/11/Users-Edit-User-icon.png' 
            width='50px' height='50px'></a> </td>";

            if($valor['activo']==1){
                echo "<td> <a href='index.php?controller=professor&action=desactivarProfesor&eliminar=".$valor['activo']."&dni=".$valor['DNI']."'>
                <img src='https://cdn-icons-png.flaticon.com/512/458/458594.png' 
                width='50px' height='50px'></a> </td>";
            }else{
                echo "<td> <a href='index.php?controller=professor&action=desactivarProfesor&eliminar=".$valor['activo']."&dni=".$valor['DNI']."'>
                <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/768px-Flat_tick_icon.svg.png' 
                width='50px' height='50px'></a> </td>";
            }
            echo "</tr>";
        }
        echo("</table>");
    }
?>
<a href="index.php?controller=user&action=mostrarHome">Volver atrás</a>
<?php
    }else{
        echo"No deberías estar aquí";
    }}
?>