<?php
class cursoController {
    public function SignIncurso(){
        require_once "views/admin/SignIncurso.php";
    }

    public function validatecurso(){
        
    }

    public function buscadorAdmin(){
        require_once "models/curso.php";
        $nom= $_POST['buscador'];
        $curso = new Curso();
        $result= $curso->buscadorAdmin($nom);
        require_once "views/admin/AdminCurso.php";
    }

    public function selectAll(){
        require_once "models/curso.php";
        $curso = new Curso();
        $result= $curso->selectAll();
    }

    public function SignUp(){
        if (!empty($_POST['Nom'])) {
            require_once "models/curso.php";
            if($_POST['Data_final']<date("Y-m-d H:i:s")){
                echo "La fecha final es menor que la fecha actual";
            }else if($_POST['Data_inici']<$_POST['Data_final']){
                $name= $_POST['Nom'];
                $desc= $_POST['Descripcion'];
                $horas= $_POST['Hores'];
                $inici= $_POST['Data_inici'];
                $final= $_POST['Data_final'];
                $prof= $_POST['Dni_Profesores'];
                        
                $_SESSION['rol']= 'admin';
                
                $curso = new Curso();
                $result= $curso->Insert($name, $desc, $horas, $inici, $final, $prof);
        
                $result= $curso->selectAll();
                require_once "views/admin/AdminCurso.php";
            }else{
                echo "La fecha de inicio es mayor que la fecha final";
            }
        }
    }
    
    public function SignUpCurso(){    
        require_once "models/professor.php";
        $professor = new Professor();
        $res= $professor->selectDNI();
        $array2= $professor->selectName();
        $array= $res[0];
        $result= $res[1];
        require_once "views/admin/SignUpCurso.php";
    }

    public function Editcurso(){
        require_once "models/curso.php";    
        require_once "models/professor.php";
        $curso = new Curso();
        $row= $curso->selectByCurso($_GET['curso']);

        $professor = new Professor();
        $res= $professor->selectDNI();
        $array2= $professor->selectName();
        $array= $res[0];
        $result= $res[1];

        require_once "views/admin/EditCurso.php";
    }

    public function updateCurso(){
        require_once "models/curso.php";
        $curso = new Curso();
        if (!empty($_POST['Nom'])) {
            if($_POST['Data_inici']<$_POST['Data_final']){
                $name= $_POST['Nom'];
                $desc= $_POST['Descripcion'];
                $horas= $_POST['Hores'];
                $inici= $_POST['Data_inici'];
                $final= $_POST['Data_final'];
                $prof= $_POST['Dni_Profesores'];
                $_SESSION['rol']= 'admin';
                
                $result= $curso->Update($name, $desc, $horas, $inici, $final, $prof, $_GET['curso']);
                
                $result= $curso->selectAll();
                require_once "views/admin/AdminCurso.php";
            }else{
                echo "La fecha de inicio es mayor que la fecha final";
            }
        }        
    }

    public function eliminarCurso(){
        require_once "models/curso.php";
        $curso = new Curso();
        $curso->desactivar($_GET['codi']);
        
        $result= $curso->selectAll();
        require_once "views/admin/AdminCurso.php";
    }
}