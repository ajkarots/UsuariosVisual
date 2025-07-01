
document.addEventListener('DOMContentLoaded', function() {
    const buscadorUsuarios = document.getElementById('buscador_usuarios');
    if(buscadorUsuarios){
        buscadorUsuarios.addEventListener('keyup', function() {
            let filtro = this.value.toLowerCase();
            let filas = document.querySelectorAll('.contenedor_administracion table.retorno_mysql:nth-of-type(1) tbody tr');

            filas.forEach(function(fila) {
                let texto = fila.textContent.toLowerCase();
                fila.style.display = texto.includes(filtro) ? '' : 'none';
            });
        });
    }

    // --- BUSCADOR ESTUDIANTES ---
    const buscadorEstudiantes = document.getElementById('buscador_estudiantes');
    if(buscadorEstudiantes){
        buscadorEstudiantes.addEventListener('keyup', function() {
            let filtro = this.value.toLowerCase();
            // La segunda tabla en tu HTML es la de estudiantes (nth-of-type(2))
            let filas = document.querySelectorAll('.contenedor_administracion table.retorno_mysql2:nth-of-type(1) tbody tr');
            filas.forEach(function(fila) {
                let texto = fila.textContent.toLowerCase();
                fila.style.display = texto.includes(filtro) ? '' : 'none';
            });
        });
    }
});

