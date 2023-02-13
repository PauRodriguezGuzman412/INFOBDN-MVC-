<?php
class studentController {
    public function mostrarHome(){
        require_once "models/student.php";
        $student = new Student();
        $llista = $student->all();
        $llista1 = $student->selectCourseHome();

        require_once "views/general/home.php";
    }

    public function SignUpForm(){
        require_once "views/student/SignUp.php";   
    }

    public function SignUp() {
        require_once "models/student.php";
        $Email    = $_POST['Email'];
        $DNI      = $_POST['DNI'];
        $name     = $_POST['Nom'];
        $surnames = $_POST['Cognoms'];
        $pass     = $_POST['Password'];
        $Edat     = $_POST['Edat'];
        
        $_SESSION['rol'] = 'alumno';
        $_SESSION['email'] = $Email;
        $_SESSION['NombreHeader'] = $name;
    
        if (is_uploaded_file ($_FILES['Foto']['tmp_name']))
        {   
            $nombreDirectorio = "imgAlumnos/";
            $idUnico = $DNI;
            $nombreFichero = $idUnico . "-" . $_FILES['Foto']['name'];
            $directorio= $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['Foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }else print ("No se ha podido subir el fichero\n");
    
        $student = new Student();
        $result= $student->SignUp($Email, $DNI , $name, $surnames, $pass, $Edat,$directorio);
        if($result==0){              
            $llista = $student->all();
            $llista1 = $student->selectCourseHome();

            require_once "views/general/home.php";
        }else{
            echo"Error el email ya existe";
        }
    }
    
    public function AvailableCourses(){
        require_once "models/student.php";
        $student = new Student();
        $llista1 = $student->CoursesNotFinished();
        $llista2 = $student->ProfessorsFromCourses();

        require_once "views/student/CursosDisponibles.php";
    }
    
    public function YourCourses(){
        require_once "models/student.php";
        $student = new Student();
        $llista1 = $student->CoursesWithMarks();    
        $llista2 = $student->ProfessorsFromCourses();

        require_once "views/student/MisCursos.php";
    }

    public function Matricularse(){
        require_once "models/student.php";
        $student = new Student();
        $result= $student->Matricularse($_GET['id'],$_GET['valor'],$_GET['email']);
        if($_GET['id'] == 'si'){
            $llista1 = $student->CoursesWithMarks();    
            $llista2 = $student->ProfessorsFromCourses();

            require_once "views/student/MisCursos.php";
        }else{
            $llista1 = $student->CoursesNotFinished();
            $llista2 = $student->ProfessorsFromCourses();

            require_once "views/student/CursosDisponibles.php";
        }
    }

    public function SignIn(){
        require_once "views/student/SignIn.php";
    }

    public function ValidateStudent(){
        require_once "models/student.php";
        $student = new Student();

        $email= $_POST['email'];
        $pass= $_POST['password'];
        
        $_SESSION['rol']= 'alumno';
        $_SESSION['email']= $email;

        $result= $student->SignIn($email, $pass);
        if($result!=false){
            $name= $student->getName($email);
            $_SESSION['NombreHeader']= $name[0]['Nom']; 

            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=student&action=mostrarHome">
            <?php
        }else{
            echo"Error, no hay ningún alumno con esas credenciales";
        }
    }

    public function EditSelfForm(){
        require_once "models/student.php";
        $student = new Student();
        $row= $student->selectStudent();
        $row= $row[0];
        require_once "views/student/EditarAlumno.php";
    }

    public function EditSelf(){
        require_once "models/student.php";
        $student = new Student();

        $dni     = $_POST['DNI'];
        $nom     = $_POST['Nom'];
        $cognoms = $_POST['Cognoms'];
        $pass    = $_POST['Password'];
        $edat    = $_POST['Edat'];

        $row= $student->UpdateStudent($dni,$nom,$cognoms,$pass,$edat);

        $llista = $student->all();
        $llista1 = $student->selectCourseHome();
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=student&action=mostrarHome">
        <?php
    }
}
?>