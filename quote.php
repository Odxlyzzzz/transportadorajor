<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Transportadora JOR - Solicitar Cotización</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Transporte de Nuez, Carga Agrícola, Logística Nogalera, Cotización Nuez" name="keywords">
    <meta content="Solicita una cotización especializada para el transporte y logística de nuez con Transportadora JOR." name="description">

    <link href="img/iconprincipal.jpg" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .lista-nueces {
            background: #fff;
            border-radius: 6px;
            padding: 14px 16px;
            max-height: 240px;
            overflow-y: auto;
            text-align: left;
        }
        .lista-nueces .grupo-titulo {
            font-weight: 700;
            font-size: 0.85em;
            text-transform: uppercase;
            color: #6c757d;
            margin: 10px 0 6px;
        }
        .lista-nueces .grupo-titulo:first-child { margin-top: 0; }
        .lista-nueces .form-check { margin-bottom: 4px; }
        .lista-nueces small { color: #8a8a8a; }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Cargando...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-12 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4 py-2">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small class="text-light">Chihuahua, México</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-2">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small class="text-light">Lun - Vie: 09.00 AM - 09.00 PM</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white">Transportadora JOR</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Inicio</a>
                <a href="about.html" class="nav-item nav-link">Acerca de nosotros</a>
                <a href="service.html" class="nav-item nav-link">Servicios</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Información</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="feature.html" class="dropdown-item">Características</a>
                        <a href="quote.php" class="dropdown-item active">Solicitar cotización</a>
                        <a href="team.html" class="dropdown-item">Inventario</a>
                        <a href="testimonial.html" class="dropdown-item">Opiniones</a>
                        <a href="consulta.php" class="dropdown-item">Base de datos</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cotización Nogalera</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Información</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Solicitar cotización</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Quote Form Section Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Especialistas en Nuez</h6>
                    <h1 class="mb-4">Cotiza el Transporte para tu Cosecha y Producto</h1>
                    <p class="mb-4">Especializados en la logística y traslado de nuez (a granel, en súper sacos o empaquetada). Garantizamos unidades limpias y secas para cuidar la calidad de tu producción.</p>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light p-4 p-sm-5 rounded">

                        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>¡Solicitud enviada!</strong> Tu cotización se ha registrado correctamente en la base de datos.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ocurrió un error:</strong> No se pudo guardar la cotización. Revisa los datos e intenta de nuevo.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="procesar_cotizacion.php" method="POST" id="formCotizacion">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="nombre" class="form-control border-0" placeholder="Nombre o Productor / Empresa" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="correo" class="form-control border-0" placeholder="Correo electrónico" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="telefono" class="form-control border-0" placeholder="Teléfono de contacto" style="height: 55px;" required>
                                </div>

                                <!-- Tipos de nuez del inventario -->
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="fw-bold mb-0">Tipos de nuez a transportar</label>
                                        <div>
                                            <small class="me-2" id="contadorNueces">0 seleccionadas</small>
                                            <button type="button" id="btnTodas" class="btn btn-sm btn-outline-primary">Seleccionar todas</button>
                                        </div>
                                    </div>

                                    <div class="lista-nueces">

                                        <div class="grupo-titulo">Nuez con cáscara</div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Western Fina" id="n1"><label class="form-check-label" for="n1">Nuez Western Fina</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Wichita Primera" id="n2"><label class="form-check-label" for="n2">Nuez Wichita Primera</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Criolla a Granel" id="n3"><label class="form-check-label" for="n3">Nuez Criolla a Granel</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Western Segunda" id="n4"><label class="form-check-label" for="n4">Nuez Western Segunda <small>(poca disponibilidad)</small></label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Wichita Selección" id="n5"><label class="form-check-label" for="n5">Nuez Wichita Selección</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Pecana Mixta" id="n6"><label class="form-check-label" for="n6">Nuez Pecana Mixta <small>(agotado)</small></label></div>

                                        <div class="grupo-titulo">Nuez descascarada</div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Mitades / Corazón" id="n7"><label class="form-check-label" for="n7">Nuez Mitades / Corazón</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Pedacería / Trozo" id="n8"><label class="form-check-label" for="n8">Nuez Pedacería / Trozo</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Selección Premium" id="n9"><label class="form-check-label" for="n9">Nuez Selección Premium</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Encorazonada Orgánica" id="n10"><label class="form-check-label" for="n10">Nuez Encorazonada Orgánica</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez en Halves Exportación" id="n11"><label class="form-check-label" for="n11">Nuez en Halves Exportación</label></div>

                                        <div class="grupo-titulo">Subproductos y procesados</div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Cáscara de Nuez (Merma)" id="n12"><label class="form-check-label" for="n12">Cáscara de Nuez (Merma)</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Harina / Molida" id="n13"><label class="form-check-label" for="n13">Nuez Harina / Molida</label></div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Aceite de Nuez Pecana" id="n14"><label class="form-check-label" for="n14">Aceite de Nuez Pecana <small>(a pedido)</small></label></div>

                                        <div class="grupo-titulo">Producto terminado</div>
                                        <div class="form-check"><input class="form-check-input chk-nuez" type="checkbox" name="tipo_carga[]" value="Nuez Garrapiñada" id="n15"><label class="form-check-label" for="n15">Nuez Garrapiñada</label></div>

                                    </div>
                                    <div class="text-danger mt-2 d-none" id="avisoNuez">Selecciona al menos un tipo de nuez.</div>
                                </div>

                                <div class="col-12">
                                    <textarea name="nota" class="form-control border-0" rows="4" placeholder="Detalles de envío (Huerta/Origen, Destino, toneladas estimadas, fechas...)"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Solicitar Cotización Nogalera</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote Form Section End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-light mb-4">Servicios Nogaleros</h4>
                    <a class="btn btn-link" href="service.html">Transporte de nuez a granel</a>
                    <a class="btn btn-link" href="service.html">Fletes agrícolas</a>
                    <a class="btn btn-link" href="service.html">Envío de súper sacos</a>
                    <a class="btn btn-link" href="service.html">Logística de huerta a despepite</a>
                    <a class="btn btn-link" href="service.html">Manejo de caja seca / Jaula</a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-light mb-4">Enlaces rápidos</h4>
                    <a class="btn btn-link" href="about.html">Acerca de nosotros</a>
                    <a class="btn btn-link" href="service.html">Nuestros servicios</a>
                    <a class="btn btn-link" href="quote.php">Solicitar cotización</a>
                    <a class="btn btn-link" href="testimonial.html">Opiniones</a>
                    <a class="btn btn-link" href="consulta.php">Base de datos</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="index.html">Transportadora JOR</a>, Todos los derechos reservados.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Diseñado para Transportadora JOR
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        (function () {
            const checks   = document.querySelectorAll('.chk-nuez');
            const btnTodas = document.getElementById('btnTodas');
            const contador = document.getElementById('contadorNueces');
            const aviso    = document.getElementById('avisoNuez');
            const form     = document.getElementById('formCotizacion');

            function actualizar() {
                const n = [...checks].filter(c => c.checked).length;
                contador.textContent = n + (n === 1 ? ' seleccionada' : ' seleccionadas');
                btnTodas.textContent = (n === checks.length) ? 'Quitar todas' : 'Seleccionar todas';
                if (n > 0) aviso.classList.add('d-none');
            }

            btnTodas.addEventListener('click', function () {
                const todas = [...checks].every(c => c.checked);
                checks.forEach(c => c.checked = !todas);
                actualizar();
            });

            checks.forEach(c => c.addEventListener('change', actualizar));

            form.addEventListener('submit', function (e) {
                if (![...checks].some(c => c.checked)) {
                    e.preventDefault();
                    aviso.classList.remove('d-none');
                    document.querySelector('.lista-nueces').scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });

            actualizar();
        })();
    </script>
</body>

</html>