<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOLIQUECHUA - Iniciar Sesión</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Quicksand', 'Poppins', sans-serif;
            min-height: 100vh;
            /* Aquí cargamos tu imagen */
            background-image: url("{{ asset('images/fondo-boli.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #f3e6d3;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Esta capa negra semitransparente aplicará el efecto de desenfoque */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6); /* Oscurece un poco la imagen */
            backdrop-filter: blur(10px);    /* Aquí está el desenfoque (blur). Cambia el 10px si lo quieres más o menos borroso */
            z-index: 0;
            pointer-events: none;
        }
        @keyframes gridPulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.02); opacity: 0.8; }
        }

        /* Contenedor principal */
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        /* Recuadro blanco semitransparente oscuro */
        .login-card {
            background: rgba(255, 244, 230, 0.04);
            border: 1px solid rgba(255, 74, 16, 0.18);
            border-radius: 32px;
            padding: 40px 35px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(12px);
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        /* Header Logo Area */
        .top-logo-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
            text-align: center;
        }

        .logo-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.22) translateY(3.5px); /* El translateY baja la imagen */
            translate: translateX(0%);
        }

        .logo-text h2 {
            color: #fff;
            font-size: 1.8em;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
            line-height: 1.1;
        }

        .logo-text p {
            color: #FFE0B2;
            font-size: 0.9em;
            font-weight: 600;
            text-shadow: 0 1px 5px rgba(0,0,0,0.3);
        }

        /* Título */
        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .title h3 {
            color: #ff7a3e;
            font-size: 1.5em;
            font-weight: 600;
        }

        .title p {
            color: #f3e6d3;
            opacity: 0.8;
            font-size: 0.9em;
        }

        /* Campos de input */
        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #ff4a10;
            font-weight: 600;
            font-size: 0.9em;
        }

        .input-group input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid rgba(255, 74, 16, 0.3);
            border-radius: 16px;
            font-size: 1em;
            transition: all 0.3s;
            background: rgba(255, 244, 230, 0.06);
            color: #f3e6d3;
        }

        .input-group input:focus {
            outline: none;
            border-color: #ff4a10;
            box-shadow: 0 0 0 3px rgba(255, 74, 16, 0.2);
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #f3e6d3;
            opacity: 0.8;
        }

        .forgot-link {
            color: #ff4a10;
            text-decoration: none;
            font-size: 0.9em;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Botón */
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #FB7900, #DD4E00);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 40px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
        }

        .btn-login:hover {
            transform: scale(1.02);
            background: linear-gradient(135deg, #FF8C00, #E65100);
            box-shadow: 0 5px 15px rgba(251, 121, 0, 0.3);
        }

        /* Link de registro */
        .register-link {
            text-align: center;
            color: #f3e6d3;
            opacity: 0.9;
        }

        .register-link a {
            color: #ff4a10;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Frase en quechua */
        .quechua-phrase {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 74, 16, 0.2);
            color: #ff7a3e;
            font-style: italic;
            font-size: 0.85em;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo en la parte superior -->
        <div class="top-logo-area">
            <div class="logo-img">
                <img src="{{ asset('imagen-login.jpg') }}" alt="Boliquechua Logo">
            </div>
            <div class="logo-text">
                <h2>BOLIQUECHUA</h2>
                <p>Aprende jugando</p>
            </div>
        </div>

        <div class="login-card">
            <div class="title">
                <h3>¡Sumaq kawsay!</h3>
                <p>Inicia sesión para continuar</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <label>📧 Correo electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <small style="color: #dc2626; font-size: 0.8em;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="input-group">
                    <label>🔒 Contraseña</label>
                    <input type="password" name="password" required>
                    @error('password')
                        <small style="color: #dc2626; font-size: 0.8em;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="checkbox-group">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Recordarme
                    </label>
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    🚀 INICIAR SESIÓN
                </button>

                <div class="register-link">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}">
                        Regístrate aquí
                    </a>
                </div>

                <div class="quechua-phrase">
                    "Imaynallam kashanki" - ¿Cómo estás?
                </div>
            </form>
        </div>
    </div>
</body>
</html>