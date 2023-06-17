const validarCampos = (nombre, apellido1, apellido2, email, usuario, contraseña) => {
    if(nombre=== '' || apellido1 === '' || apellido2 === '' || email === '' || usuario === '' || contraseña === ''){
        return false;
    }
    return true;

}

const validarEmail = (email) => {
    const regex =  /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(email)){
        return true;
    }
    return false;
};

const validarContraseña = (contraseña) => {
    if(contraseña.length >= 4 && contraseña.length <=8) {
        return true;
    }
    alert('Contraseña incorrecta. Debe tener entre 4 y 8 caracteres.')
    return false;
    
};

const validacion = () => {
    const nombre = document.getElementById('nombre').value;
    const apellido1 = document.getElementById('apellido1').value;
    const apellido2 = document.getElementById('apellido2').value;
    const email = document.getElementById('email').value;
    const usuario = document.getElementById('usuario').value;
    const contraseña = document.getElementById('contraseña').value;
    const correcto = validarCampos (nombre, apellido1, apellido2, email, usuario, contraseña);

    if(!correcto) {
        alert('Rellene todos los campos.');
        return;
    }
    if(!validarEmail(email)) {
        alert('Email incorrecto.');
        return;
    }
}



