<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MercadoLibreUCM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .subtitle {
                font-size: 30px;
            }

            .links > a {
                color: blue;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* Add a black background color to the top navigation */
            .topnav {
                background-color: #333;
                overflow: hidden;
            }

            /* Style the links inside the navigation bar */
            .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            }

            /* Change the color of links on hover */
            .topnav a:hover {
            background-color: #ddd;
            color: black;
            }

            /* Add a color to the active/current link */
            .topnav a.active {
            background-color: #4CAF50;
            color: white;
            }

            /* Right-aligned section inside the top navigation */
            .topnav-right {
            float: right;
            }

            .mbot {
                margin-bottom: 70px;
                text-align: center;
            }

            .fondo{
                background-color: #ddd;
                border-style: solid;
                border-color: blue;
            }

            .background {
            background-image: url(https://portal.ucm.cl//content/uploads/2016/10/universidad-ucm.jpg);
            background-position: bottom;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
            }

            .blur {
            background: rgba(255, 255, 255, 0.2); // Make sure this color has an opacity of less than 1
            backdrop-filter: blur(8px); // This be the blur
            height: 100vh;
                width: 50%;
            }
            

        </style>
    </head>
    <body>
    <div class="background">
            <div class="blur"></div>
            <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links" >
                    @if ($_SESSION['val'] == "0")
                        <a href="{{ url('/admin') }}">Admin</a>
                    @endif
                    @if ($_SESSION['val'] != "3")
                        <a href="{{ url('/edit') }}">Editar Perfil</a>
                        <a href="{{ url('/logout') }}">Cerrar Sesión</a>
                    @endif
                    @if ($_SESSION['val'] == "3")
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endif
                </div>
            @endif
            
            

        <div class="content fondo">
            <div class="header mbot" >
                <a href="{{ url('/') }}">
                    <img src="{{ url('/static/images/logo.png') }}">
                </a>
            </div>
                <div class="title mbot m-b-md">
                    MercadoLibre UCM
                </div>

                <div class="subtitle mbot m-b-md">
                    Plataforma de compra-venta de articulos y servicios para los alumnos de la Universidad Católica del Maule
                </div>
            </div>
            
        </div>
    </div>
    </body>
</html>
