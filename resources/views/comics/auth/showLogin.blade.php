<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INGRESAR</title>
    <link rel="icon" href="{{ asset('img/favicon/favicon_Eccomerce-user.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/comics/login.css') }}">

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="form-container">
        <form method="POST" action="{{ route('comics_LoginIn') }}">
            @csrf
            <h2>INGRESAR</h2>
            @session('error')
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endsession
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <p>
                    <input type="email" class="email" name="email" id="email" aria-describedby="emailHelp"
                        value="{{ old('email') ?? 'visitante@gmail.com' }}">
                </p>
                <div id="emailHelp" class="form-text">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>

            <div class="mb-3">
                <input class="password" type="password" name="password" id="password" value="password123">
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    👁️
                </span>
                <div id="emailHelp" class="form-text">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <button type="submit" class="button">INGRESAR</button>

            <div class="mb-3">
                <a href="{{ route('comics_NewUser') }}" class="link">CREAR CUENTA</a>
            </div>

        </form>
    </div>
    <script src="{{ asset('js/comics/login.js') }}"></script>
</body>

</html>