<?php
    if(isset($data["fechaReservar"])){
        $fechaReservar = $data["fechaReservar"];
        echo "
        <div class='container' style='text-align:center;'>
            <div class='row' style='justify-content:center;'>
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
            <form action='index.php'>
            <div class='col-12'>
                <h5>el usuario con <strong>id:</strong> <input type='number' name='idUser' value='$idReserva' style='background:transparent; border:none; border-bottom:1px solid; width:65px;'>
                tiene una reserva a las <input type='time' name='horaReser' value='$horaReserva'>";
            if($data["listaInstalaciones"]){
                foreach($data["listaInstalaciones"] as $instalacionComprobar){
                    $idInstaComprobar = $instalacionComprobar->id;
                if($idInstalacion == $idInstaComprobar){
                    echo " en la pista: <strong>$instalacionComprobar->nombre</strong> con <strong>idInstalacion:</strong> <input type='number' name='idInsta' value='$idInstalacion' style='background:transparent; border:none; border-bottom:1px solid; width:65px;'></h5>
                    </div>";
                }
            }
        }
        echo "
        <div class='col-12' style='margin-bottom:20px; margin-top:20px;'>
        <input type='hidden' name='idUserOriginal' value='$idReserva'>
        <input type='hidden' name='fechaReserva' value='$fechaReserva'>
        <button class='btn btn-danger' name='action' value='borrarReserva'>Borrar</button>
        <button class='btn btn-success' name='action' value='modificarReserva'>Modificar</button>
        </div>
        </form>";
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

    echo "
    <a href='index.php?action=mostrarHome'>
    <i class='fa fa-arrow-left' style='cursor:pointer; position:absolute; top:20px; left:20px; font-size:2.5rem; color:black;'></i>
    </a";