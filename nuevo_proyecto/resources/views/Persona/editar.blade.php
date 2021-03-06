!DOCTYPE html>
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
                        <a href="/">>
                            <i class="bx bx-task icon"></i>
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
        <div class="text">Modificar Personas</div>

        <center>
        <div class="cont-modificar">
            <img src="{{ asset('img/logo.png') }}" alt="">
                <form action="{{ url('/Actualizar') }}" method="post" class="formu-modificarP">

                @csrf

                        <input type="hidden" name="COD_PERSONA" value="{{ $resulpersona['COD_PERSONA'] }}">
                    
                    <div class="inputFormulario">
                        <label for="NOM_PERSONA">Nombre</label>
                        <input type="text" name="NOM_PERSONA" value="{{ $resulpersona['NOM_PERSONA'] }}" required> 
                    </div>


                    <div class="inputFormulario">
                        <label for="APE_PERSONA">Apellido</label>
                        <input type="text" name="APE_PERSONA" value="{{ $resulpersona['APE_PERSONA'] }}" required> 
                    </div>

                    <div class="inputFormulario">
                        <label for="IDENTIDAD">Identidad</label>
                        <input type="text" name="IDENTIDAD" placeholder="0" value="{{ $resulpersona['IDENTIDAD'] }}" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="SEX_PERSONA">Sexo</label>
                        <input type="text" name="SEX_PERSONA" value="{{ $resulpersona['SEX_PERSONA'] }}" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="IND_CIVIL">Estado Civil</label>
                        <input type="text" name="IND_CIVIL" value="{{ $resulpersona['IND_CIVIL'] }}" required>
                    </div>
                    <div class="inputFormulario">
                        <label for="EDA_PERSONA">Edad</label>
                        <input type="number" name="EDA_PERSONA" placeholder="0" value="{{ $resulpersona['EDA_PERSONA'] }}" required>
                    </div>
                    <div class="inputFormulario">
                        <label for="DIR_PERSONA">Direcci??n</label>
                        <input type="text" name="DIR_PERSONA" value="{{ $resulpersona['DIR_PERSONA'] }}" required>
                    </div>
                    <div class="inputFormulario">
                        <label for="TIP_PERSONA">Tipo</label>
                        <input type="text" name="TIP_PERSONA" value="{{ $resulpersona['TIP_PERSONA'] }}" required>
                    </div>
                    <div class="inputFormulario">
                        <label for="IND_PERSONA">Estado</label>
                        <input type="enum" name="IND_PERSONA" value="{{ $resulpersona['IND_PERSONA'] }}" required>
                    </div>
                    <div class="inputFormulario">
                        <label for="USR_REGISTRO">Usuario</label>
                        <input type="text" name="USR_REGISTRO" value="{{ $resulpersona['USR_REGISTRO'] }}" required>
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
        <p>Oficinas Centrales: Torre Internacional Av. Reforma 15-85 Zona 10 Honduras. PBX 1701 ?? (504) 2277 3666, desde USA l??nea gratuita 1866 608 7765. Atenci??n 24 horas servicioenlinea@interbanco.com.gt Swift: DIBIGTGC
??2022 BancoCorp, S.A. Todos los derechos reservados.</p>
</center>
    </footer>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>