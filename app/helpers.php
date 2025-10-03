<?php

// app/helpers.php

// ----------------------
// 1. Inicia la sesión
// ----------------------
// Necesario para poder usar $_SESSION en todo el proyecto
session_start();

// ----------------------
// 2. Función base_url
// ----------------------
// Genera la URL completa de la app combinando la base_url del config con una ruta opcional
function base_url(string $path = ''): string
{
    // Cargamos la configuración
    $config = require __DIR__. '/config.php';

    // rtrim quita la barra final de la base_url si existe
    // ltrim quita la barra inicial de la ruta que pasamos
    // Así evitamos que queden // dobles en la URL
    return rtrim($config['app']['base_url'], '/') . '/' . ltrim($path, '/');
}

// ----------------------
// 3. Función redirect
// ----------------------
// Redirige al usuario a otra página usando base_url
function redirect(string $path)
{
    header('Location: ' . base_url($path)); // enviamos cabecera de redirección
    exit; // detenemos la ejecución para que no siga el código
}

// ----------------------
// 4. Función flash
// ----------------------
// Sirve para mensajes temporales (alertas, errores, éxitos)
function flash(string $key, ?string $message = null)
{
    // Si pasamos un mensaje, lo guardamos en la sesión
    if ($message !== null) {
        $_SESSION['flash'][$key] = $message;
        return;
    }

    // Si ya existe un mensaje guardado, lo devolvemos y eliminamos
    if (isset($_SESSION['flash'][$key])) {
        $msg = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]); // se elimina para que solo se muestre una vez
        return $msg;
    }

    // Si no hay mensaje, devolvemos null
    return null;
}

// ----------------------
// 5. Función e
// ----------------------
// Escapa caracteres especiales para imprimir en HTML sin riesgos
function e(string $value): string
{
    // htmlspecialchars convierte <, >, " y ' a entidades HTML
    // ENT_QUOTES = convierte comillas simples y dobles
    // UTF-8 = juego de caracteres seguro
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
