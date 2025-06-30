
document.addEventListener('DOMContentLoaded', function () {
    var formAgregar = document.getElementById('formulario_editar_usuario');
    if (formAgregar) {
        formAgregar.addEventListener('submit', function (event) {
            let nombre = document.getElementById('NOM_USU').value.trim();


            let soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
            if (!soloLetras.test(nombre)) {
                event.preventDefault();
                alert('El nombre solo debe contener letras.');
                return;
            }



            if (!cedula || !nombre || !apellido || !telefono || !direccion) {
                event.preventDefault();
                alert('Por favor, completa todos los campos.');
                return;
            }



        });
    }
});