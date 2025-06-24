
<body>
    <main>
        <section class="editar">
        <?php
                include(__DIR__ . '/../funciones/conexion.php');
                $id = $_GET['id'];
                $sql ="SELECT * FROM `usuarios` WHERE `ID_USU` = '$id'";
                $result = mysqli_query($con,$sql);
                $usuario = $result->fetch_assoc();
                mysqli_close($con);
                echo '<h2> '.$usuario['NOM_USU'].'</h2>';
                ?>     
                <form class="form_editar" action="./funciones/editar_usuario.php" method="POST" id="formulario_editar">
                <br></br>
                <h2>Editar</h2>
                <input class="cuadro_editar" type="text" value="<?php echo $usuario['NOM_USU']?>" id="NOM_USU" name="NOM_USU" >
                <input class="cuadro_editar" type="password" value="<?php echo $usuario['CON_USU']?>" id="CON_USU" name="CON_USU">
                <select class="cuadro_editar" name="ROL_USU" id="ROL_USU">
                    <option value="admin">Administrador</option>
                    <option value="secretario">Secretario</option>
                    <option value="usuario">Usuario</option>
                </select>
                <input class="cuadro_editar" type="hidden" id="id" value="<?php echo $id;?>" name="id">
                <button type="submit" class="btn_sql" id="btn_guardar">Guardar</button>
                <a href="index.php?action=admin" class="btn_sql" id="btn_cancelar">Cancelar</a>  
                </form>
           
                </section> 
        <section class="knowledge">
            <div class="knowledge_container container">
                <div class="knowledge_text">
                    <h1>Pagina de administracion</h1>
                </div>
                <figure class="knowledge_picture">
                    <img src="./Imagenes/admin.png" class="knowledge_picture_admin">
                </figure>
            </div>
        </section>  
    </main>
    <script>
    document.getElementById('formulario_editar').addEventListener('submit', function(event) {
let campo1 = document.getElementById('NOM_USU').value;
let campo2 = document.getElementById('CON_USU').value;

if (campo1 === '' || campo2 === '' ) {
 event.preventDefault(); // Evita el envío del formulario
 alert('Por favor, completa todos los campos.');
}
});
</script>

</body>
