<?php
// public/login.php

require __DIR__ . '/../app/helpers.php';
require __DIR__ . '/../app/csrf.php';

$title = 'Iniciar Sesión';

// Incluye el head (abre <html> y <head>)
include __DIR__ . '/../views/partials/head.php';
include __DIR__ . '/../views/components/alerts.php';
?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-body">
          
          <h5 class="card-title mb-3">Iniciar sesión</h5>

          <?php if ($msg = flash('error')): ?>
            <div class="alert alert-danger">
              <?= e($msg) ?>
            </div>
          <?php endif; ?>

          <form method="post" action="<?= e(base_url('index.php')) ?>">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="password" required>
            </div>

            <button class="btn btn-primary w-100" type="submit">
              Entrar
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
// Incluye el footer (cierra body y html)
include __DIR__ . '/../views/partials/footer.php';
?>
