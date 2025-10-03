<?php
// views/partials/header.php
?>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= e(base_url('dashboard.php')) ?>">App Demo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= e(base_url('clientes/index.php')) ?>">Clientes</a>
        </li>
      </ul>
      <span class="navbar-text me-3">
        Hola, <?= e($_SESSION['user']['nombre'] ?? 'Invitado') ?>
      </span>
      <a class="btn btn-outline-light btn-sm" href="<?= e(base_url('logout.php')) ?>">Salir</a>
    </div>
  </div>
</nav>
<div class="container mt-4">
