<?php
    include_once("controlador.php");
    include_once("modelos/seguridad.php");

    $controlador = new Controlador();
    $seguridad = new Seguridad();
    
    if(isset($_REQUEST["action"])){
        if($seguridad->haySesionIniciada()){
            $action = $_REQUEST["action"];
        }
        elseif($_REQUEST["action"] == "mostrarLogin" || $_REQUEST["action"] == "procesarLogin"){
            $action = $_REQUEST["action"];
        }
        else{
            $action = "mostrarLogin";
        }

    }
    else{
        $action = "mostrarLogin";
    }

    $controlador->$action();