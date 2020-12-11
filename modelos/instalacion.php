<?php
    include_once("DB.php");

    class Instalacion{
        private $db;

        public function __construct() {
            $this->db = new DB();
        }

        public function getAll(){
            $arrayResult = array();
            $result = $this->db->consulta("SELECT * FROM instalaciones
            INNER JOIN horarioinstalacion
            ON instalaciones.id = horarioinstalacion.id");
            if($result){
                return $result;
            }
            else{
                return null;
            }
        }

        public function update($idOriginal, $idMod, $nombre, $descripcion, $precio, $hora_inicio, $hora_fin){
            $this->db->manipulacion("UPDATE instalaciones SET
            id = '$idMod',
            nombre = '$nombre',
            descripcion = '$descripcion',
            precio = '$precio'
            WHERE id = '$idOriginal'
            ");

            $this->db->manipulacion("UPDATE horarioinstalacion SET
            hora_inicio = '$hora_inicio',
            hora_fin = '$hora_fin'
            WHERE id = '$idOriginal'
            ");
        }

        public function consultaMaxId(){
            $result = ($this->db->consulta("SELECT MAX(id) AS maxid FROM instalaciones"));
            if($result){
               return $result[0]->maxid;
            }
            else{
                return null;
            }
        }

        public function insert($maxId, $nombre, $descripcion, $precio){
            $this->db->manipulacion("INSERT INTO instalaciones
            VALUES ('$maxId','$nombre','$descripcion','instaDefault.png', '$precio')");

            $this->db->manipulacion("INSERT INTO horarioinstalacion
            VALUES ('$maxId','entreSemana','08:00:00','22:00:00')");
        }

        public function insertarImg($idInsta, $nombreInsta) {
            $nombre_imagen = $nombreInsta;
            $tipo_imagen = $_FILES["foto_perfilInsta"]["type"];
            $tamano_imagen = $_FILES["foto_perfilInsta"]["size"];
            $fichero_subido = "assets/images/perfilInsta/".$_FILES['foto_perfilInsta']['name'];
            $extension = substr("$tipo_imagen", 6);
            $tipo_archivo = substr("$tipo_imagen", 0, 5);
            
            if($tipo_archivo == "image" && $tamano_imagen < 999999){
                if (move_uploaded_file($_FILES['foto_perfilInsta']['tmp_name'], $fichero_subido)) {
                    rename("$fichero_subido", "assets/images/perfilInsta/$nombreInsta.$extension");
                    $this->db->manipulacion("UPDATE instalaciones SET
                    imagen = '$nombre_imagen.$extension'
                    WHERE id = '$idInsta' 
                    "); 
                }
            }
        }

        public function search($busqueda, $tipo){
            $arrayResult = array();
            if($tipo == "buscarId"){
                $result = $this->db->consulta("SELECT * FROM instalaciones WHERE id = '$busqueda'");
                    if($result){
                        return $result;
                     }
                 else{
                     return null;
                 }
            }
            elseif($tipo == "buscarNombre"){
                $result = $this->db->consulta("SELECT * FROM instalaciones WHERE nombre = '$busqueda'");
                if($result){
                    return $result;
                 }
             else{
                 return null;
                }
            }
            elseif($tipo == "buscarDescripcion"){
                $result = $this->db->consulta("SELECT * FROM instalaciones WHERE descripcion = '$busqueda'");
                if($result){
                    return $result;
                 }
             else{
                 return null;
                }
            }
            elseif($tipo == "buscarPrecio"){
                $result = $this->db->consulta("SELECT * FROM instalaciones WHERE precio = '$busqueda'");
                if($result){
                    return $result;
                 }
             else{
                 return null;
                }
            }   
        }

        public function delete($id){
            $this->db->manipulacion("DELETE FROM instalaciones WHERE id = '$id'");
            $this->db->manipulacion("DELETE FROM horarioinstalacion WHERE id = '$id'");
        }

        public function getHorarioInstalacion($idInsta){
            $result = $this->db->consulta("SELECT * FROM horarioinstalacion WHERE id = '$idInsta'");
            if($result){
                return $result;
            }
            else{
                return null;
            }
        }
}