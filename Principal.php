<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Transporte de Nueces - Consulta de Datos</title>
<style>
    :root {
        --marron: #6b4226;
        --marron-claro: #8a5a3b;
        --fondo: #faf6f0;
        --borde: #e0d4c3;
    }
    * { box-sizing: border-box; }
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: var(--fondo);
        margin: 0;
        padding: 0;
        color: #333;
    }
    header {
        background: var(--marron);
        color: #fff;
        padding: 24px 20px;
        text-align: center;
    }
    header h1 { margin: 0 0 4px; font-size: 1.6em; }
    header p { margin: 0; opacity: 0.85; font-size: 0.9em; }

    nav {
        display: flex;
        justify-content: center;
        gap: 10px;
        background: #fff;
        border-bottom: 1px solid var(--borde);
        flex-wrap: wrap;
        padding: 10px;
    }
    nav a {
        text-decoration: none;
        color: var(--marron);
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 20px;
        border: 1px solid var(--marron);
        transition: 0.2s;
    }
    nav a.active, nav a:hover {
        background: var(--marron);
        color: #fff;
    }

    main {
        max-width: 1100px;
        margin: 24px auto;
        padding: 0 16px;
    }
    section { display: none; }
    section.active { display: block; }

    h2 {
        color: var(--marron);
        border-bottom: 2px solid var(--borde);
        padding-bottom: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }
    thead { background: var(--marron-claro); color: #fff; }
    th, td {
        padding: 10px 12px;
        text-align: left;
        font-size: 0.92em;
        border-bottom: 1px solid var(--borde);
    }
    tbody tr:nth-child(even) { background: #fbf8f3; }
    tbody tr:hover { background: #f1e6d8; }

    .badge {
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 0.8em;
        font-weight: 600;
        color: #fff;
        white-space: nowrap;
    }
    .badge.Entregado { background: #4caf50; }
    .badge.Disponible { background: #2196f3; }
    .badge.En.tránsito, .badge.transito { background: #ff9800; }

    .filtros {
        display: flex;
        gap: 10px;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }
    .filtros input, .filtros select {
        padding: 8px 10px;
        border: 1px solid var(--borde);
        border-radius: 6px;
        font-size: 0.9em;
    }
    .vacio {
        text-align: center;
        color: #999;
        padding: 20px;
        font-style: italic;
    }
</style>
</head>
<body>

<header>
    <h1>Transporte de Nueces</h1>
    <p>Consulta de envíos, productos y servicios de transporte</p>
</header>

<nav>
    <a href="#" class="tab-link active" data-target="envios">Envíos</a>
    <a href="#" class="tab-link" data-target="productos">Productos</a>
    <a href="#" class="tab-link" data-target="transporte">Transporte</a>
</nav>

<main>

    <!-- ===================== ENVÍOS ===================== -->
    <section id="envios" class="active">
        <h2>Envíos</h2>
        <div class="filtros">
            <input type="text" id="buscarEnvio" placeholder="Buscar cliente o producto...">
        </div>
        <table id="tablaEnvios">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cant.</th>
                    <th>Peso (kg)</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Proveedor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT * FROM envios ORDER BY fecha DESC");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $estadoClase = str_replace(' ', '', $row['estado']);
                    echo "<tr>
                        <td>{$row['fecha']}</td>
                        <td>{$row['cliente']}</td>
                        <td>{$row['producto']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>{$row['peso_kg']}</td>
                        <td>{$row['origen']}</td>
                        <td>{$row['destino']}</td>
                        <td>{$row['proveedor']}</td>
                        <td><span class='badge {$estadoClase}'>{$row['estado']}</span></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='vacio'>No hay envíos registrados.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </section>

    <!-- ===================== PRODUCTOS ===================== -->
    <section id="productos">
        <h2>Productos</h2>
        <div class="filtros">
            <input type="text" id="buscarProducto" placeholder="Buscar producto...">
        </div>
        <table id="tablaProductos">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Presentación</th>
                    <th>Peso (kg)</th>
                    <th>Precio</th>
                    <th>Disponibilidad</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT * FROM productos ORDER BY producto ASC");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $precio = number_format($row['precio'], 2);
                    echo "<tr>
                        <td>{$row['producto']}</td>
                        <td>{$row['tipo']}</td>
                        <td>{$row['presentacion']}</td>
                        <td>{$row['peso_kg']}</td>
                        <td>\${$precio}</td>
                        <td><span class='badge {$row['disponibilidad']}'>{$row['disponibilidad']}</span></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='vacio'>No hay productos registrados.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </section>

    <!-- ===================== TRANSPORTE ===================== -->
    <section id="transporte">
        <h2>Servicios de Transporte</h2>
        <table id="tablaTransporte">
            <thead>
                <tr>
                    <th>Persona</th>
                    <th>Cantidad</th>
                    <th>Peso (kg)</th>
                    <th>Recorrido</th>
                    <th>Distancia (km)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT * FROM servicios_transporte");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['persona']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>{$row['peso']}</td>
                        <td>{$row['recorrido']}</td>
                        <td>{$row['distancia']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='vacio'>No hay servicios registrados.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </section>

</main>

<script>
// Cambiar de pestaña
document.querySelectorAll('.tab-link').forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
        document.querySelectorAll('.tab-link').forEach(l => l.classList.remove('active'));
        document.querySelectorAll('section').forEach(s => s.classList.remove('active'));
        link.classList.add('active');
        document.getElementById(link.dataset.target).classList.add('active');
    });
});

// Buscador simple para envíos
document.getElementById('buscarEnvio').addEventListener('input', function() {
    const filtro = this.value.toLowerCase();
    document.querySelectorAll('#tablaEnvios tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(filtro) ? '' : 'none';
    });
});

// Buscador simple para productos
document.getElementById('buscarProducto').addEventListener('input', function() {
    const filtro = this.value.toLowerCase();
    document.querySelectorAll('#tablaProductos tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(filtro) ? '' : 'none';
    });
});
</script>

</body>
</html>
