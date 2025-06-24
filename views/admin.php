<body>
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
    <main>
        <section class="administracion">


            <div class="contenedor_administracion">
                <table class="retorno_mysql">
                    <tr class="enunciado">
                        <td class="caja_usuarios_1">ID USUARIO</td>
                        <td class="caja_usuarios_1">NOMBRE</td>
                        <td class="caja_usuarios_1">ROL</td>
                    </tr>
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
                        <td class="caja_usuarios"><?php echo $tabla['ID_USU'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['NOM_USU'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['ROL_USU'] ?></td>
                                                <?php if ($usuario['ROL_USU'] == 'admin') { ?>
                        <td><a href="index.php?action=editar&id=<?php echo $tabla['ID_USU'] ?>" class="btn_sql" id="btn_editar" value="['id']">Editar</a></td>
                        <td><a href="funciones/eliminar.php?id=<?php echo $tabla['ID_USU'] ?>" class="btn_sql" id="btn_eliminar" value="['id']">Eliminar</a></td>
                        <?php } ?>
                        
                        
                    </tr>
                <?php
                        }
                        mysqli_close($con);
                ?>
                </tr>
                </table>
            </div>
        </section>
        <?php if($usuario['ROL_USU']=='secretario' ||$usuario['ROL_USU']=='admin' ) {?>
        <a href="funciones/reporteUsuario.php" class="btn_sql_tabla  id="btn_agregar_usuario>Reporte</a>
        <?php } ?>
        <a href="index.php?action=inicio" class="btn_sql_tabla" id="btn_volver">Volver</a>
        <?php if($usuario['ROL_USU']=='admin') {?>
        <a href="index.php?action=agregar" class="btn_sql_tabla" id="btn_agregar_usuario">Agregar</a>
        <?php } ?>
    </main>
    <script src="./JavaScript/scriptAdministracion.js"></script>
</body>