
document.addEventListener('DOMContentLoaded', function () {
    var formAgregar = document.getElementById('formulario_editar_usuario');
    if (formAgregar) {
        formAgregar.addEventListener('submit', function (event) {
            let nombre = document.getElementById('NOM_USU').value.trim();
            let contraseña = document.getElementById('CON_USU').value.trim();


            let soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
            if (!soloLetras.test(nombre)) {
                event.preventDefault();
                alert('El nombre solo debe contener letras.');
                return;
            }

            let conVal = /^(?=.*[A-Z])(?=.*[!@#$%^&*.,?¿¡])(.{8,})$/;
            if (!conVal.test(contraseña)) {
                event.preventDefault();
                alert('La contraseña debe tener al menos 8 caracteres, una mayúscula y un carácter especial.');
                return;
            }



            if (!contraseña || !nombre ) {
                event.preventDefault();
                alert('Por favor, completa todos los campos.');
                return;
            }



        });
    }
});