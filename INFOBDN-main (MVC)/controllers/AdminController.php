<?php
class adminController {

    public function SignInAdmin(){
        require_once "views/admin/SignInAdmin.php";
    }

    public function validateAdmin(){
        if (isset($_POST['DNI']) && $_POST['DNI']=='49988375R') {
            require_once "models/admin.php";
            $dni= $_POST['DNI'];
            $pass= $_POST['password'];
            $_SESSION['rol']= 'admin';
            
            $admin = new Admin();
            $result= $admin->validateAdmin($dni,$pass);
    
            if($result){
                ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=user&action=mostrarHome">
                <?php
            }else{
                echo"Error, no hay ningún admininstrador con esas credenciales";
            }
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=user&action=mostrarHome">
            <?php
        }
    }

    public function AdminProfesor(){
        require_once "models/professor.php";
        $professor = new Professor();
        $result= $professor->selectAll();
        require_once "views/admin/AdminProfesor.php";
    }

    public function AdminCurso(){    
        require_once "models/curso.php";
        $curso = new Curso();
        $result= $curso->selectAll();    
        require_once "views/admin/AdminCurso.php";
    }
}