<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar | BanCorp</title>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="icon" href="{{ asset('img/favicon.ico') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- or -->
        <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


    </head>
    <body class="antialiased">       

        <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('img/logo.png') }}" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">BanCorp</span>
                </div>

            </div>

            <i class="bx bx-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box" >
                    <i class='bx bx-search icon'></i>
                    <form action="/productos/buscar">
                        <input type="search" id="buscador" name="nombre" placeholder="Search..." >
                    </form>
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="/">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ url('/Cuenta') }}">
                        <i class='bx bxs-wallet icon'></i>
                            <span class="text nav-text">Cuenta de Ahorros</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ url('/Prestamo') }}">
                        <i class='bx bx-task icon'></i>
                            <span class="text nav-text">Prestamos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ url('/Credito') }}">
                        <i class='bx bxs-credit-card-alt icon'></i>
                            <span class="text nav-text">Tarjetas</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="{{ url('/Reporte') }}">
                        <i class='bx bxs-report icon'></i>
                            <span class="text nav-text">Reporte</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                        <i class='bx bx-line-chart icon'></i>
                            <span class="text nav-text">Contabilidad</span>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>


                <div class="bottom-content">
                    <li class="">
                        <a href="{{ url('/Persona') }}">
                            <i class="bx bx-log-in icon"></i>
                            <span class="text nav-text">Login</span>
                        </a> 
                    </li>
            </div>

        </div>
    </nav>

    <section class="home">
        <div class="text">Modificar Prestamo</div>

        <center>
        <div class="cont-modificar">
            <img src="{{ asset('img/logo.png') }}" alt="">
                <form action="{{ url('/Actualizar') }}" method="post" class="formu-modificar">

                @csrf

                        <input type="hidden" name="COD_PRESTAMO" value="{{ $resulprestamo['COD_PRESTAMO'] }}">
                    
                    <div class="inputFormulario">
                        <label for="NOMBRE">Nombre</label>
                        <input type="text" name="NOMBRE" value="{{ $resulprestamo['NOMBRE'] }}" required> 
                    </div>


                    <div class="inputFormulario">
                        <label for="APELLDO">Apellido</label>
                        <input type="text" name="APELLIDO" value="{{ $resulprestamo['APELLIDO'] }}" required> 
                    </div>

                    <div class="inputFormulario">
                        <label for="INTERESES">Intereses</label>
                        <input type="text" name="INTERESES" value="{{ $resulprestamo['INTERESES'] }}" required> 
                    </div>

                    <div class="inputFormulario">
                        <label for="PLAZO_ANUAL">Plazo Anual</label>
                        <input type="number" name="PLAZO_ANUAL" placeholder="0" value="{{ $resulprestamo['PLAZO_ANUAL'] }}" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="N_PAGOSANUAL">Número de Pagos Anual</label>
                        <input type="text" name="N_PAGOSANUAL" placeholder="0" value="{{ $resulprestamo['N_PAGOSANUAL'] }}" required>
                    </div>

                    <div class="inputFormulario">
                        <button type="submit" class="btnPrestamo">Actualizar</button>
                    </div>
                </form>
        </div>
        </center>

        <div class="redes">
            <center>
            <div class="red">
                <i class='bx bxl-gmail icono'></i>
                <i class='bx bxl-meta icono'></i>
                <i class='bx bxl-twitter icono'></i>
                <i class='bx bxl-instagram-alt icono' ></i>
                <i class='bx bxl-whatsapp-square icono'></i>
                <img src="{{ asset('img/pbx.png') }}" alt="">
            </div>
            </center>
        </div>


    <footer>
        <center>
        <p>Oficinas Centrales: Torre Internacional Av. Reforma 15-85 Zona 10 Honduras. PBX 1701 ó (504) 2277 3666, desde USA línea gratuita 1866 608 7765. Atención 24 horas servicioenlinea@interbanco.com.gt Swift: DIBIGTGC
©2022 BancoCorp, S.A. Todos los derechos reservados. (Michael Sosa)</p>
</center>
    </footer>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>