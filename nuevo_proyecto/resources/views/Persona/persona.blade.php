<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Personas | BanCorp</title>

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
                            <i class='bx bx-home-alt icon'></i>
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
        <div class="text">Personas</div>

        <center><div class="form-persona"></div></center>

        
        <div class="cont-persona">
                <form action="{{ url('/GuardarP') }}" method="post" class="formulario-persona">

                @csrf

                    <div class="inputFormulario">
                        <label for="NOM_PERSONA">Nombre</label>
                        <input type="text" name="NOM_PERSONA" placeholder="Nombre" required> 
                    </div>


                    <div class="inputFormulario">
                        <label for="APE_PERSONA">Apellido</label>
                        <input type="text" name="APE_PERSONA" placeholder="Apellido" required> 
                    </div>

                    <div class="inputFormulario">
                        <label for="IDENTIDAD">Identidad</label>
                        <input type="text" name="IDENTIDAD" placeholder="Identidad" required>
                    </div>

                    <div class="inputFormulario">
                        <label for="SEX_PERSONA">Sexo</label>
                        <select name="SEX_PERSONA" id="estado" required>
                            <option value="F">Masculino</option>
                            <option value="M">Femenino</option>>
                        </select>
                    </div>

                    <div class="inputFormulario">
                        <label for="IND_CIVIL">Estado Civil</label>
                        <select name="IND_CIVIL" id="estado" required>
                            <option value="C">Casado(a)</option>
                            <option value="S">Soltero(a)</option>
                            <option value="D">Divorciado(a)</option>
                            <option value="V">Viudo(a))</option>
                        </select>
                    </div>

                    <div class="inputFormulario">
                        <label for="EDA_PERSONA">Edad</label>
                        <input type="number"  name="EDA_PERSONA" placeholder="0" required>
                    </div>
                    <div class="inputFormulario">
                        <label for="DIR_PERSONA">Direccion</label>
                        <input type="text"  name="DIR_PERSONA" placeholder="Dirección" required>
                    </div>
                    <div class="inputFormulario">
                        <label for="TIP_PERSONA">Tipo</label>
                        <select name="TIP_PERSONA" id="tipopersona" required>
                            <option value="J">Juridico</option>
                            <option value="N">Natural</option>>
                        </select>
                    </div>
                    <div class="inputFormulario">
                        <label for="IND_PERSONA">Estado</label>
                        <select name="IND_PERSONA" id="estado" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>>
                        </select>
                    </div>
                    <div class="inputFormulario">
                        <label for="USR_REGISTRO">Usuario Registro</label>
                        <input type="text"  name="USR_REGISTRO" placeholder="Usuario" required>
                    </div>
                    <div class="inputFormulario">
                        <button type="submit" class="btnPrestamo">Guardar</button>
                    </div>
                </form>
        </div>
        

    <center>
        <table class="table-persona">
            <thead>
            <td>ID</td>
            <td>Nombre</Th>
           <td>Apellido</td>
           <td>Identidad</td>
           <td>Sexo</td>
           <td>Estado_Civil</td>
           <td>Edad</td>
           <td>Direccion</td>
           <td>Tipo</td>
           <td>Estado</td>
           <td>Usuario_Registro</td>
           <td>Fecha_Registro</td>
           <td>Acción</td>
         </thead>
       <tbody> 
            @foreach((array)$resulpersona as $item)
                
             <tr>
                    <td>{{ $item["COD_PERSONA"]}}</td>
                    <td>{{ $item["NOM_PERSONA"]}} </td>
                    <td>{{ $item["APE_PERSONA"]}} </td>
                    <td>{{ $item["IDENTIDAD"]}}</td>
                    <td>{{ $item["SEX_PERSONA"]}}</td>
                    <td>{{ $item["IND_CIVIL"]}}</td>
                    <td>{{ $item["EDA_PERSONA"]}}</td>
                    <td>{{ $item["DIR_PERSONA"]}}</td>
                    <td>{{ $item["TIP_PERSONA"]}} </td>
                    <td>{{ $item["IND_PERSONA"]}} </td>
                    <td>{{ $item["USR_REGISTRO"]}} </td>
                    <td>{{ $item["FEC_REGISTRO"]}} </td>
                    
                    <td>
                        <a href="../EditarP/{{ $item['COD_PERSONA'] }}" class="btnEdit">
                        <i class='bx bxs-edit-alt'></i>
                        </a>
                        <a href="../EliminarP/{{ $item['COD_PERSONA'] }}" class="btnDelete">
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