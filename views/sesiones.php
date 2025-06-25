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
                        <td class="caja_usuarios_1">ID HISTORIAL</td>
                        <td class="caja_usuarios_1">ID USUARIO</td>
                        <td class="caja_usuarios_1">EXITOSO </td>
                        <td class="caja_usuarios_1">IP USUARIO </td>
                        <td class="caja_usuarios_1">INTENTO NUMERO </td>

                    </tr>
                    <tr>
                        <?php
                        include(__DIR__ . '/../funciones/conexion.php');
                        $sql = "SELECT * FROM auditoria_sesiones";
                        $result = mysqli_query($con, $sql);
                        while ($tabla = mysqli_fetch_array($result)) {
                        ?>
                    <tr>
                        <td class="caja_usuarios"><?php echo $tabla['ID_AUD'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['ID_USU'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['EXITO'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['IP_USUARIO'] ?></td>
                        <td class="caja_usuarios"><?php echo $tabla['INTENTO_NRO'] ?></td>
                    </tr>
                <?php
                        }
                        mysqli_close($con);
                ?>
                </tr>
                </table>
            </div>
        </section>
        <a href="index.php?action=admin" class="btn_sql_tabla" id="btn_volver">Volver</a>
    </main>
    <script src="./JavaScript/scriptAdministracion.js"></script>
</body>