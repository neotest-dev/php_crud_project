<?php
// public/dashboard.php

require __DIR__ . '/../app/helpers.php';
require __DIR__ . '/../app/auth.php';

// Verifica que el usuario esté autenticado
require_auth();

$title = 'Dashboard';

// Partials
include __DIR__ . '/../views/partials/head.php';
include __DIR__ . '/../views/partials/navbar.php';
?>

<div class="container py-4">
  <div class="row g-3">

    <!-- Card Usuarios -->
    <div class="col-md-3">
      <div class="card text-bg-primary shadow-sm">
        <div class="card-body">
          <h6 class="card-title">Usuarios</h6>
          <p class="card-text fs-4">Resumen</p>
        </div>
      </div>
    </div>

    <!-- Card Clientes -->
    <div class="col-md-3">
      <div class="card text-bg-success shadow-sm">
        <div class="card-body">
          <h6 class="card-title">Clientes</h6>
          <p class="card-text fs-4">CRUD activo</p>
        </div>
      </div>
    </div>

    <!-- Card Bienvenida -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Bienvenido, <?= e($_SESSION['user']['nombre']) ?></h5>
          <p class="card-text">
            Este es tu panel principal. Usa el menú para gestionar clientes.
          </p>
          <a href="<?= e(base_url('clientes/index.php')) ?>" class="btn btn-outline-primary">
            Ir a Clientes
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
// Cierra con el footer
include __DIR__ . '/../views/partials/footer.php';
?>
