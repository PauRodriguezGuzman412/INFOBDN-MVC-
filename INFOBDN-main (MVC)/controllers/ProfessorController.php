<?php
class professorController {
    public function mostrarHome(){
        require_once "models/professor.php";
        require_once "models/student.php";
        $student = new Student();
        $professor = new Professor();

        $llista = $student->all();
        $llista1 = $professor->selectCoursesHome();
        
        require_once "views/general/home.php";
    }

    public function SignInProfessor(){
        require_once "views/professor/SignInProfesor.php";
    }

    public function validateProfessor(){
        require_once "models/professor.php";
        require_once "models/student.php";
        $professor = new Professor();
        $student = new Student();

        $DNI= $_POST['DNI'];
        $pass= $_POST['password'];

        $result= $professor->validateProfessor($DNI, $pass);
        if($result == 0){
            $_SESSION['rol']= 'profesor';
            $_SESSION['DniProfesor']= $DNI;
            $resultName= $professor->selectSpecificName($DNI);
            $_SESSION['NombreHeader']= $resultName[0]['Nom'];

            $llista = $student->all();
            $llista1 = $professor->selectCoursesHome();
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=professor&action=mostrarHome">
            <?php
        }else{
            require_once "views/professor/SignInProfesor.php";
            
            echo"Error, no hay ningún profesor con esas credenciales";
        }
    }

    public function ShowCourses(){
        require_once "models/professor.php";
        $professor = new Professor();
        $llista= $professor->selectYourCourses();

        require_once "views/professor/cursos.php";
    }

    public function ShowCourseWithMarks(){
        require_once "models/professor.php";
        $professor = new Professor();
        $llista= $professor->selectCoursesWithMarks();

        require_once "views/professor/Nota.php";
    }

    public function ChangeMarksForm(){
        require_once "views/professor/PonerNota.php";
    }

    public function ChangeMarks(){
        require_once "models/professor.php";
        $professor = new Professor();
        $nota= $_POST['Nota'];

        $professor->UpdateNota($nota);

        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=<?php echo "index.php?controller=professor&action=ShowCourseWithMarks&id=".$_GET['id']."" ?>">  
        <?php
    }

    public function buscadorAdmin(){
        require_once "models/professor.php";
        $nom= $_POST['buscador'];
        $professor = new Professor();
        $result= $professor->buscadorAdmin($nom);
        require_once "views/admin/AdminProfesor.php";
    }

    public function selectAll(){
        require_once "models/professor.php";
        $professor = new Professor();
        $result= $professor->selectAll();
    }

    public function SignUpProfesor(){
        require_once "views/admin/SignUpProfesor.php";
    }
    
    public function SignUp(){
        if (!empty($_POST['DNI'])) {
            require_once "models/professor.php";
            $dni= $_POST['DNI'];
            $name= $_POST['Nom'];
            $surnames= $_POST['Cognoms'];
            $pass= $_POST['Password'];
            $title= $_POST['Titol'];
            
            $_SESSION['rol']= 'admin';
        
            $professor = new Professor();
            if (is_uploaded_file ($_FILES['Foto']['tmp_name']))
            {
                $nombreDirectorio = "img/";
                $idUnico = $dni;
                $nombreFichero = $idUnico . "-" . $_FILES['Foto']['name'];
                $directorio= $nombreDirectorio . $nombreFichero;
                move_uploaded_file ($_FILES['Foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
            }else print ("No se ha podido subir el fichero\n");
                
            $result= $professor->selectByDni($dni);
            if(!$result){
                $professor->Insert($dni, $name, $surnames, $pass, $title, $directorio);
                $result= $professor->selectAll();
                require_once "views/admin/AdminProfesor.php";
            }else{
                require_once "views/admin/SignUpProfesor.php";
                echo"Error el dni ya existe";
            }
        }
    }

    public function EditProfessor(){
        require_once "models/professor.php";
        $professor = new Professor();
        $row= $professor->selectByCurso($_GET['curso']);        
        require_once "views/admin/EditProfesor.php";
    }

    public function updateProfessor(){
        require_once "models/professor.php";
        $professor = new Professor();   
        if (!empty($_POST['DNI'])) {
            $dni= $_POST['DNI'];
            $name= $_POST['Nom'];
            $surnames= $_POST['Cognoms'];
            $pass= $_POST['Password'];
            $title= $_POST['Titol'];
            
            $_SESSION['rol']= 'admin';
            
            $result= $professor->Update($dni, $name, $surnames, $pass, $title);
        }
        $result= $professor->selectAll();
        require_once "views/admin/AdminProfesor.php";
    }

    public function EditAvatar(){
        require_once "models/professor.php";
        $professor = new Professor();
        $row= $professor->selectByCurso($_GET['dni']);        
        require_once "views/admin/EditAvatar.php";
    }

    public function updateAvatar(){
        require_once "models/professor.php";
        $professor = new Professor();
        if (!empty($_FILES['Foto'])) {
            $dni= $_SESSION['dni'];
        
            if (is_uploaded_file ($_FILES['Foto']['tmp_name'])){
                $nombreDirectorio = "img/";
                $idUnico = $dni;
                $nombreFichero = $idUnico . "-" . $_FILES['Foto']['name'];
                $directorio= $nombreDirectorio . $nombreFichero;
                move_uploaded_file ($_FILES['Foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
            }else print ("No se ha podido subir el fichero\n");
        
            $_SESSION['rol']= 'admin';
        
            $result= $professor->updateAvatar($dni, $directorio);
        }
        $result= $professor->selectAll();
        require_once "views/admin/AdminProfesor.php";
    }

    public function desactivarProfesor(){
        require_once "models/professor.php";
        $professor = new Professor();
        $professor->desactivar($_GET['dni']);
        
        $result= $professor->selectAll();
        require_once "views/admin/AdminProfesor.php";
    }
}