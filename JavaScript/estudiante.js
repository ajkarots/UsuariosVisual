function validarCedulaEcuatoriana(cedula) {
    // Deben ser exactamente 10 dígitos
    if (!/^\d{10}$/.test(cedula)) return false;

    var digitos = cedula.split('').map(Number);
    var provincia = parseInt(cedula.substring(0, 2));
    var tercerDigito = digitos[2];

    // Provincia válida y tercer dígito menor a 6
    if (provincia < 1 || provincia > 24 || tercerDigito >= 6) return false;

    var suma = 0;
    for (var i = 0; i < 9; i++) {
        var mult = (i % 2 === 0) ? 2 : 1;
        var val = digitos[i] * mult;
        if (val > 9) val -= 9;
        suma += val;
    }

    var digitoVerificador = (10 - (suma % 10)) % 10;
    return digitoVerificador === digitos[9];
}
document.addEventListener('DOMContentLoaded', function () {
    var formAgregar = document.getElementById('formulario_agregar');
    if (formAgregar) {
        formAgregar.addEventListener('submit', function (event) {
            let cedula = document.getElementById('CED_EST').value.trim();
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

            

            if (!validarCedulaEcuatoriana(cedula)) {
                event.preventDefault();
                alert('La cédula ingresada no es válida.');
                return;
            }


            if (!/^09\d{8}$/.test(telefono)) {
                event.preventDefault();
                alert('El teléfono debe tener 10 dígitos y empezar con 09.');
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