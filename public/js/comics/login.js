function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var togglePassword = document.querySelector('.toggle-password');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePassword.textContent = '🙈'; // Cambia el ícono a un ojo cerrado
    } else {
        passwordInput.type = 'password';
        togglePassword.textContent = '👁️'; // Cambia el ícono a un ojo abierto
    }
}