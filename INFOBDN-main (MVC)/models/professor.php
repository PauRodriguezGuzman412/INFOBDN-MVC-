<?php
require_once("database.php");
class Professor extends Database {
    
    
    function validateProfessor($DNI, $pass){
        $sql= "SELECT DNI, Password FROM profesores WHERE DNI= '$DNI' AND activo= 1 AND Password= '".md5($pass)."'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    function buscadorAdmin($nom){
        $sql = "SELECT * FROM profesores WHERE Nom LIKE '%".$nom."%'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function selectAll(){
        $sql = "SELECT * FROM profesores";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function selectByDni($dni){
        $sql = "SELECT DNI FROM profesores WHERE DNI LIKE '$dni'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    function Insert($dni, $name, $surnames, $pass, $title, $directorio){
        $sql = "INSERT INTO profesores (DNI,Nom,Cognoms,Password,Titol,Foto) 
        VALUES ('$dni', '$name', '$surnames', md5('$pass'), '$title','$directorio')";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }

    function Update($dni, $name, $surnames, $pass, $title){
        $sql = "UPDATE profesores SET DNI= '$dni', Nom= '$name', Cognoms='$surnames', Password=md5('$pass'), Titol='$title'
        WHERE DNI= '$dni'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }

    function updateAvatar($dni,$directorio){
        $sql1= "UPDATE profesores SET Foto='$directorio' WHERE DNI= '$dni'";
        $result = $this->db->query($sql1);
    }

    function selectByCurso($curso){
        $sql = "SELECT * FROM profesores WHERE DNI LIKE '$curso'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows[0];
    }

    function desactivar($dni){
        $sql = "SELECT activo FROM profesores WHERE DNI= '".$_GET['dni']."'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        if($rows[0]['activo'] == 1){
            $sql1= "UPDATE profesores SET activo= 0 WHERE DNI= '".$_GET['dni']."'";
            $result = $this->db->query($sql1);
    
            $sql2= "UPDATE cursos SET Dni_Profesores= null WHERE Dni_Profesores= '".$_GET['dni']."'";
            $result2 = $this->db->query($sql2);
        }else{
            $sql1= "UPDATE profesores SET activo= 1 WHERE DNI= '".$_GET['dni']."'";
            $result = $this->db->query($sql1);
        }
    }

    function selectDNI(){
        $sql = "SELECT DNI FROM profesores";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return [$rows,$result->rowCount()];
    }

    function selectName(){
        $sql = "SELECT Nom FROM profesores";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function selectSpecificName($DNI){
        $sql= "SELECT Nom FROM profesores WHERE DNI= '$DNI'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function selectCoursesHome(){
        $sql= "SELECT cursos.Codi, cursos.Nom, cursos.Data_inici, cursos.Data_final, cursos.activo FROM cursos INNER JOIN Profesores ON cursos.Dni_Profesores=Profesores.DNI WHERE cursos.Dni_profesores LIKE '".$_SESSION['DniProfesor']."'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    
    function selectYourCourses(){        
        $sql= "SELECT * FROM cursos WHERE Dni_Profesores = '".$_SESSION['DniProfesor']."'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function selectCoursesWithMarks(){
        //$sql= "SELECT Alumnos.Nom,Alumnos.Email,matriculas.Nota,matriculas.Codi FROM Alumnos INNER JOIN matriculas ON Alumnos.Email=matriculas.Email_Alumnos WHERE matriculas.Codi= '".$_GET['id']."'";
        $sql= "SELECT Alumnos.Nom,Alumnos.Email,matriculas.Nota,matriculas.Codi,cursos.Data_inici,cursos.Data_final FROM Alumnos INNER JOIN matriculas ON Alumnos.Email=matriculas.Email_Alumnos INNER JOIN cursos ON cursos.CODI=matriculas.CODI WHERE matriculas.Codi= '".$_GET['id']."'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function updateNota($nota){
        $sql= "UPDATE matriculas SET nota=".$nota." WHERE Codi LIKE ".$_GET['id']." AND Email_Alumnos LIKE '".$_GET['Email']."'";
        $result = $this->db->query($sql);
    }
}
?>