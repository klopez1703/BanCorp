!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar | bancorp</title>

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
                    <span class="name">bancorp</span>
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
                        <a href="{{ url('/Cuenta') }}">>
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
        <div class="text">Modificar Cuenta </div>

        <center>
        <div class="cont-modificar">
            <img src="{{ asset('img/logo.png') }}" alt="">
                <form action="{{ url('/Actualizar') }}" method="post" class="formu-modificar">

                @csrf

                        <input type="hidden" name="COD_CTA" value="{{ $resulcuenta['COD_CTA'] }}">
                    
                   
                    <div class="inputFormulario">
                        <label for="NUM_CTA">Numero Cuenta</label>
                        <input type="text" name="NUM_CTA" placeholder="0" value="{{ $resulcuenta['NUM_CTA'] }}" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="TIP_CTA">Tipo Cuenta</label>
                        <input type="text" name="TIP_CTA" value="{{ $resulcuenta['TIP_CTA'] }}" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="SAL_CTA">Saldo Cuenta</label>
                        <input type="text" name="SAL_CTA" value="{{ $resulcuenta['SAL_CTA'] }}" required>
                    </div>
                    <div class="inputFormulario">
                        <label for="IND_CTA">Estado Cuenta</label>
                        <input type="text" name="IND_CTA" placeholder="0" value="{{ $resulcuenta['IND_CTA'] }}" required>
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
©2022 BancoCorp, S.A. Todos los derechos reservados.</p>
</center>
    </footer>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>