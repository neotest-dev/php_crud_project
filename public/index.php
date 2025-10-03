<?php

// public/index.php -> Procesa login y redirige al dashboard

require __DIR__ . '/../app/helpers.php';
require __DIR__ . '/../app/csrf.php';
require __DIR__ . '/../app/db.php';
require __DIR__ . '/../app/auth.php';
include __DIR__ . '/../views/components/alerts.php';

// Procesar el login solo si llega por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validar token CSRF
    if (!verify_csrf()) {
        flash('error', 'Token CSRF inválido. Intenta nuevamente.');
        redirect('login.php');
    }

    // Capturar credenciales
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Buscar usuario por email
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verificar credenciales
    if ($user && password_verify($password, $user['password_hash'])) {
        login_user($user);
        redirect('dashboard.php');
    } else {
        flash('error', 'Credenciales incorrectas.');
        redirect('login.php');
    }

} else {
    // Si ya está logueado, ir directo al dashboard
    if (!empty($_SESSION['user'])) {
        redirect('dashboard.php');
    }

    // Si no, volver al login
    redirect('login.php');
}
