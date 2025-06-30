
        <section class="editar">   
                <form class="form_editar" action="./funciones/registrar_usuario.php" method="POST" id="formulario_registro_usuario" >
                <br></br>
                <h2>Registro Usuario</h2>
                <input class="cuadro_editar" type="text" placeholder="ID" id="ID_USU" name="ID_USU"  required >
                <input class="cuadro_editar" type="text" placeholder="Nombre" id="NOM_USU" name="NOM_USU" required >
                <input class="cuadro_editar" type="password" placeholder="Contraseña" id="CON_USU" name="CON_USU" required>
                <button type="submit" class="btn_sql" id="btn_guardar">Guardar</button>
                <a href="index.php?action=inicio" class="btn_sql" id="btn_cancelar">Cancelar</a>  
                </form>
                </section> 
 