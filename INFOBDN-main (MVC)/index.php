<?php
    session_start();
    include('funciones.php');
?>

<!--Controlador frontal: fichero que se encarga de cargarlo absolutamente todo -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
        <title>INFOBDN</title>
    </head>
    <body>
        <?php 
        try{
            require_once "autoload.php";
            // require_once "views/general/cabecera.html";
            // require_once "views/general/menu.php";
            $cont = new UserController();
            $cont->menu();
    
            if (isset($_GET['controller'])){
                $nombreController = $_GET['controller']."Controller";
            }else{
                //Controlador per defecte
                $nombreController = "UserController";
            }
            if (class_exists($nombreController)){
                $controlador = new $nombreController();
                if(isset($_GET['action'])){
                    $action = $_GET['action'];
                }
                else{
                    $action= "mostrarHome";
                }
                $controlador->$action();   
            }else{
    
                echo "No existe el controlador";
            }
            // require_once "views/general/pie.html";
        }catch(e){
            echo "hay un error en la página";
        }
        ?>
    </body>
</html>


