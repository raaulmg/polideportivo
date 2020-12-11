<?php
    $month = date("m");
    $year = date("Y");
    $diaActual = date("d");
    $diaSemana = date("w", mktime(0, 0, 0, $month, 1, $year)) + 7;
    $ultimoDiaMes = date("d", (mktime(0, 0, 0, $month + 1, 1, $year) - 1));
    $meses = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        echo 
        // Calendario 1
        "
        <div class='col-6' style='text-align:center;'>
        <strong>$meses[$month]</strong>
        <table class='calendario' style='background:white; border-collapse: collapse; border-radius: 0.2em; text-align:center; display:flex; justify-content:center;'>
            <tr>
                <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
                <th>Vie</th><th>Sab</th><th>Dom</th>
            </tr>
            <tr>
            ";

                $last_cell = $diaSemana + $ultimoDiaMes;

                for ($i = 1; $i <= 42; $i++) {

                    if ($i == $diaSemana) {
                        // determinamos en que dia empieza
                        $day = 1;
                    }

                    if ($i < $diaSemana || $i >= $last_cell) {
                        // celca vacia
                        echo "<td>&nbsp;</td>";
                    } else {

                        // mostramos el dia
                        if ($day == $diaActual)
                            echo "<td class='hoy'>
                            <form action='index.php'>
                                <input type='hidden' name='action' value='mostrarEditarReservar'>
                                <input type='hidden' name='mesReservar' value='$month'>
                                <input type='hidden' name='anoReservar' value='$year'>
                                <button class='btn btn-light' style='color:red;' type='submit' name='diaReservar' value='$day'> ".$day."</button></td>
                            </form>";
                            else{
                                echo "<td>
                                <form action='index.php'>
                                <input type='hidden' name='action' value='mostrarEditarReservar'>
                                <input type='hidden' name='mesReservar' value='$month'>
                                <input type='hidden' name='anoReservar' value='$year'>
                                <button class='btn' style='";
                                for($y = 0; $y < count($reservaMesDia); $y++){
                                    $mesReservado = substr(strval($reservaMesDia[$y]), 0, 2);
                                    $diaReservado = substr(strval($reservaMesDia[$y]), 3, 3);
                                    $reservada = "background:white;";
                                    if($mesReservado == $month && $diaReservado == $day){
                                      echo "background:red; color:white;";
                                    }
                                }
                                echo "
                                type='submit' name='diaReservar' value='$day'>$day</button></td>
                                </form>";
                            }

                        $day++;
                    }

                    // cuando llega al final de la semana, iniciamos una columna nueva

                    if ($i % 7 == 0) {

                        echo "</tr><tr>\n";
                    }
                }
                
            echo "
            </tr>
        </table>
        </div>";

        // Calendario 2

    $month = date("m");
    $year = date("Y");
    $month +=1;
    if($month > 12){
        $month = 01;
        $year++;
    }
    $diaActual = date("d");
    $diaSemana = date("w", mktime(0, 0, 0, $month, 1, $year)) + 7;
    $ultimoDiaMes = date("d", (mktime(0, 0, 0, $month + 1, 1, $year) - 1));
    $meses = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        echo 
        "
        <div class='col-6' style='text-align:center;'>
        <strong>$meses[$month]</strong>
        <table class='calendario' style='background:white; border-collapse: collapse; border-radius: 0.2em; text-align:center; display:flex; justify-content:center;'>
            <tr>
                <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
                <th>Vie</th><th>Sab</th><th>Dom</th>
            </tr>
            <tr>
            ";

                $last_cell = $diaSemana + $ultimoDiaMes;

                for ($i = 1; $i <= 42; $i++) {

                    if ($i == $diaSemana) {
                        // determinamos en que dia empieza
                        $day = 1;
                    }

                    if ($i < $diaSemana || $i >= $last_cell) {
                        // celca vacia
                        echo "<td>&nbsp;</td>";
                    } else {

                        // mostramos el dia
                        if ($day == $diaActual)
                            echo "<td class='hoy'>
                            <form action='index.php'>
                            <input type='hidden' name='action' value='mostrarEditarReservar'>
                            <input type='hidden' name='mesReservar' value='$month'>
                            <input type='hidden' name='anoReservar' value='$year'>
                            <button class='btn btn-light' style='color:red;' type='submit' name='diaReservar' value='$day'> ".$day."</button></td>
                            </form>";
                        else{
                            echo "<td>
                            <form action='index.php'>
                            <input type='hidden' name='action' value='mostrarEditarReservar'>
                            <input type='hidden' name='mesReservar' value='$month'>
                            <input type='hidden' name='anoReservar' value='$year'>
                            <button class='btn' style='";
                            for($y = 0; $y < count($reservaMesDia); $y++){
                                $mesReservado = substr(strval($reservaMesDia[$y]), 0, 2);
                                $diaReservado = substr(strval($reservaMesDia[$y]), 3, 3);
                                $reservada = "background:white;";
                                if($mesReservado == $month && $diaReservado == $day){
                                  echo "background:red; color:white;";
                                }
                            }
                            echo "
                            type='submit' name='diaReservar' value='$day'>$day</button></td>
                            </form>";
                        }

                        $day++;
                    }

                    // cuando llega al final de la semana, iniciamos una columna nueva

                    if ($i % 7 == 0) {

                        echo "</tr><tr>\n";
                    }
                }
                
            echo "
            </form>
            </tr>
        </table>
        </div>";