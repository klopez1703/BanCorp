<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reportes | BanCorp</title>

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
        <div class="text">Reportes</div>

        <center><div class="form-reporte"></div></center>

<center>

  <table class="table-reporte">
        <thead>
            <td>Id reporte</td>
            <td>Clave</td>
            <td>N??Cuenta</td>
            <td>Tipo</td>
            <td>Fecha</td>
            <td>Saldo</td>
            <td>Estado</td>
            <td>Accion</td>
                </thead>
                    <tbody>
                    @foreach($ResulReportes as $item)
                    <tr>
                    <td>{{ $item["ID_REPORTE"]}}</td>
                    <td>{{ $item["CLAVE"]}}</td>
                    <td>{{ $item["NUM_CTA"]}}</td>
                    <td>{{ $item["TIP_CTA"]}}</td>
                    <td>{{ $item["FEC_REGISTRO"]}}</td>
                    <td>{{ $item["SAL_CTA"]}} </td>
                    <td>{{ $item["IND_CTA"]}} </td>
                    <td>
                        <a href="../EliminarR/{{ $item['ID_REPORTE'] }}" class="btnDelete">
                        <i class='bx bxs-message-x' ></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                <tbody>
    </table>
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
        <p>Oficinas Centrales: Torre Internacional Av. Reforma 15-85 Zona 10 Honduras. PBX 1701 ?? (504) 2277 3666, desde USA l??nea gratuita 1866 608 7765. Atenci??n 24 horas servicioenlinea@interbanco.com.gt Swift: DIBIGTGC
??2022 BancoCorp, S.A. Todos los derechos reservados.</p>
</center>
    </footer>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>