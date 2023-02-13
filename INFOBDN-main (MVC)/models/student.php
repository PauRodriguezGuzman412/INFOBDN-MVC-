<?php
require_once("database.php");
class Student extends Database {
    private   $dni;
    private   $password;

    function getDni() {
        return $this->dni;
    }

    function getPassword() {
        return $this->password;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    function SignUp($Email, $DNI , $name, $surnames, $pass, $Edat,$directorio){
        $sql= "SELECT Email FROM alumnos WHERE Email LIKE '$Email'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 0) {
            $sql1 = "INSERT INTO alumnos (Email,DNI,Nom,Cognoms,Password,Edat,Foto) VALUES ('$Email', '$DNI', '$name', '$surnames', md5('$pass'), '$Edat','$directorio')";
            $result1 =  $this->db->query($sql1);
            return true;
        }
        else{
            return false;
        }  
    }

    function menu(){
        $sql= "SELECT Foto FROM alumnos WHERE Email LIKE '".$_SESSION['email']."'";
        $resultado= $this->db->query($sql);
        $final = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return($final[0]['Foto']);
    }

    function all(){
        $sql= "SELECT * FROM cursos";    
        $resultado= $this->db->query($sql);
        $rows= $resultado->fetchAll(PDO::FETCH_ASSOC);
        return($rows);
    }
    
    function selectCourseHome(){
        $sql= "SELECT cursos.Nom, cursos.Data_inici, cursos.Data_final, cursos.activo FROM cursos INNER JOIN matriculas ON cursos.Codi=matriculas.Codi INNER JOIN Alumnos ON matriculas.Email_Alumnos=Alumnos.Email WHERE matriculas.Email_Alumnos LIKE '".$_SESSION['email']."'";
        $resultado= $this->db->query($sql);
        $rows= $resultado->fetchAll(PDO::FETCH_ASSOC);
        return($rows);
    }

    function CoursesNotFinished(){
        $sql= "SELECT cursos.* FROM cursos WHERE cursos.Codi NOT IN (SELECT Codi FROM matriculas WHERE '".$_SESSION['email']."'=matriculas.Email_Alumnos) AND Data_inici>'".date("Y-m-d")."'";        
        $resultado= $this->db->query($sql);
        $rows= $resultado->fetchAll(PDO::FETCH_ASSOC);
        return($rows);
    }

    function ProfessorsFromCourses(){
        $sql= "SELECT profesores.Nom, cursos.Codi FROM profesores INNER JOIN cursos ON cursos.Dni_Profesores=profesores.DNI ";
        $resultado= $this->db->query($sql);
        $rows= $resultado->fetchAll(PDO::FETCH_ASSOC);
        return($rows);
    }

    function CoursesWithMarks(){
        $sql= "SELECT cursos.*, matriculas.Nota FROM cursos INNER JOIN matriculas ON cursos.Codi=matriculas.Codi INNER JOIN Alumnos ON matriculas.Email_Alumnos=Alumnos.Email WHERE Alumnos.Email LIKE '".$_SESSION['email']."'";
        $resultado= $this->db->query($sql);
        $rows= $resultado->fetchAll(PDO::FETCH_ASSOC);
        return($rows);
    }

    function Matricularse($id, $valor, $email){
        if($id == 'si'){
            $sql= "INSERT INTO matriculas(Codi, Email_Alumnos) VALUES ('".$valor."','".$email."')";
            $resultado= $this->db->query($sql);
        }else{
            $sql= "DELETE FROM matriculas WHERE matriculas.Codi='".$valor."' AND matriculas.Email_Alumnos='".$email."'";
            $resultado= $this->db->query($sql);
        }
    }

    function SignIn($email, $pass){
        $sql= "SELECT email,Password FROM alumnos WHERE email= '$email' AND Password= '".md5($pass)."'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return $result->fetchAll(PDO::FETCH_ASSOC);;
        }
        else{
            return false;
        }  
    }

    function getName($email){
        $sql= "SELECT Nom FROM alumnos WHERE email= '$email'";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);;
    }

    function selectStudent(){
        $sql = "SELECT * FROM alumnos WHERE Email='".$_SESSION['email']."'";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);;
    }

    function updateStudent($dni,$nom,$cognoms,$pass,$edat){
        $sql= "UPDATE alumnos SET DNI= '$dni', Nom= '$nom', Cognoms='$cognoms', Password='".md5($pass)."', Edat='$edat' WHERE Email='".$_SESSION['email']."'";
        $result = $this->db->query($sql);        
        $_SESSION['NombreHeader']= $nom;
    }
}
?>