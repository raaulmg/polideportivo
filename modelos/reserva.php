<?php
    include_once("DB.php");

    class Reserva{
        private $db;

        public function __construct() {
            $this->db = new DB();
        }

    public function getAll(){
        $arrayResult = array();
        $result = $this->db->consulta("SELECT * FROM reservas");
        if($result){
            return $result;
        }
        else{
            return null;
        }
    }

    public function getAllFecha($fecha){
        $arrayResult = array();
        $result = $this->db->consulta("SELECT * FROM reservas WHERE fecha = '$fecha'");
        if($result){
            return $result;
        }
        else{
            return null;
        }
    }

    public function getAllPropias($id){
        $arrayResult = array();
        $result = $this->db->consulta("SELECT * FROM reservas WHERE id = '$id'");
        if($result){
            return $result;
        }
        else{
            return null;
        }
    }

    public function getAllPropiasFecha($id,$fecha){
        $arrayResult = array();
        $result = $this->db->consulta("SELECT * FROM reservas WHERE id = '$id' AND fecha = '$fecha'");
        if($result){
            return $result;
        }
        else{
            return null;
        }  
    }

    public function insert($idUsuario, $idInstalacion, $fecha, $hora, $precio){
        $this->db->manipulacion("INSERT INTO reservas
        VALUES ('$idUsuario', '$idInstalacion', '$fecha', '$hora', '$precio')");
    }

    public function delete($id, $hora, $idInsta, $fechaReserva){
        $this->db->manipulacion("DELETE FROM reservas WHERE id = '$id' AND idinstalacion = '$idInsta' AND hora = '$hora' AND fecha = '$fechaReserva'");
    }

    public function update($idUserOriginal, $idUser, $horaReserva, $idInstalacion){
        $this->db->manipulacion("UPDATE reservas SET
        id = '$idUser',
        idInstalacion = '$idInstalacion',
        hora = '$horaReserva'
        WHERE id = '$idUserOriginal'
        ");
    }
}