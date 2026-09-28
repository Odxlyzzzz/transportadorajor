<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: quote.php");
    exit;
}

$nombre   = trim($_POST['nombre'] ?? '');
$correo   = trim($_POST['correo'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$nota     = trim($_POST['nota'] ?? '');

// tipo_carga llega como arreglo (varios checkboxes)
$tipos = $_POST['tipo_carga'] ?? [];
if (!is_array($tipos)) {
    $tipos = [$tipos];
}
$tipos = array_filter(array_map('trim', $tipos), fn($t) => $t !== '');
$tipo_carga = implode(', ', $tipos);

if ($nombre === '' || $correo === '' || $telefono === '' || $tipo_carga === '') {
    header("Location: quote.php?status=error");
    exit;
}

$stmt = $conn->prepare(
    "INSERT INTO cotizaciones (nombre, correo, telefono, tipo_carga, nota) VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("sssss", $nombre, $correo, $telefono, $tipo_carga, $nota);

if ($stmt->execute()) {
    header("Location: quote.php?status=success");
} else {
    header("Location: quote.php?status=error");
}

$stmt->close();
$conn->close();
exit;