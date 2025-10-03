<?php

//app/config.php
// Devuelve un array con la configuración de la app.
// Cuando haces: $config = require 'app/config.php'; $config contendrá este array.
return [
    // ---------- configuración de la base de datos ----------
    'db' => [                      // 'db' es la clave que agrupa todo lo relacionado a la BD
        'host' => 'localhost',      // dirección del servidor de BD (ej. localhost en tu PC)
        'port' => '3306',
        'name' => 'app_demo',      // nombre de la base de datos que usarás
        'user' => 'root',          // usuario de la base de datos (ej. root en XAMPP)
        'pass' => '',   // contraseña del usuario (vacía en XAMPP por defecto)
        'charset' => 'utf8mb4'
    ],

    // ---------- configuración general de la aplicación ----------
    'app' => [                     // 'app' agrupa opciones relacionadas a la aplicación
        'base_url' => 'http://localhost/php_crud_project/public', // URL base para generar enlaces y redirecciones
        'env' => 'local'           // entorno: 'local' (desarrollo) o 'production' (servidor real)
    ]
];
