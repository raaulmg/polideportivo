<?php
    class Seguridad {

        public function __construct(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        public function abrirSesion($usuario) {
            $_SESSION["idUser"] = $usuario->id;
            $_SESSION["username"] = $usuario->nombre;
            $_SESSION["tipoRol"] = $usuario->tipo;
        }

        public function cerrarSesion() {
            session_destroy();
        }

        public function get($variable) {
            return $_SESSION[$variable];
        }

        public function haySesionIniciada() {
            if (isset($_SESSION["idUser"])) {
                return true;
            } 
            return false;
        }

        public function comprobarRolAdmin(){
            if(isset($_SESSION["tipoRol"])){
                if($_SESSION["tipoRol"] == "administrador"){
                    return true;
                }
                return false;
                }
            }

        public function errorAccesoNoPermitido() {
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("usuario/formularioLogin", $data);
        }
    }