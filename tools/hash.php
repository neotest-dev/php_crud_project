<?php

//generar hash para el admin
$hash = password_hash('admin', PASSWORD_DEFAULT);
echo $hash;

//hash generado
//$2y$10$JmAOeuoQAcdLhPKUjvXGjerKHqKKJwFY69zKJUWXMr.J5P.cu03PW
