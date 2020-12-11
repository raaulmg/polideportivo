<?php
    include_once("vista.php");
    include_once("modelos/user.php");
    include_once("modelos/seguridad.php");
    include_once("modelos/instalacion.php");
    include_once("modelos/reserva.php");

    class Controlador{

        private $vista, $user, $seguridad, $instalacion, $reserva;

        public function __construct(){
            $this->vista = new Vista();
            $this->user = new User();
            $this->seguridad = new Seguridad();
            $this->instalacion = new Instalacion();
            $this->reserva = new Reserva();
        }

        public function mostrarLogin(){
            if($this->seguridad->haySesionIniciada()){
                $this->mostrarHome();
            }
            else{
            $this->vista->mostrar("usuario/login");
            }
        }

        public function mostrarHome(){
            if($this->seguridad->comprobarRolAdmin()){
                $this->vista->mostrar("home/homeAdmin");
            }
            elseif($this->seguridad->haySesionIniciada()){
                $idUser = $this->seguridad->get("idUser");
                $data["listaReservas"] = $this->reserva->getAllPropias($idUser);
                $this->vista->mostrar("home/home", $data); 
            }
            else{
                $this->mostrarLogin();
            }
        }

        public function procesarLogin(){
            $userOmail = $_REQUEST["userOemail"];
            $pass = $_REQUEST["pass"];
            $result = $this->user->comprobarUserPass($userOmail, $pass);
            if($result){
                    $this->seguridad->abrirSesion($result[0]);
                    $this->mostrarHome();
            }
            else{
                $data["msjError"] = "Usuario/Email o contraseña incorrectos";
                $this->vista->mostrar("usuario/login", $data);
            }
        }

        public function cerrarSesion(){
            $this->seguridad->cerrarSesion();
            $data["msjInfo"] = "Sesion cerrada correctamente";
            $this->vista->mostrar("usuario/login", $data);
        }

        public function crearUsuario(){
            if($this->seguridad->comprobarRolAdmin()){
            $email = $_REQUEST["email"];
            $pass = $_REQUEST["pass"];
            $nombre = $_REQUEST["nombre"];
            $apellido1 = $_REQUEST["apellido1"];
            $apellido2 = $_REQUEST["apellido2"];
            $dni = $_REQUEST["dni"];

            $maxId = $this->user->consultaMaxId();
            $nuevoId = $maxId+1;
            $this->user->insert($nuevoId, $email, $pass, $nombre, $apellido1, $apellido2, $dni);
            $this->mostrarHome();
            }
            else{$this->mostrarHome();}
        }

        public function crearInstalacion(){
            if($this->seguridad->comprobarRolAdmin()){
            $nombreInsta = $_REQUEST["nombreInsta"];
            $descripcionInsta = $_REQUEST["descripcionInsta"];
            $precioInsta = $_REQUEST["precioInsta"];
            $maxId = $this->instalacion->consultaMaxId();
            $nuevoId = $maxId+1;
            $this->instalacion->insert($nuevoId, $nombreInsta, $descripcionInsta, $precioInsta);
            $this->mostrarHome();
            }
            else{$this->mostrarHome();}
        }

        public function mostrarListadoUsuarios(){
            if($this->seguridad->comprobarRolAdmin()){
            $data["listaUsuarios"] = $this->user->getAll();
            $this->vista->mostrar("home/homeAdmin", $data);
            }
            else{$this->mostrarHome();}
        }

        public function buscarUserId(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaUser"];
                $data["listaUsuarios"] = $this->user->search($busqueda, "buscarId"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }

        public function buscarUserEmail(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaUser"];
                $data["listaUsuarios"] = $this->user->search($busqueda, "buscarEmail"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }

        public function buscarUserNombre(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaUser"];
                $data["listaUsuarios"] = $this->user->search($busqueda, "buscarNombre"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }

        public function buscarUserApellido1(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaUser"];
                $data["listaUsuarios"] = $this->user->search($busqueda, "buscarApellido1"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }
        
        public function buscarUserApellido2(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaUser"];
                $data["listaUsuarios"] = $this->user->search($busqueda, "buscarApellido2"); 
                $this->vista->mostrar("home/homeAdmin", $data);
                }
                else{$this->mostrarHome();}
        }

        public function buscarUserDni(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaUser"];
                $data["listaUsuarios"] = $this->user->search($busqueda, "buscarDni"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }

        public function modificarUsuario(){
            if($this->seguridad->comprobarRolAdmin()){
                $idOriginal = $_REQUEST["idOriginal"];
                $idMod = $_REQUEST["idMod"];
                $email = $_REQUEST["email"];
                $nombre = $_REQUEST["nombre"];
                $apellido1 = $_REQUEST["apellido1"];
                $apellido2 = $_REQUEST["apellido2"];
                $dni = $_REQUEST["dni"];
                $this->user->update($idOriginal, $idMod, $email, $nombre, $apellido1, $apellido2, $dni);
                $this->mostrarHome();
                }
                else{$this->mostrarHome();}
        }

        public function mostrarListadoInstalaciones(){
            if($this->seguridad->comprobarRolAdmin()){
                $data["listaInstalaciones"] = $this->instalacion->getAll();
                $this->vista->mostrar("home/homeAdmin", $data);
                }
                else{$this->mostrarHome();}
 
        }

        public function modificarInstalacion(){
            if($this->seguridad->comprobarRolAdmin()){
                $idOriginal = $_REQUEST["idOriginalInsta"];
                $idMod = $_REQUEST["idModInsta"];
                $nombre = $_REQUEST["nombreInsta"];
                $descripcion = $_REQUEST["descripcionInsta"];
                $precio = $_REQUEST["precioInsta"];
                $hora_inicio = $_REQUEST["horarioInicioInsta"];
                $hora_fin = $_REQUEST["horarioFinInsta"];
                $this->instalacion->update($idOriginal, $idMod, $nombre, $descripcion, $precio, $hora_inicio, $hora_fin);
                $this->mostrarHome();
                }
                else{$this->mostrarHome();}

        }

        public function buscarInstaId(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaInsta"];
                $data["listaInstalaciones"] = $this->instalacion->search($busqueda, "buscarId"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }

        public function buscarInstaNombre(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaInsta"];
                $data["listaInstalaciones"] = $this->instalacion->search($busqueda, "buscarNombre"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }

        public function buscarInstaDescripcion(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaInsta"];
                $data["listaInstalaciones"] = $this->instalacion->search($busqueda, "buscarDescripcion"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }

        public function buscarInstaPrecio(){
            if($this->seguridad->comprobarRolAdmin()){
                $busqueda = $_REQUEST["busquedaInsta"];
                $data["listaInstalaciones"] = $this->instalacion->search($busqueda, "buscarPrecio"); 
                $this->vista->mostrar("home/homeAdmin", $data); 
                }
                else{$this->mostrarHome();}
        }

        public function borrarUsuario(){
            if($this->seguridad->comprobarRolAdmin()){
                $id = $_REQUEST["idOriginal"];
                $this->user->delete($id);
                $this->mostrarHome();
                }
                else{$this->mostrarHome();}
        }

        public function borrarInstalacion(){
            if($this->seguridad->comprobarRolAdmin()){
                $id = $_REQUEST["idOriginalInsta"];
                $this->instalacion->delete($id);
                $this->mostrarHome();
                }
                else{$this->mostrarHome();}
        }

        public function subirImgUser(){
            $idUsuario = $_REQUEST["idUsuario"];
            $nombreUsuario = $_REQUEST["nombreUsuario"];
            $this->user->insertarImg($idUsuario, $nombreUsuario);
            $this->mostrarHome();
        }

        public function subirImgInsta(){
            $idInsta = $_REQUEST["idInsta"];
            $nombreInsta = $_REQUEST["nombreInsta"];
            $this->instalacion->insertarImg($idInsta, $nombreInsta);
            $this->mostrarHome();
        }

        public function mostrarListadoReservas(){
            if($this->seguridad->comprobarRolAdmin()){
                $data["listaReservas"] = $this->reserva->getAll();
                $this->vista->mostrar("reservas/listadoReservas", $data);
                }
                else{$this->mostrarHome();}

        }

        public function mostrarReservarReserva(){
            if(isset($_REQUEST["diaReservar"])){
                $diaReservar = $_REQUEST["diaReservar"];
                if(strlen($diaReservar) < 2){$diaReservar = "0$diaReservar";}
            }
            if(isset($_REQUEST["mesReservar"])){
                $mesReservar = $_REQUEST["mesReservar"];
                if(strlen($mesReservar) < 2){$mesReservar = "0$mesReservar";}
            }
            if(isset($_REQUEST["anoReservar"])){$anoReservar = $_REQUEST["anoReservar"];
                $data["fechaReservar"] = $anoReservar."-".$mesReservar."-".$diaReservar;
            }

            if($this->seguridad->comprobarRolAdmin()){
                $data["listaReservas"] = $this->reserva->getAllFecha($data["fechaReservar"]);
            }
            else{
                $idUser = $this->seguridad->get("idUser");
                $data["listaReservas"] = $this->reserva->getAllPropiasFecha($idUser, $data["fechaReservar"]);
            }

            $data["listaInstalaciones"] = $this->instalacion->getAll();
            $this->vista->mostrar("reservas/reservarReserva", $data);

        }

        public function mostrarEditarReservar(){
            if(isset($_REQUEST["diaReservar"])){
                $diaReservar = $_REQUEST["diaReservar"];
                if(strlen($diaReservar) < 2){$diaReservar = "0$diaReservar";}
            }
            if(isset($_REQUEST["mesReservar"])){
                $mesReservar = $_REQUEST["mesReservar"];
                if(strlen($mesReservar) < 2){$mesReservar = "0$mesReservar";}
            }
            if(isset($_REQUEST["anoReservar"])){
                $anoReservar = $_REQUEST["anoReservar"];
                $data["fechaReservar"] = $anoReservar."-".$mesReservar."-".$diaReservar;
            }

            if($this->seguridad->comprobarRolAdmin()){
            $fecha = $data["fechaReservar"];
            $data["listaReservas"] = $this->reserva->getAllFecha($fecha);
            $data["listaInstalaciones"] = $this->instalacion->getAll();
            $this->vista->mostrar("reservas/editarReservas", $data);
            } 
        }

        public function mostrarReservarHorario(){
            $idInsta = $_REQUEST["idInstaReservar"];
            $data["horarioInstalacion"] = $this->instalacion->getHorarioInstalacion($idInsta);
            $this->vista->mostrar("reservas/reservarHorario", $data);
        }

        public function hacerReserva(){
            $idUser = $this->seguridad->get("idUser");
            $idInstalacion = $_REQUEST["idInstalacion"];
            $fecha = $_REQUEST["fecha"];
            $hora = $_REQUEST["horaReservar"];
            $precio = $_REQUEST["precioInsta"];
            $this->reserva->insert($idUser, $idInstalacion, $fecha, $hora, $precio);
            $this->mostrarHome();
        }

        public function borrarReserva(){
            $idUser = $_REQUEST["idUser"];
            $horaReser = $_REQUEST["horaReser"];
            $idInsta = $_REQUEST["idInsta"];
            $fechaReserva = $_REQUEST["fechaReserva"];
            $this->reserva->delete($idUser, $horaReser, $idInsta, $fechaReserva);
            $this->mostrarHome();
        }

        public function crearReserva(){
            $idUser = $_REQUEST["idReserva"];
            $idInstalacion = $_REQUEST["IdInstalacion"];
            $fechaReserva = $_REQUEST["fechaReserva"];
            $horaReserva = $_REQUEST["horaReserva"];
            $precioReserva = $_REQUEST["precioReserva"];
            $this->reserva->insert($idUser, $idInstalacion, $fechaReserva, $horaReserva, $precioReserva);
            $this->mostrarHome();
        }

        public function modificarReserva(){
            $idUserOriginal = $_REQUEST["idUserOriginal"];
            $idUser = $_REQUEST["idUser"];
            $horaReser = $_REQUEST["horaReser"];
            $idInsta = $_REQUEST["idInsta"];
            $this->reserva->update($idUserOriginal, $idUser, $horaReser, $idInsta);
            $this->mostrarHome();
        }
    }