<?php
        echo "
        <header class='fixed-top'>
        <nav class='navbar navbar-light navHome' id='menuNav' style='height: 70px'>
          <div class='container-fluid'>
            <div class='row w-100 text-center d-flex justify-content-end'>
  
              <div class='col-8'>
                <span class='navTitulo'>
                  <a href='index.php?action=mostrarHome' id='navTitulo' style='color:white;'><p style='font-size: 1.6rem; position: absolute; bottom: -6px;'>Polideportivo</p></a>
                </span>
              </div>
              <div class='col-4'>
              <span style='color:white; margin-right: 15px;'>Bienvenido <strong>$_SESSION[username]</strong></span> <a href='index.php?action=cerrarSesion' class='nav-link' style='display:inline-block'>Cerrar sesión</a>
              </div>
            </div>
        </nav>
        </header>
        ";
        echo "
        <div class='container' style='position: absolute; top: 100px;'>
            <div class='row'>
            ";
        $reservaMesDia = array();
        $countReservas = 0;
        if(isset($data["listaReservas"])){
            
            foreach($data["listaReservas"] as $reserva){
                $id = $reserva->id;
                $fecha = $reserva->fecha;
                $hora = $reserva->hora;
                $precio = $reserva->precio;
                $mesActual = date("m");
                $anoActual = date("y");
                $diaActual = date("d");

                if(date($mesActual+1) > 12 && 01 == date("n", strtotime("$fecha"))){
                    $anoActual++;
                }

                if(date("y", strtotime("$fecha")) == $anoActual){
                    if(date("n", strtotime("$fecha")) == date("m")){
                        $reservaMesDia[$countReservas] = date("m-d", strtotime("$fecha"));
                        $countReservas++;
                    }
                    elseif(date("n", strtotime("$fecha")) == date($mesActual+1)){
                        $reservaMesDia[$countReservas] = date("m-d", strtotime("$fecha"));
                        $countReservas++;
                    }
                    elseif(date($mesActual+1) > 12 && 01 == date("m", strtotime("$fecha"))){
                        $reservaMesDia[$countReservas] = date("m-d", strtotime("$fecha"));
                        $countReservas++;
                    }
                };
    
                }
            }

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
                                        <input type='hidden' name='action' value='mostrarReservarReserva'>
                                        <input type='hidden' name='mesReservar' value='$month'>
                                        <input type='hidden' name='anoReservar' value='$year'>
                                        <button class='btn btn-light' style='color:red;' type='submit' name='diaReservar' value='$day'> ".$day."</button></td>
                                    </form>";
                                    else{
                                        echo "<td>
                                        <form action='index.php'>
                                        <input type='hidden' name='action' value='mostrarReservarReserva'>
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
                                    <input type='hidden' name='action' value='mostrarReservarReserva'>
                                    <input type='hidden' name='mesReservar' value='$month'>
                                    <input type='hidden' name='anoReservar' value='$year'>
                                    <button class='btn btn-light' style='color:red;' type='submit' name='diaReservar' value='$day'> ".$day."</button></td>
                                    </form>";
                                else{
                                    echo "<td>
                                    <form action='index.php'>
                                    <input type='hidden' name='action' value='mostrarReservarReserva'>
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
?>
