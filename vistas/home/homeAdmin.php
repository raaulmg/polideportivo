<?php
    echo "
        <div class='panelAdmin shadow-lg'>
            <span>
                <div id='panelAdmin'>
                    <h4>Panel administración</h4>
                    <br>
                    <button class='btn btn-success' onclick='panelAdminUser()'>Administrar usuarios</button>
                    <br><br>
                    <button class='btn btn-success' onclick='panelAdminInsta()'>Administrar instalaciones</button>
                    <br><br>
                    <button class='btn btn-success' onclick='panelAdminReser()'>Administrar Reservas</button>
                    <br><br>
                    <form action='index.php'>
                    <button class='btn btn-danger' type='submit'>Cerrar sesión</button>
                    <input type='hidden' name='action' value='cerrarSesion'>
                    </form>
                </div>
                <div style='display:none' id='panelAdminUser'>
                    <i class='fa fa-times' style='position:absolute; right:10px; font-size: 2rem; cursor:pointer;' onclick='panelAdminUser()'></i>
                    <h4>Administrar usuarios</h4>
                    <br>
                    <form action='index.php'>
                        <div class='input-group'>
                            <input type='text' class='form-control' name='busquedaUser'>
                            <div class='input-group-append'>
                                <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Buscar</button>
                                <div class='dropdown-menu'>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarUserId'>Id</button>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarUserEmail'>Email</button>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarUserNombre'>Nombre</button>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarUserApellido1'>Apellido1</button>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarUserApellido2'>Apellido2</button>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarUserDni'>Dni</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form action='index.php'>
                        <input type='hidden' name='action' value='mostrarListadoUsuarios'>
                        <button class='btn btn-primary' style='width:60%;' type='submit'>Listado usuarios</button>
                    </form>
                    <br>
                    <br>
                    <form action='index.php'>
                        <input type='email' class='form-control' placeholder='Email' name='email'>
                        <br>
                        <input type='password' class='form-control' placeholder='Password' name='pass'>
                        <br>
                        <input type='text' class='form-control' placeholder='Nombre' name='nombre'>
                        <br>
                        <input type='text' class='form-control' placeholder='Apellido1' name='apellido1'>
                        <br>
                        <input type='text' class='form-control' placeholder='Apellido2' name='apellido2'>
                        <br>
                        <input type='text' class='form-control' placeholder='Dni' name='dni'>
                        <br>
                        <input type='hidden' name='action' value='crearUsuario'>
                        <button class='btn btn-success' style='width:60%; type='submit'>Crear</button>
                    </form>
                </div>
                <div style='display:none' id='panelAdminInsta'>
                    <i class='fa fa-times' style='position:absolute; right:10px; font-size: 2rem; cursor:pointer;' onclick='panelAdminInsta()'></i>
                    <h4>Administrar instalaciones</h4>
                    <br>
                    <form action='index.php'>
                        <div class='input-group'>
                            <input type='text' class='form-control' name='busquedaInsta'>
                            <div class='input-group-append'>
                                <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Buscar</button>
                                <div class='dropdown-menu'>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarInstaId'>Id</button>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarInstaNombre'>Nombre</button>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarInstaDescripcion'>Descripción</button>
                                    <button type='submit' class='dropdown-item' name='action' value='buscarInstaPrecio'>Precio</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form action='index.php'>
                        <input type='hidden' name='action' value='mostrarListadoInstalaciones'>
                        <button class='btn btn-primary' style='width:60%;' type='submit'>Listado Instalaciones</button>
                    </form>
                    <br>
                    <br>
                    <form action='index.php'>
                        <input type='text' class='form-control' placeholder='Nombre' name='nombreInsta'>
                        <br>
                        <input type='text' class='form-control' placeholder='Descripción' name='descripcionInsta'>
                        <br>
                        <input type='number' class='form-control' placeholder='Precio' name='precioInsta'>
                        <input type='hidden' name='action' value='crearInstalacion'>
                        <br>
                        <button class='btn btn-success' style='width:60%; type='submit'>Crear</button>
                    </form>
                </div>
                <div style='display:none' id='panelAdminReser'>
                    <i class='fa fa-times' style='position:absolute; right:10px; font-size: 2rem; cursor:pointer;' onclick='panelAdminReser()'></i>
                    <h4>Administrar reservas</h4>
                    <br>
                    <form action='index.php'>
                        <div class='input-group'>
                            <input type='text' class='form-control' name='busquedaReser'>
                            <div class='input-group-append'>
                                <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Buscar</button>
                                <div class='dropdown-menu'>
                                    <button type='submit' class='dropdown-item' name='action' value=''>Id</button>
                                    <button type='submit' class='dropdown-item' name='action' value=''>Fecha</button>
                                    <button type='submit' class='dropdown-item' name='action' value=''>Hora</button>
                                    <button type='submit' class='dropdown-item' name='action' value=''>Precio</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    <form action='index.php'>
                    <input type='hidden' name='action' value='mostrarListadoReservas'>
                    <button class='btn btn-primary' style='width:60%;' type='submit'>Listado Reservas</button>
                    <br><br>
                    <input type='number' class='form-control' placeholder='Id' name='idReserva'>
                    <br>
                    <input type='number' class='form-control' placeholder='Id instalacion' name='IdInstalacion'>
                    <br>
                    <input type='date' class='form-control' placeholder='Fecha' name='fechaReserva'>
                    <br>
                    <input type='time' class='form-control' placeholder='Hora' name='horaReserva'>
                    <br>
                    <input type='number' class='form-control' placeholder='Precio' name='precioReserva'>
                    <br>
                    <button type='submit' name='action' value='crearReserva' class='btn btn-success'>Crear reserva</button>
                </form>
                </div>
            </span>
        </div>
    ";

    if(isset($data["listaUsuarios"])){
        echo "
        <div class='container' style='position: absolute; top: 100px;'>
            <div class='row'>
            ";

            foreach($data["listaUsuarios"] as $usuario){
                $id = $usuario->id;
                $email = $usuario->email;
                $password = $usuario->password;
                $nombre = $usuario->nombre;
                $apellido1 = $usuario->apellido1;
                $apellido2 = $usuario->apellido2;
                $dni = $usuario->dni;
                $imagen = $usuario->imagen;
                echo "
                <div class='col-6 perfilesUsuarios' style='display: flex; justify-content: center; text-align:center;'>
                    <main style='width:100%;'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-12'>
                                <strong>$nombre</strong>
                            </div>
                        </div>

                        <span>
                        <div class='row'>
                            <div class='col-12'>
                                <img src='assets/images/perfilUser/$imagen' style='border-radius:5px; width:440px; height:440px;'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12'>
                                <form action='index.php' method='post' enctype='multipart/form-data'>
                                    <input type='file' name='foto_perfil' id='foto_perfil'>
                                    <input type='hidden' name='idUsuario' value='$id'>
                                    <input type='hidden' name='nombreUsuario' value='$nombre'>
                                    <button class='btn btn-primary' type='submit' name='action' value='subirImgUser'>Subir</button>
                                </form>
                            </div>
                        </div>
                        <form action='index.php'>
                            <div class='row'>
                                <div class='col-12'>
                                    <strong>Id:</strong> <input type='number' name='idMod' value='$id' style='border:none; border-bottom:solid 1px; width:60%;'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-12'>
                                    <strong>Nombre:</strong> <input type='text' name='nombre' value='$nombre' style='border:none; border-bottom:solid 1px; width:60%;'>
                                </div>
                            </div>

                        <div class='row'>
                            <div class='col-12'>
                                <strong>Email:</strong> <input type='email' name='email' value='$email' style='border:none; border-bottom:solid 1px;'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-6'>
                               <strong>Apellido1:</strong> <input type='' name='apellido1' value='$apellido1' style='border:none; border-bottom:solid 1px;'>
                            </div>
                            <div class='col-6'>
                                <strong>Apellido2:</strong> <input type='' name='apellido2' value='$apellido2' style='border:none; border-bottom:solid 1px;'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12'>
                                <strong>Dni:</strong> <input type='' name='dni' value='$dni' style='border:none; border-bottom:solid 1px;'>
                            </div>
                        </div>

                        <div class='row'>
                           <div class='col-6'>
                                <input type='hidden' name='idOriginal' value='$id'>
                                <button class='btn btn-success' type='submit' name='action' value='modificarUsuario'>Modificar</button>
                            </div>
                            <div class='col-6' style='margin-bottom: 30px;'>
                                <button class='btn btn-danger' type='submit' name='action' value='borrarUsuario'>Borrar</button>
                            </div>
                        </div>
                        </form>
                        </span>
                    </div>
                    </main>
                </div>
                ";
            }

            echo "
            </div>
        </div>";
    }

    if(isset($data["listaInstalaciones"])){
        echo "
        <div class='container' style='position: absolute; top: 100px;'>
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
                                <form action='index.php' method='post' enctype='multipart/form-data'>
                                    <input type='file' name='foto_perfilInsta' id='foto_perfil'>
                                    <input type='hidden' name='idInsta' value='$id'>
                                    <input type='hidden' name='nombreInsta' value='$nombre'>
                                    <button class='btn btn-primary' type='submit' name='action' value='subirImgInsta'>Subir</button>
                                </form>
                            </div>
                        </div>
                        <form action='index.php'>
                        <div class='row' style='text-align:center;'>
                            <div class='col-12'>
                                <strong>Id:</strong> <input type='number' name='idModInsta' value='$id' style='border:none; border-bottom:solid 1px; width:60%;'>
                            </div>
                        </div>
                        <div class='row' style='text-align:center;'>
                            <div class='col-12'>
                                <strong>Nombre:</strong> <input type='text' name='nombreInsta' value='$nombre' style='border:none; border-bottom:solid 1px; width:60%;'>
                            </div>
                        </div>
                        <div class='row' style='text-align:center;'>
                            <div class='col-12'>
                                <strong>Descripción:</strong>
                                <br><br>
                                <textarea rows='4' cols='50' name='descripcionInsta' style='border:none; border-bottom:solid 1px; width:auto;'>$descripcion</textarea>
                            </div>
                        </div>
                        <div class='row' style='text-align:center;'>
                            <div class='col-6'>
                                <strong>Horario Inicio:</strong>
                                <br>
                                <input type='time' name='horarioInicioInsta' value='$hora_inicio' style='border:none; border-bottom:solid 1px; width:60%;'>
                            </div>
                            <div class='col-6'>
                                <strong>Horario fin:</strong>
                                <br>
                                <input type='time' name='horarioFinInsta' value='$hora_fin' style='border:none; border-bottom:solid 1px; width:60%;'>
                            </div>
                        </div>
                        <div class='row' style='text-align:center;'>
                            <div class='col-12'>
                                <strong>Precio:</strong> <input type='number' name='precioInsta' value='$precio' style='border:none; border-bottom:solid 1px; width:60%;'>€
                            </div>
                        </div>
                        <br>
                        <div class='row' style='text-align:center;'>
                            <div class='col-6'>
                                <input type='hidden' name='idOriginalInsta' value='$id'>
                                <button class='btn btn-success' type='submit' name='action' value='modificarInstalacion'>Modificar</button>
                            </div>
                            <div class='col-6' style='margin-bottom: 30px;'>
                                <button class='btn btn-danger' type='submit' name='action' value='borrarInstalacion'>Borrar</button>
                            </div>
                        </div>
                        </form>
                        </span>
                    </div>
                </main>
            </div>
            ";
        }
    }       