<?php

// public/clientes/guardar.php (Create - action)

require __DIR__ . '/../../app/helpers.php';
require __DIR__ . '/../../app/csrf.php';
require __DIR__ . '/../../app/auth.php';
require __DIR__ . '/../../app/db.php';
include __DIR__ . '/../../views/components/alerts.php';


require_auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf()) {
    $nombres  = trim($_POST['nombre'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');

    $stmt = $pdo->prepare(
        'INSERT INTO clientes (nombre, email, telefono) VALUES (?, ?, ?)'
    );
    $stmt->execute([$nombres, $email, $telefono]);

    flash('ok', 'Cliente creado.');
    redirect('clientes/index.php');
} else {
    flash('error', 'Solicitud inválida.');
    redirect('clientes/index.php');
}
