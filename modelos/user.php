<?php
    include_once("DB.php");

    class User{
        private $db;

        public function __construct() {
            $this->db = new DB();
        }

        public function getAll(){
            $arrayResult = array();
            $result = $this->db->consulta("SELECT * FROM usuarios INNER JOIN roles ON usuarios.id = roles.id");
            if($result){
                return $result;
            }
            else{
                return null;
            }
        }

        public function consultaMaxId(){
            $result = ($this->db->consulta("SELECT MAX(id) AS maxid FROM usuarios"));
            if($result){
               return $result[0]->maxid;
            }
            else{
                return null;
            }
        }

        public function insert($maxId, $email, $password, $nombre, $apellido1, $apellido2, $dni){
            $this->db->manipulacion("INSERT INTO usuarios
            VALUES ('$maxId','$email','$password', '$nombre', '$apellido1', '$apellido2', '$dni', 'avatarDefault.svg')");

            $this->db->manipulacion("INSERT INTO roles
            VALUES ('$maxId', 'usuario')"); 
        }

        public function comprobarUserPass($userOemail, $password){
            // Comprobar usuario por suy nombre
            $result = $this->db->consulta("SELECT * FROM usuarios
            INNER JOIN roles
            ON usuarios.id = roles.id
            WHERE nombre = '$userOemail' AND password = '$password'");
                // Buscamos por email
            if(!$result){
                if($result = $this->db->consulta("SELECT * FROM usuarios
                INNER JOIN roles
                ON usuarios.id = roles.id
                WHERE email = '$userOemail' AND password = '$password'")){
                }
            }
            return $result;
        }

        public function search($busqueda, $tipo){
            $arrayResult = array();
            if($tipo == "buscarId"){
                $result = $this->db->consulta("SELECT * FROM usuarios INNER JOIN roles ON usuarios.id = roles.id WHERE usuarios.id = '$busqueda'");
                    if($result){
                        return $result;
                     }
                 else{
                     return null;
                 }
        }
        elseif($tipo == "buscarEmail"){
            $result = $this->db->consulta("SELECT * FROM usuarios INNER JOIN roles ON usuarios.id = roles.id WHERE email = '$busqueda' ORDER BY email DESC");
                if($result){
                   return $result;
                }
            else{
                return null;
            }
        }
        elseif($tipo == "buscarNombre"){
            $result = $this->db->consulta("SELECT * FROM usuarios INNER JOIN roles ON usuarios.id = roles.id WHERE nombre = '$busqueda' ORDER BY nombre DESC");
                if($result){
                    return $result;
                 }
             else{
                 return null;
             }
        }
        elseif($tipo == "buscarApellido1"){
            $result = $this->db->consulta("SELECT * FROM roles
            INNER JOIN usuarios
            ON usuarios.id = roles.id WHERE apellido1 = '$busqueda'");
                if($result){
                    return $result;
                 }
             else{
                 return null;
             }
        }

        elseif($tipo == "buscarApellido2"){
            $result = $this->db->consulta("SELECT * FROM roles
            INNER JOIN usuarios
            ON usuarios.id = roles.id WHERE apellido2 = '$busqueda'");
                if($result){
                    return $result;
                 }
             else{
                 return null;
             }
        }

        elseif($tipo == "buscarDni"){
            $result = $this->db->consulta("SELECT * FROM roles
            INNER JOIN usuarios
            ON usuarios.id = roles.id WHERE dni = '$busqueda'");
                if($result){
                    return $result;
                 }
             else{
                 return null;
             }
        }

        return $arrayResult;
    }

    public function update($usuario_id_original, $usuario_id, $email, $nombre, $apellido1, $apellido2, $dni){
        $this->db->manipulacion("UPDATE usuarios SET 
        id = '$usuario_id',
        email = '$email',
        nombre = '$nombre',
        apellido1 = '$apellido1',
        apellido2 = '$apellido2',
        dni = '$dni'
        WHERE id = '$usuario_id_original'
        ");

        $this->db->manipulacion("UPDATE roles SET
        id = '$usuario_id'
        WHERE id = '$usuario_id_original' 
        "); 
    }

    public function delete($id){
        $this->db->manipulacion("DELETE FROM usuarios WHERE id = '$id'");
        $this->db->manipulacion("DELETE FROM roles WHERE id = '$id'");
    }

    public function insertarImg($idUsuario, $nombreUsuario) {
        $nombre_imagen = $nombreUsuario;
        $tipo_imagen = $_FILES["foto_perfil"]["type"];
        $tamano_imagen = $_FILES["foto_perfil"]["size"];
        $fichero_subido = "assets/images/perfilUser/".$_FILES['foto_perfil']['name'];
        $extension = substr("$tipo_imagen", 6);
        $tipo_archivo = substr("$tipo_imagen", 0, 5);
        
        if($tipo_archivo == "image" && $tamano_imagen < 999999){
            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $fichero_subido)) {
                rename("$fichero_subido", "assets/images/perfilUser/$nombreUsuario.$extension");
                $this->db->manipulacion("UPDATE usuarios SET
                imagen = '$nombre_imagen.$extension'
                WHERE id = '$idUsuario' 
                "); 
            }
        }
    }   
}