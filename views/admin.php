    <?php
    include(__DIR__ . '/../funciones/conexion.php');

    if (!isset($_SESSION['usuario'])) {
        echo '
    <script>
    alert("Debes iniciar sesion");
    window.location = "login.php";
    </script>';
        session_destroy();
        die();
    }
    $id = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE ID_USU = '$id'";
    $result = mysqli_query($con, $sql);
    $usuario = $result->fetch_assoc();
    mysqli_close($con);
    ?>
    <section class="administracion">


        <div class="contenedor_administracion">
            <h2>Usuarios</h2>
            <input type="text" id="buscador_usuarios" class="input_buscador" placeholder="Buscar usuario...">
            <table class="retorno_mysql">
                <thead>
                    <tr>
                        <th>USUARIO</th>
                        <th>NOMBRE</th>
                        <th>Contraseña</th>
                        <th>ROL</th>
                        <?php if ($usuario['ROL_USU'] == 'admin') { ?>
                            <th colspan="3">Acciones</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        include(__DIR__ . '/../funciones/conexion.php');
                        $id = $_SESSION['usuario'];
                        $sql = "SELECT * FROM usuarios WHERE ID_USU = '$id'";
                        $result = mysqli_query($con, $sql);
                        $usuario = $result->fetch_assoc();

                        $sql = "SELECT * FROM `usuarios`";
                        $result = mysqli_query($con, $sql);
                        while ($tabla = mysqli_fetch_array($result)) {
                        ?>
                    <tr>
                        <td><?php echo $tabla['ID_USU'] ?></td>
                        <td><?php echo $tabla['NOM_USU'] ?></td>
                        <td><?php echo $tabla['CON_USU'] ?></td>
                        <td><?php echo $tabla['ROL_USU'] ?></td>
                        <?php if ($usuario['ROL_USU'] == 'admin') { ?>
                            <td><a href="index.php?action=editar&id=<?php echo $tabla['ID_USU'] ?>" class="btn_sql" id="btn_editar" value="['id']">Editar</a></td>
                            <td><a href="funciones/eliminar.php?id=<?php echo $tabla['ID_USU'] ?>" class="btn_sql" id="btn_eliminar" value="['id']">Eliminar</a></td>
                            <td><a href="funciones/reporteIndividual.php?id=<?php echo $tabla['ID_USU'] ?>" class="btn_sql" id="btn_editar" value="['id']">Reporte</a></td>
                        <?php } ?>


                    </tr>
                <?php
                        }
                        mysqli_close($con);
                ?>
                </tr>
                </tbody>

            </table>
        </div>
    </section>
    <section class="botones_administracion">

        <?php if ($usuario['ROL_USU'] == 'secretario' || $usuario['ROL_USU'] == 'admin') { ?>
            <a href="funciones/reporteUsuario.php" class="btn_sql_tabla" id="btn_agregar_usuario">Reporte</a>
        <?php } ?>
        <?php if ($usuario['ROL_USU'] == 'admin') { ?>
            <a href="index.php?action=agregar" class="btn_sql_tabla" id="btn_agregar_usuario">Agregar</a>
            <a href="index.php?action=sesiones" class="btn_sql_tabla" id="btn_agregar_sesiones">Sesiones</a>
        <?php } ?>

    </section>

    <br>

    <section class="contenedor_administracion">
        <h2>Listado de Estudiantes</h2>
        
        <input type="text" id="buscador_estudiantes" class="input_buscador" placeholder="Buscar estudiante...">
        <table class="retorno_mysql2">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <?php if ($usuario['ROL_USU'] == 'admin') { ?>
                        <th colspan="3">Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                include(__DIR__ . '/../funciones/conexion.php');
                $sql  = "SELECT * FROM estudiantes ORDER BY NOM_EST";
                $res  = mysqli_query($con, $sql);
                while ($est = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <td><?= htmlspecialchars($est['CED_EST']) ?></td>
                        <td><?= htmlspecialchars($est['NOM_EST']) ?></td>
                        <td><?= htmlspecialchars($est['APE_EST']) ?></td>
                        <td><?= htmlspecialchars($est['TEL_EST']) ?></td>
                        <td><?= htmlspecialchars($est['DIR_EST']) ?></td>

                        <?php if ($usuario['ROL_USU'] == 'admin') { ?>
                            <td>
                                <a
                                    href="index.php?action=editar_estudiante&ced=<?= urlencode($est['CED_EST']) ?>"
                                    class="btn_sql">Editar</a>
                            </td>
                            <td>
                                <a
                                    href="funciones/eliminar_estudiante.php?ced=<?= urlencode($est['CED_EST']) ?>"
                                    class="btn_sql"
                                    onclick="return confirm('¿Seguro que deseas eliminar al estudiante <?= addslashes($est['NOM_EST']) ?>?');">Eliminar</a>
                            </td>
                            <td>
                                <a
                                    href="funciones/reporteEstudiante.php?ced=<?= urlencode($est['CED_EST']) ?>"
                                    class="btn_sql">Reporte</a>
                            </td>

                        <?php } ?>
                    </tr>
                <?php endwhile;
                mysqli_close($con); ?>
            </tbody>
        </table>
    </section>

    <section class="botones_administracion">

        <?php if ($usuario['ROL_USU'] == 'secretario' || $usuario['ROL_USU'] == 'admin') { ?>
            <a href="funciones/reporteEstudiantes.php" class="btn_sql_tabla" id="btn_agregar_usuario">Reporte</a>
        <?php } ?>
        <?php if ($usuario['ROL_USU'] == 'admin') { ?>
            <a href="index.php?action=agregarEstudiante" class="btn_sql_tabla" id="btn_agregar_usuario">Agregar</a>
            <a href="index.php?action=sesiones" class="btn_sql_tabla" id="btn_agregar_sesiones">Sesiones</a>
        <?php } ?>
        <a href="index.php?action=inicio" class="btn_sql_tabla" id="btn_volver">Volver</a>
    </section>