<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INGRESAR</title>
    <link rel="icon" href="{{ asset('img/favicon/favicon_Postify.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/postify/login.css') }}">

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</head>

<body>
    <div class="login">
        <div class="content">

            <form class="mb-3" method="POST" action="{{ route('postify_ShowLogin') }}">

                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endsession
                @session('error')
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endsession

                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CORREO ELECTRONICO</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? 'visitante@gmail.com' }}"
                        aria-describedby="emailHelp"
                        style="background-color: rgba(0, 0, 0, 0); color: white; font-size: 18px;">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">CONTRASEÑA</label>
                    <input type="password" class="form-control" id="password" name="password" value="password123"
                        style="background-color: rgba(0, 0, 0, 0); color: white; font-size: 18px;">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-dark" type="submit">INGRESAR</button>
                </div>  

            </form>

            <a href="{{ route('postify_NewUser') }}" class="mb-3">CREAR USUARIO</a>

        </div>

    </div>
</body>

</html>
