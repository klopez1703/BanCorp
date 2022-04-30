<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tarjetas | BanCorp</title>

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
        <div class="text">Tarjetas</div>

        <center><div class="form2"></div></center>

        <div class="cont-credito">
                <form action="{{ url('/guardar') }}" method="post" class="formu-credito">

                @csrf

                    <div class="inputFormulario">
                        <label for="APELLDO">Tipo de tarjeta</label>
                        <input type="text" name="TIPO_TARJETA" id="tipoTarjet" onkeyup="mostrarTipo();" placeholder="Visa/MasterCard" required> 
                    </div>

                    <div class="inputFormulario">
                        <label for="NOMBRE">Nombre</label>
                        <input type="text" id="name" onkeyup="mostrarNombre();" name="NOM_PERSONA" placeholder="Nombre" required> 
                    </div>


                    <div class="inputFormulario">
                        <label for="APELLDO">Numero de tarjeta</label>
                        <input type="text" name="NUM_TARJETA" id="numeroTarjet" onkeyup="mostrarNumero();" placeholder="Numero de tarjeta" required> 
                    </div>
                   

                    <div class="inputFormulario">
                        <label for="IMPORTE_PRESTAMO">Fecha Vencimiento</label>
                        <input type="date"  id="dateVenci" onkeyup="mostrarFecha();" name="FECHA_CADU"  required>
                    </div>

                    <div class="inputFormulario">
                        <label for="INTERESES">CVV</label>
                        <input type="text" name="CVV" placeholder="CVV" required> 
                    </div>

                    <div class="inputFormulario">
                        <label for="PLAZO_ANUAL">Cuotas</label>
                        <input type="number"  name="CUOTAS" placeholder="0" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="N_PAGOSANUAL">Interes</label>
                        <input type="num"  name="INTERES" placeholder="0" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="N_PAGOSANUAL">Monto Total</label>
                        <input type="num"  name="MONTO_TOTAL" placeholder="0" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="N_PAGOSANUAL">Mes de Primer Cuota</label>
                        <input type="text"  name="MES_PRIMER_CUOTA"  required>
                    </div>

                    <div class="inputFormulario">
                        <label for="N_PAGOSANUAL">Detalle</label>
                        <input type="text"  name="DETALLE" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="N_PAGOSANUAL">Mes de Ultima Cuota</label>
                        <input type="text"  name="MES_ULTIMA_CUOTA"  required>
                    </div>

                    <div class="inputFormulario">
                        <button type="submit" class="btnPrestamo">Guardar</button>
                    </div>
                    
                </form>
                <div class="imgTarjeta">
                    <span id="numero"></span>
                    <br>
                    <span id="nombre"></span>
                    <br>
                    <span id="fecha"></span>
                    <br>
                    <span id="tipo"></span>
                </div>
        </div>

    <center>
        <br><br><br><br><br>
        <table class="table-prestamo">
            <thead>
                <td>ID</td>
                <td>Nombre</td>
                <td>Numero de tarjeta</td>
                <td>Tipo de tarjeta</td>
                <td>Fecha Vencimiento</td>
                <td>CVV</td>
                <td>Cuotas</td>
                <td>Interes</td>
                <td>Monto Total</td>
                <td>Mes de Primer Cuota</td>
                <td>Detalle</td>
                <td>Mes de Ultima Cuota</td>
                <td>Acción</td>
            </thead>
            <tbody>
                @foreach($resulcredito as $item)
                
                <tr>
                    <td>{{ $item["COD_TAR_CREDITO"]}}</td>
                    <td>{{ $item["NOM_PERSONA"]}} </td>
                    <td>{{ $item["NUM_TARJETA"]}}</td>
                    <td>{{ $item["TIPO_TARJETA"]}}</td>
                    <td>{{ $item["FECHA_CADU"]}}</td>
                    <td>{{ $item["CVV"]}}</td>
                    <td>{{ $item["CUOTAS"]}}</td>
                    <td>{{ $item["INTERES"]}}</td>
                    <td>{{ $item["MONTO_TOTAL"]}} </td>
                    <td>{{ $item["MES_PRIMER_CUOTA"]}} </td>
                    <td>{{ $item["DETALLE"]}} </td>
                    <td>{{ $item["MES_ULTIMA_CUOTA"]}} </td>
                    
                    <td>
                        <a href="../EditarC/{{ $item['COD_TAR_CREDITO'] }}" class="btnEdit">
                        <i class='bx bxs-edit-alt'></i>
                        </a>
                        <a href="../EliminarC/{{ $item['COD_TAR_CREDITO'] }}" class="btnDelete">
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