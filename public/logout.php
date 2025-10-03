<?php

// public/logout.php -> Cierra sesión y redirige al login

require __DIR__ . '/../app/helpers.php';
require __DIR__ . '/../app/auth.php';
include __DIR__ . '/../views/components/alerts.php';

// Cerrar la sesión
logout_user();

// Redirigir al login
redirect('login.php');
