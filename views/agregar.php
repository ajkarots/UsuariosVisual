<body>
    <main>
        <section class="editar">   
                <form class="form_editar" action="./funciones/agregar_usuario.php" method="POST" id="formulario_agregar_usuario">
                <br></br>
                <h2>Agregar Usuario</h2>
                <input class="cuadro_editar" type="text" placeholder="ID" id="ID_USU" name="ID_USU" required>
                <input class="cuadro_editar" type="text" placeholder="Nombre" id="NOM_USU" name="NOM_USU" required>
                <input class="cuadro_editar" type="password" placeholder="Contraseña" id="CON_USU" name="CON_USU" required>
                <select class="cuadro_editar" name="ROL_USU" id="ROL_USU" required>
                    <option value="admin">Administrador</option>
                    <option value="secretario">Secretario</option>
                    <option value="usuario">Usuario</option>
                </select>
                <button type="submit" class="btn_sql" id="btn_guardar">Guardar</button>
                <a href="index.php?action=admin" class="btn_sql" id="btn_cancelar">Cancelar</a>  
                </form>
           
                </section> 
    </main>
</body>