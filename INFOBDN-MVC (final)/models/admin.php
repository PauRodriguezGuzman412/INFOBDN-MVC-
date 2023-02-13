<?php
require_once("database.php");
class Admin extends Database {
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
    
    function validateAdmin($dni, $pass){
        $sql = "SELECT DNI Password FROM administrador WHERE DNI= '$dni' AND Password= '".md5($pass)."'";
        $result = $this->db->query($sql);
        $rows = $result->rowCount();
        if($rows == 1) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>