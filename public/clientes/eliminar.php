<?php

// public/clientes/eliminar.php (Delete)

require __DIR__ . '/../../app/helpers.php';
require __DIR__ . '/../../app/auth.php';
require __DIR__ . '/../../app/db.php';
include __DIR__ . '/../../views/components/alerts.php';

require_auth();

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    $stmt = $pdo->prepare('DELETE FROM clientes WHERE id = ?');
    $stmt->execute([$id]);

    flash('ok', 'Cliente eliminado.');
}

redirect('clientes/index.php');
