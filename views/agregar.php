<body>
    <main>
        <section class="editar">   
                <form class="form_editar" action="./funciones/agregar_usuario.php" method="POST" id="formulario_editar">
                <br></br>
                <h2>Editar</h2>
                <input class="cuadro_editar" type="text" placeholder="ID" id="ID_USU" name="ID_USU" >
                <input class="cuadro_editar" type="text" placeholder="Nombre" id="NOM_USU" name="NOM_USU" >
                <input class="cuadro_editar" type="password" placeholder="Contraseña" id="CON_USU" name="CON_USU">
                <select class="cuadro_editar" name="ROL_USU" id="ROL_USU">
                    <option value="admin">Administrador</option>
                    <option value="secretario">Secretario</option>
                    <option value="usuario">Usuario</option>
                </select>
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