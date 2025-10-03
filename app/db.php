<?php

// app/db.php

// 1. Cargamos el archivo de configuración (config.php).
// __DIR__ = ruta actual (app/). Con esto incluimos el array que retorna config.php
$config = require __DIR__.'/config.php';

// 2. Armamos el DSN (Data Source Name) que le dice a PDO cómo conectarse a MySQL.
// sprintf() rellena el string con los valores que están en $config['db']
// - host = servidor de BD (localhost)
// - port = puerto de MySQL (normalmente 3306)
// - dbname = nombre de la base de datos
// - charset = juego de caracteres (utf8mb4 recomendado)
$dsn = sprintf(
    'mysql:host=%s;port=%s;dbname=%s;charset=%s',
    $config['db']['host'],
    $config['db']['port'],
    $config['db']['name'],
    $config['db']['charset'],
);

// 3. Intentamos crear la conexión con PDO.
try {
    $pdo = new PDO(
        $dsn,                      // DSN (cadena de conexión)
        $config['db']['user'],     // usuario de la base de datos
        $config['db']['pass'],     // contraseña del usuario
        [                          // opciones adicionales
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,     // que lance excepciones en caso de error
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // devuelve resultados como arrays asociativos
            PDO::ATTR_EMULATE_PREPARES => false,             // usa sentencias preparadas reales (más seguro)
        ]
    );
} catch (PDOException $e) {
    // 4. Si falla la conexión, mostramos el error y detenemos el programa
    die('Error de conexión: ' .$e->getMessage());
}
