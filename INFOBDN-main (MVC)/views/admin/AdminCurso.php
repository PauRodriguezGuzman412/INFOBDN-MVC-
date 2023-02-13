<link href="AdminCurso.css" rel="stylesheet" type="text/css">
<?php
if(isset($_SESSION['rol'])){
    if($_SESSION['rol']=='admin'){
        ?>
        <form action="index.php?controller=curso&action=buscadorAdmin" method="POST" name="buscador">
        Buscador:<input type="text" id="buscador" name="buscador" placeholder="Busca el curso por nombre"></input>
        <button type="submit">Buscar</button>
        </form>
        <a href="index.php?controller=curso&action=SignUpCurso">Registrar curso</a>
        
        <?php
        echo("<table border class='TablaCursos'>");
        echo("<tr>");
        echo("<td>Codi</td>");
        echo("<td>Nom</td>");
        echo("<td>Descripción</td>");
        echo("<td>Horas</td>");
        echo("<td>Data de incio</td>");
        echo("<td>Data final</td>");
        echo("<td>Dni profesores</td>");
        echo("<td>Activo</td>");
        echo("<td>Editar</td>");
        echo("<td>Borrar</td>");
        echo("</tr>");
        
    
        if(isset($_POST['buscador']) && $_POST['buscador']!=""){        
            if(!isset($result)){
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=AdminCurso.php'>";
            }
    
            foreach($result as $clave => $valor){
                echo "<tr>";
                foreach($valor as $clave1 => $valor1){
                    echo "<td> ".$valor1." </td>";
                }
                echo "<td> <a href='index.php?controller=curso&action=EditCurso&curso=".$valor['Codi']."'>
                <img src='https://cdn-icons-png.flaticon.com/512/45/45406.png' width='50px' height='50px'></a> </td>";
                if($valor['activo']==1){
                    echo "<td> <a href='index.php?controller=curso&action=eliminarCurso&eliminar=".$valor['activo']."&codi=".$valor['Codi']."'>
                    <img src='https://cdn-icons-png.flaticon.com/512/458/458594.png' width='50px' height='50px'></a> </td>";
                }else{
                    echo "<td> <a href='index.php?controller=curso&action=eliminarCurso&eliminar=".$valor['activo']."&codi=".$valor['Codi']."'>
                    <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/768px-Flat_tick_icon.svg.png' width='50px' height='50px'></a> </td>";
                }
                echo "</tr>";
            }
            
            echo("</table>");
        }else{
            foreach($result as $clave => $valor){
                echo "<tr>";
                foreach($valor as $clave1 => $valor1){
                    if($valor['activo']!=$valor1){
                        echo "<td> ".$valor1." </td>";
                    }else if($valor['activo']==$valor1 && $valor['activo']==0){
                        echo "<td> No </td>";
                    }else if($valor['activo']==$valor1 && $valor['activo']==1){
                        echo "<td> Si </td>";
                    }
                }
                echo "<td> <a href='index.php?controller=curso&action=EditCurso&curso=".$valor['Codi']."'>
                <img src='https://cdn-icons-png.flaticon.com/512/45/45406.png' width='50px' height='50px'></a> </td>";
                if($valor['activo']==1){
                    echo "<td> <a href='index.php?controller=curso&action=eliminarCurso&eliminar=".$valor['activo']."&codi=".$valor['Codi']."'>
                    <img src='https://cdn-icons-png.flaticon.com/512/458/458594.png' width='50px' height='50px'></a> </td>";
                }else{
                    echo "<td> <a href='index.php?controller=curso&action=eliminarCurso&eliminar=".$valor['activo']."&codi=".$valor['Codi']."'>
                    <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/768px-Flat_tick_icon.svg.png' width='50px' height='50px'></a> </td>";
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
        }
    }
?>