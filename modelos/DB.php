<?php
/**
 * Capa de abstracción de la base de datos para MySQL
 * Conecta la aplicación con el gestor de la BD
 */

include_once("config.php");

class DB {

    private $db;
    
    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }
    
    public function consulta($sql) {
        $arrayResult = null;

        if ($result = $this->db->query($sql)) {
            if ($result->num_rows > 0){
                $arrayResult = array();
                while($fila = $result->fetch_object()){
                    $arrayResult[] = $fila;
                }

            }
        return $arrayResult;
        }
    }

    public function manipulacion($sql) {
        $this->db->query($sql);
        return $this->db->affected_rows;
    }
}
