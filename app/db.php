<?php

$config = require __DIR__.'/config.php';
$pdo = new PDO('mysql:host=localhost;dbname='.$config['db']['name'], $config['db']['user'], $config['db']['pass']);
