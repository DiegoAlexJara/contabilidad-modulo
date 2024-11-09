<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceso</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    {{-- FlowBite CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />


</head>

<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('LoginIn') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="admin@gmail.com" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" value="password123" required>
            </div>
            <button type="submit">Ingresar</button>
            <p class="register-link">¿No tienes una cuenta? <a href="/register">Regístrate aquí</a></p>
        </form>
    </div>
</body>

</html>
