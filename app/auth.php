<?php

// app/auth.php

// ----------------------
// 1. Inicia la sesión si no está activa
// ----------------------
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// ----------------------
// 2. Función require_auth
// ----------------------
// Esta función se usa para proteger páginas que requieren login
function require_auth()
{
    // Si no hay usuario en la sesión, redirige a login
    if (empty($_SESSION['user'])) {
        header('Location: ' . base_url('login.php'));
        exit; // corta la ejecución para que no se muestre la página
    }
}

// ----------------------
// 3. Función login_user
// ----------------------
// Guarda los datos del usuario en la sesión al iniciar sesión
function login_user(array $user)
{
    session_regenerate_id(true); // evita que roben la sesión (session fixation)

    // Guardamos solo los datos necesarios en la sesión
    $_SESSION['user'] = [
        'id' => $user['id'],
        'nombre' => $user['nombre'],
        'email' => $user['email'],
        'rol' => $user['rol'],
    ];
}

// ----------------------
// 4. Función logout_user
// ----------------------
// Cierra la sesión de forma segura
function logout_user()
{
    // Vaciamos todas las variables de sesión
    $_SESSION = [];

    // Si las sesiones usan cookies, eliminamos la cookie
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),       // nombre de la cookie de sesión
            '',                   // valor vacío
            time() - 42000,       // fecha pasada para que caduque
            $params['path'],      // path de la cookie
            $params['domain'],    // dominio de la cookie
            $params['secure'],    // solo https si aplica
            $params['httponly']   // no accesible desde JS
        );
    }

    // Destruye la sesión en el servidor
    session_destroy();
}
