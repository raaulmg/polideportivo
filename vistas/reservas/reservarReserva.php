<?php
    if(isset($data["fechaReservar"])){
        $fechaReservar = $data["fechaReservar"];
        echo "
        <a href='index.php?action=mostrarHome'>
        <i class='fa fa-arrow-left' style='cursor:pointer; position:absolute; top:20px; left:20px; font-size:2.5rem; color:black;'></i>
        </a>
        <div class='container' style='text-align:center;'>
            <div class='row'>
                <div class='col-12'>
                    <h4>Desea reservar para el: <strong>$fechaReservar</strong></h4>
                </div>
        ";
    }

    if(isset($data["listaReservas"])){

        echo "
        <div class='col-12'>
            <h4>Tienes reservas para este día:</h4>
        </div>
        <br>
        <br>";

        foreach($data["listaReservas"] as $reserva){
            $idReserva = $reserva->id;
            $idInstalacion = $reserva->idInstalacion;
            $fechaReserva = $reserva->fecha;
            $horaReserva = $reserva->hora;
            $precioReserva = $reserva->precio;
            echo "
            <div class='col-12'>
                <h5>Tienes una reserva a las <strong>$horaReserva</strong> ";
            if($data["listaInstalaciones"]){
                foreach($data["listaInstalaciones"] as $instalacionComprobar){
                    $idInstaComprobar = $instalacionComprobar->id;
                if($idInstalacion == $idInstaComprobar){
                    echo "en la pista: <strong>$instalacionComprobar->nombre</strong></h5>
                    </div>";
                }
            }
        }
    }
}
    else{
        echo "
        <div class='col-12'>
            <h5>No tienes ninguna reserva hecha aun para este día.</h5>
        </div>
        </div>
        </div>
        ";
    }

    if(isset($data["listaInstalaciones"])){
        echo "
        <div class='container' style='position: absolute; top: 100vh;'>
            <div class='row'>
        ";

        foreach($data["listaInstalaciones"] as $instalacion){
            $id = $instalacion->id;
            $nombre = $instalacion->nombre;
            $descripcion = $instalacion->descripcion;
            $imagen = $instalacion->imagen;
            $precio = $instalacion->precio;
            $hora_inicio = $instalacion->hora_inicio;
            $hora_fin = $instalacion->hora_fin;
            echo "
            <div class='col-6 perfilesInstalaciones'>
                <main style='width:100%;' style='display: flex; justify-content: center; text-align:center;'>
                    <div class='container'>
                    <div class='row'>
                        <div class='col-12'>
                            <img src='assets/images/perfilInsta/$imagen' style='border-radius:5px; width:440px; height:440px;'>
                        </div>
                    </div>
                        <div class='row'>
                            <div class='col-12' style='text-align:center;'>
                                <strong>$nombre</strong>
                            </div>
                        </div>
                        <span>
                        <div class='row' style='text-align:center;'>
                            <div class='col-12'>
                                <strong>Descripción:</strong>
                                <br><br>
                                $descripcion
                            </div>
                        </div>
                        <div class='row' style='text-align:center;'>
                        <div class='col-6'>
                            <strong>Hora inicio:</strong> $hora_inicio
                        </div>
                        <div class='col-6'>
                            <strong>Hora fin:</strong> $hora_fin
                        </div>
                        </div>
                        <div class='row' style='text-align:center;'>
                            <div class='col-12'>
                                <strong>Precio:</strong> $precio €
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12' style='text-align:center;'>
                            <form action='index.php'>
                                <input type='hidden' name='action' value='mostrarReservarHorario'>
                                <input type='hidden' name='horaReservar'>
                                <input type='hidden' name='idInstaReservar' value='$id'>
                                <input type='hidden' name='nombreInstaReservar' value='$nombre'>
                                <input type='hidden' name='precioInstaReservar' value='$precio'>
                                <input type='hidden' name='fechaInstaReservar' value='$fechaReservar'>
                                <button class='btn btn-success' style='width:60%; margin-bottom:15px;' type='submit'>Reservar</button>
                            </form>        
                            </div>
                        </span>
                    </div>
                </main>
            </div>
            ";
        }
    }