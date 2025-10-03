<?php

// public/clientes/actualizar.php (Update - action)

require __DIR__ . '/../../app/helpers.php';
require __DIR__ . '/../../app/csrf.php';
require __DIR__ . '/../../app/auth.php';
require __DIR__ . '/../../app/db.php';
include __DIR__ . '/../../views/components/alerts.php';

require_auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf()) {
    $id       = intval($_POST['id'] ?? 0);
    $nombre   = trim($_POST['nombre'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');

    $stmt = $pdo->prepare('UPDATE clientes SET nombre = ?, email = ?, telefono = ? WHERE id = ?');
    $stmt->execute([$nombre, $email, $telefono, $id]);

    flash('ok', 'Cliente actualizado.');
    redirect('clientes/index.php');
} else {
    flash('error', 'Solicitud inválida.');
    redirect('clientes/index.php');
}
