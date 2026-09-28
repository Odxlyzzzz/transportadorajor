<?php
require_once "config.php";

$sql_servicios = "SELECT id, persona, cantidad, peso, recorrido, distancia FROM servicios_transporte";
$res_servicios = $conn->query($sql_servicios);

$sql_cotizaciones = "SELECT id, nombre, correo, telefono, tipo_carga, nota, fecha_registro FROM cotizaciones ORDER BY fecha_registro DESC";
$res_cotizaciones = $conn->query($sql_cotizaciones);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Transportadora JOR - Registros de Base de Datos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                        <a href="quote.php" class="dropdown-item">Solicitar cotización</a>
                        <a href="team.html" class="dropdown-item">Inventario</a>
                        <a href="testimonial.html" class="dropdown-item">Opiniones</a>
                        <a href="consulta.php" class="dropdown-item active">Base de datos</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Base de Datos</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Información</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Base de Datos</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Database Section Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <!-- Tabla de Servicios -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Registros del sistema</h6>
                <h1 class="mb-4">Servicios de Transporte Registrados</h1>
            </div>
            <div class="table-responsive bg-light p-4 rounded shadow mb-5">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary text-uppercase">
                        <tr>
                            <th>ID</th>
                            <th>Persona / Cliente</th>
                            <th>Cantidad</th>
                            <th>Peso (kg)</th>
                            <th>Recorrido</th>
                            <th>Distancia (km)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($res_servicios && $res_servicios->num_rows > 0): ?>
                            <?php while ($fila = $res_servicios->fetch_assoc()): ?>
                                <tr>
                                    <td class="fw-bold"><?php echo $fila['id']; ?></td>
                                    <td><?php echo htmlspecialchars($fila['persona']); ?></td>
                                    <td><span class="badge bg-info text-dark"><?php echo htmlspecialchars($fila['cantidad']); ?> unidades</span></td>
                                    <td><?php echo number_format($fila['peso'], 2); ?> kg</td>
                                    <td><i class="fa fa-route text-primary me-2"></i><?php echo htmlspecialchars($fila['recorrido']); ?></td>
                                    <td><?php echo number_format($fila['distancia'], 2); ?> km</td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No se encontraron registros de servicios.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tabla de Cotizaciones -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Formulario dinámico</h6>
                <h1 class="mb-4">Cotizaciones Recibidas</h1>
            </div>
            <div class="table-responsive bg-light p-4 rounded shadow">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-dark text-uppercase">
                        <tr>
                            <th>#</th>
                            <th>Productor / Cliente</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Tipo de Nuez</th>
                            <th>Detalles</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($res_cotizaciones && $res_cotizaciones->num_rows > 0): ?>
                            <?php while ($fila = $res_cotizaciones->fetch_assoc()): ?>
                                <tr>
                                    <td><strong><?php echo $fila['id']; ?></strong></td>
                                    <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['correo']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['telefono']); ?></td>
                                    <td><span class="badge bg-primary"><?php echo htmlspecialchars($fila['tipo_carga']); ?></span></td>
                                    <td><?php echo htmlspecialchars($fila['nota']); ?></td>
                                    <td><small class="text-muted"><?php echo $fila['fecha_registro']; ?></small></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No hay solicitudes de cotización guardadas aún.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Database Section End -->

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
</body>

</html>