<?php
require_once("database.php");
class Curso extends Database {
    private   $codi;
    private   $nom;
    private   $descripcion;
    private   $hores;
    private   $data_inici;
    private   $data_final;
    private   $dni_profesores;
    private   $activo;
    
    function getCodi() {
        return $this->codi;
    }

    function getNom() {
        return $this->nom;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getHores() {
        return $this->hores;
    }

    function getDataInici() {
        return $this->data_inici;
    }

    function getDataFinal() {
        return $this->data_final;
    }

    function getDniProfesores() {
        return $this->dni_profesores;
    }

    function getActivo() {
        return $this->activo;
    }


    function setCodi($codi) {
        $this->codi = $codi;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setHores($hores) {
        $this->hores = $hores;
    }

    function setDataInici($data_inici) {
        $this->data_inici = $data_inici;
    }

    function setDataFinal($data_final) {
        $this->data_final = $data_final;
    }

    function setDniProfesor($dni_profesores) {
        $this->dni_profesores = $dni_profesores;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    
    function validateCurso($Codi, $pass){
        $sql = "SELECT Codi Password FROM administrador WHERE Codi= '$Codi' AND Password= '".md5($pass)."'";
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
        $sql = "SELECT * FROM cursos WHERE Nom LIKE '%".$nom."%'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function selectAll(){
        $sql = "SELECT * FROM cursos";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function selectByCodi($Codi){
        $sql = "SELECT Codi FROM cursos WHERE Codi LIKE '$Codi'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    function Insert($name, $desc, $horas, $inici, $final, $prof){
        $sql = "INSERT INTO cursos (Nom,Descripcion,Hores,Data_inici,Data_final,Dni_Profesores)
        VALUES ('$name', '$desc', '$horas', '$inici', '$final','$prof')";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }

    function Update($name, $desc, $horas, $inici, $final, $prof, $curso){
        $sql = "UPDATE cursos SET Nom= '$name', Descripcion= '$desc', Hores='$horas', Data_inici='$inici', Data_final='$final', Dni_Profesores='$prof' WHERE Codi=".$curso."";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
    }

    function selectByCurso($curso){
        $sql = "SELECT * FROM cursos WHERE Codi LIKE '$curso'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows[0];
    }

    function desactivar($Codi){
        $sql = "SELECT activo FROM cursos WHERE Codi= '".$Codi."'";
        $result = $this->db->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        
        if($rows[0]['activo'] == 1){
            $sql= "UPDATE cursos SET activo= 0 WHERE Codi= ".$Codi."";
            $result = $this->db->query($sql);
        }else{
            $sql= "UPDATE cursos SET activo= 1 WHERE Codi= ".$Codi."";
            $result = $this->db->query($sql);
        }
    }
}
?>