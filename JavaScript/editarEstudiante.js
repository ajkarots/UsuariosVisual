document.addEventListener('DOMContentLoaded', function() {
    var formEditar = document.getElementById('formulario_editar');
    if (formEditar) {
        formEditar.addEventListener('submit', function(event) {
            let nombre = document.getElementById('NOM_EST').value.trim();
            let apellido = document.getElementById('APE_EST').value.trim();
            let telefono = document.getElementById('TEL_EST').value.trim();
            let direccion = document.getElementById('DIR_EST').value.trim();

            
            let soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
            if (!soloLetras.test(nombre)) {
                event.preventDefault();
                alert('El nombre solo debe contener letras.');
                return;
            }

            if (!soloLetras.test(apellido)) {
                event.preventDefault();
                alert('El apellido solo debe contener letras.');
                return;
            }
                        if (!/^09\d{8}$/.test(telefono)) {
                event.preventDefault();
                alert('El teléfono debe tener 10 dígitos y empezar con 09.');
                return;
            }

            if (!nombre || !apellido || !telefono || !direccion) {
                event.preventDefault();
                alert('Por favor, completa todos los campos.');
                return;
            }

        });
    }
});
