<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/finanzas/login.css   ') }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon_Finanzas.jpg') }}" type="image/x-icon">

    {{-- Floowbite --}}
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="login-container">
        <h2>Usuario Nuevo</h2>

        <!-- Mostrar errores de autenticación -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="">
            @csrf
            <div class="form-group">
                <label for="email" style="color: black">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }} "
                    required autofocus
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
            </div>
            <div class="form-group">
                <label for="email" style="color: black">Nombre</label>
                <input type="name" id="name" name="name" value="{{ old('name')}} "
                    required autofocus
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
            </div>
            <div class="form-group">
                <label for="password" style="color: black">Contraseña</label>
                <div style="display: flex">
                    <input type="password" id="password" name="password" value="" required
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility()"
                        style="width: 10%">
                        🙈
                    </button>
                </div>
            </div>
            <button type="submit">Iniciar sesión</button>
        </form>

        <div class="footer">
            <p><a href="{{ route('finanza_showLogin') }}">Return</a></p>
        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.textContent = '👁️'; // Cambia el ícono
            } else {
                passwordInput.type = 'password';
                passwordToggle.textContent = '🙈'; // Cambia el ícono
            }
        }
    </script>
</body>

</html>
