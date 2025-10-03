<?php

// app/csrf.php

// ----------------------
// 1. Inicia la sesión si no está activa
// ----------------------
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// ----------------------
// 2. Función csrf_token
// ----------------------
// Genera un token CSRF único y lo guarda en la sesión
function csrf_token(): string
{
    // Si aún no hay token, generamos uno nuevo de 32 bytes en hexadecimal
    if (empty($_SESSION['_csrf'])) {
        $_SESSION['_csrf'] = bin2hex(random_bytes(32));
    }

    // Devolvemos el token
    return $_SESSION['_csrf'];
}

// ----------------------
// 3. Función csrf_field
// ----------------------
// Devuelve un input oculto para colocar en los formularios
function csrf_field(): string
{
    // <input type="hidden" name="_csrf" value="token">
    return '<input type="hidden" name="_csrf" value="' . csrf_token() . '">';
}

// ----------------------
// 4. Función verify_csrf
// ----------------------
// Verifica si el token enviado en el formulario es válido
function verify_csrf(): bool
{
    // Si no existe el token en POST o en sesión, devolvemos false
    if (!isset($_POST['_csrf'], $_SESSION['_csrf'])) {
        return false;
    }

    // hash_equals compara de manera segura ambos tokens
    $ok = hash_equals($_SESSION['_csrf'], $_POST['_csrf']);

    // Eliminamos el token para que sea de 1 solo uso
    unset($_SESSION['_csrf']);

    // Devolvemos true si coincide, false si no
    return $ok;
}
