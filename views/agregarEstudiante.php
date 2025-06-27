<body>
    <main>
        <section class="editar">   
                <form class="form_editar" action="./funciones/agregar_Estudiante.php" method="POST" id="formulario_editar">
                <br></br>
                <h2>Editar</h2>
                <input class="cuadro_editar" type="text" placeholder="CEDULA" id="CED_EST" name="CED_EST" >
                <input class="cuadro_editar" type="text" placeholder="NOMBRE" id="NOM_EST" name="NOM_EST" >
                <input class="cuadro_editar" type="text" placeholder="APELLIDO" id="APE_EST" name="APE_EST" >
                <input class="cuadro_editar" type="text" placeholder="TELEFONO" id="TEL_EST" name="TEL_EST">
                <input class="cuadro_editar" type="text" placeholder="DIRECCION" id="DIR_EST" name="DIR_EST">
                <button type="submit" class="btn_sql" id="btn_guardar">Guardar</button>
                <a href="index.php?action=admin" class="btn_sql" id="btn_cancelar">Cancelar</a>  
                </form>
           
                </section> 
    </main>
    <script>
    document.getElementById('formulario_editar').addEventListener('submit', function(event) {
let campo1 = document.getElementById('APE_EST').value;
let campo2 = document.getElementById('TEL_EST').value;

if (campo1 === '' || campo2 === '' ) {
 event.preventDefault(); // Evita el envío del formulario
 alert('Por favor, completa todos los campos.');
}
});
</script>
</body>