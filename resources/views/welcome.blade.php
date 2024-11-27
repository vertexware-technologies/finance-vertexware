<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCE - VERTEXWARE</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #111827;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            padding: 10px 20px;
            position: fixed;
            top: 20px;
            /* Ajuste feito aqui */
            background-color: #111827;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img,
        .logo .block {
            height: 35px;
        }

        .menu {
            display: flex;
            gap: 20px;
        }

        .menu a {
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .menu .login {
            color: #EB8248;
            border: none;
            background: none;
            padding: 10px 0;
        }

        .menu .register {
            color: #EB8248;
            border: 2px solid #EB8248;
            border-radius: 5px;
        }

        .menu .register:hover {
            background-color: #333;
        }

        .content-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 100%;
            z-index: 10;
            padding: 0 20px;
            box-sizing: border-box;
            margin-top: 80px;
            /* Ajuste para o header */
        }

        .text-content {
            flex-basis: 40%;
            max-width: 500px;
        }

        .image-placeholder {
            flex-basis: 55%;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-placeholder img {
            width: 100%;
            max-height: 600px;
            /* Limita a altura sem cortar */
            object-fit: contain;
            /* Garante que a imagem não seja cortada */
            border-radius: 8px;
        }

        /* Fundo inclinado */
        .angled-background {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50vh;
            background-color: #EB8248;
            clip-path: polygon(0 100%, 100% 50%, 100% 100%, 0 100%);
            z-index: 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .content-container {
                display: block;
                text-align: center;
                padding: 20px;
            }

            .text-content {
                flex-basis: 100%;
                margin-bottom: 20px;
            }

            .image-placeholder {
                flex-basis: 100%;
            }

            .image-placeholder img {
                width: 90%;
                /* Ajusta a largura para telas menores */
                max-height: 400px;
            }
        }
    </style>

</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="{{ route('dashboard') }}" wire:navigate>
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>
        <div class="menu">
            <a href="{{ route('login') }}" class="login">Entrar</a>
            <a href="{{ route('register') }}" class="register">Registrar-se</a>
        </div>
    </div>
    <div class="content-container">
        <div class="text-content">
            <h1 style="font-size: 2.5rem; font-weight: bold;">Controle completo das suas finanças.</h1>
            <p style="font-size: 1.2rem; color: #D1D5DB;">
                Tudo o que você precisa para organizar e gerenciar suas finanças em um só lugar, de forma simples e
                acessível. <br>
                <strong style="color: #EB8248;">Explore nossos recursos e comece agora.</strong>
            </p>
        </div>
        <div class="image-placeholder">
            <img src="{{ asset('images/design-pronto.png') }}" alt="Em Desenvolvimento">
        </div>
    </div>

    <!-- Fundo inclinado -->
    <div class="angled-background"></div>

    <!-- Link para baixar o app em dispositivos móveis -->
    <a href="https://www.example.com/download" class="download-link" style="display: none;">
        Baixe o nosso app agora!
    </a>

    <script>
        // Exibir o link para baixar o app apenas em dispositivos móveis
        if (window.innerWidth <= 768) {
            document.querySelector('.download-link').style.display = 'block';
        }
    </script>
</body>

</html>
