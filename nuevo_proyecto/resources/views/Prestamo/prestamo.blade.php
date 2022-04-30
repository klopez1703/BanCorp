<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prestamo | BanCorp</title>

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
        <div class="text">Prestamos</div>

        <center><div class="form1"></div></center>

        <div class="cont1">
            <div class="imgPrestamo"></div>
                <form action="{{ url('/Guardar') }}" method="post" class="formulario">

                @csrf

                    <div class="inputFormulario">
                        <label for="NOMBRE">Nombre</label>
                        <input type="text" name="NOMBRE" placeholder="Nombre" required> 
                    </div>


                    <div class="inputFormulario">
                        <label for="APELLDO">Apellido</label>
                        <input type="text" name="APELLIDO" placeholder="Apellido" required> 
                    </div>

                    <div class="inputFormulario">
                        <label for="IMPORTE_PRESTAMO">Importe Prestamo</label>
                        <input type="text" name="IMPORTE_PRESTAMO" placeholder="L.0.00" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="INTERESES">Intereses</label>
                        <select name="INTERESES" id="intereses" required>
                            <option value="0.03">0.03%</option>
                            <option value="0.04">0.04%</option>
                        </select>
                    </div>

                    <div class="inputFormulario">
                        <label for="PLAZO_ANUAL">Plazo Anual</label>
                        <input type="number" class="monto" onchange="sumar();"  name="PLAZO_ANUAL" placeholder="0" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="N_PAGOSANUAL">Número de Pagos Anual</label>
                        <input type="text" id="spTotal" name="N_PAGOSANUAL" placeholder="0" required>
                    </div>

                    <div class="inputFormulario">
                        <button type="submit" class="btnPrestamo">Guardar</button>
                    </div>
                </form>
        </div>

    <center>
        <table class="table-prestamo">
            <thead>
                <td>ID</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Importe</td>
                <td>Intereses</td>
                <td>Plazo Anual</td>
                <td>Numero Pagos</td>
                <td>Saldo Final</td>
                <td>Fecha</td>
                <td>Acción</td>
            </thead>
            <tbody>
                @foreach($resulprestamo as $item)
                
                <tr>
                    <td>{{ $item["COD_PRESTAMO"]}}</td>
                    <td>{{ $item["NOMBRE"]}} </td>
                    <td>{{ $item["APELLIDO"]}} </td>
                    <td>{{ $item["IMPORTE_PRESTAMO"]}}</td>
                    <td>{{ $item["INTERESES"]}}</td>
                    <td>{{ $item["PLAZO_ANUAL"]}}</td>
                    <td>{{ $item["N_PAGOSANUAL"]}}</td>
                    <td>{{ $item["SALDO_FINAL"]}}</td>
                    <td>{{ $item["FECHA_PRESTAMO"]}} </td>
                    <td>
                        <a href="../Editar/{{ $item['COD_PRESTAMO'] }}" class="btnEdit">
                        <i class='bx bxs-edit-alt'></i>
                        </a>
                        <a href="../Eliminar/{{ $item['COD_PRESTAMO'] }}" class="btnDelete">
                        <i class='bx bxs-message-x' ></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
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
        <p>Oficinas Centrales: Torre Internacional Av. Reforma 15-85 Zona 10 Honduras. PBX 1701 ó (504) 2277 3666, desde USA línea gratuita 1866 608 7765. Atención 24 horas servicioenlinea@interbanco.com.gt Swift: DIBIGTGC
©2022 BancoCorp, S.A. Todos los derechos reservados. (Michael Sosa)</p>
</center>
    </footer>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>