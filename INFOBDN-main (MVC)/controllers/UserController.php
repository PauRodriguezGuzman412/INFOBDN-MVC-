<?php
class userController {

    public function mostrarHome() {
        require_once "views/general/home.php";
    }

    public function menu(){
        if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'alumno'){
            require_once "models/student.php";

            $student= new Student();
            $_SESSION['fotoPerfil']= $student->menu();
        }
        require_once "views/general/menu.php";
    }

    public function SignOut() {
        require_once "views/general/SignOut.php";
    }
}
?>