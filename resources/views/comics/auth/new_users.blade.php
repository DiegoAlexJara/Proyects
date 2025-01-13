<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/comics/login.css') }}">
    <link rel="icon" href="{{ asset('img/favicon/favicon_Eccomerce-user.webp') }}" type="image/x-icon">

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="form-container">
        <form action="{{ route('comics_CreateUser') }}" method="POST">
            @csrf
            <h2>Nueva Cuenta</h2>

            <div class="mb-3">
                <label for="" class="form-lab">NOMBRE
                    <p>
                        <input type="text" name="name" id="name" value="{{ old('name') }}">
                    </p>
                </label>
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-lab">CORREO
                    <p>
                        <input type="email" name="email" id="email" value="{{ old('email') }}">
                    </p>
                </label>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-lab">CONTRASEÑA
                    <p>
                        <input type="password" name="password" id="password" value="{{ old('password') }}">
                    </p>
                </label>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-lab">CONFIRMAR CONTRASEÑA:
                    <p>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </p>
                </label>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">
                    <input type="submit" class="button" value="CREAR CUENTA">
                </label>
            </div>
        </form>
        <a href="{{ route('comics_ShowLogin') }}" class="btn btn-primary">REGRESAR</a>
    </div>
</body>

</html>
