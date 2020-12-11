<?php
    if(isset($data["horarioInstalacion"])){
        foreach($data["horarioInstalacion"] as $horario){
            $idInstalacion = $horario->id;
            $hora_inicio = $horario->hora_inicio;
            $hora_fin = $horario->hora_fin;
        }
    }

    $nombreInsta = $_REQUEST["nombreInstaReservar"];
    $precioInsta = $_REQUEST["precioInstaReservar"];
    $fechaInsta = $_REQUEST["fechaInstaReservar"];
    
    echo "
    <form action='index.php'>
    <div class='container' style='text-align:center;'>
        <div class='row'>
            <div class='col-12'>
                <h4>Desea reservar la instalación:<strong> $nombreInsta</strong></h4>
            </div>
        </div>
        <div class='row'>
            <div class='col-12'>
                <h4>Precio:<strong> $precioInsta €</strong></h4>
            </div>
        </div>
        <div class='row'>
            <div class='col-12'>
                <h4>En la siguiente fecha: <strong> $fechaInsta</strong></h4>
            </div>
        </div>
        <br>
        <div class='row'>
            <div class='col-12'>
                <h4>Seleccione la hora a la que desea reservar:</h4>
                <br>
                <select name='horaReservar' style='border-radius: 4px; width: 100px;'>
                ";

                $condicionHorario = true;
                $horaAux = intval($hora_inicio);
                while($condicionHorario){
                    if($horaAux != intval($hora_fin)){
                        echo "
                        <option>$horaAux:00:00</option>
                    ";
                    $horaAux = intval($horaAux) + 1;
                    }
                    else{
                        $condicionHorario = false;
                    }

                }

                echo "
              </select>
            </div>
        </div>
        <br>
        <br>
        <input type='hidden' name='precioInsta' value='$precioInsta'>
        <input type='hidden' name='fecha' value='$fechaInsta'>
        <input type='hidden' name='idInstalacion' value='$idInstalacion'>
        <input type='hidden' name='action' value='hacerReserva'>
        <button class='btn btn-success' type='submit'>Hacer reserva</button>
    </div>
    </form>"
    ;