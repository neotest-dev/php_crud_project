<?php

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'], // convierte array() en []
        'no_unused_imports' => true, // elimina use innecesarios
        'single_quote' => true, // usa comillas simples donde se pueda
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__) // busca en todo tu proyecto
            ->name('*.php') // solo archivos .php
            ->exclude('vendor') // ignora vendor (composer)
    );
