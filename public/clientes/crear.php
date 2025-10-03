<?php
// public/clientes/crear.php (Create - form)
require __DIR__ . '/../../app/helpers.php';
require __DIR__ . '/../../app/auth.php';
require __DIR__ . '/../../app/csrf.php';

require_auth();

$title = 'Crear Cliente';

include __DIR__ . '/../../views/partials/head.php';
include __DIR__ . '/../../views/partials/navbar.php';
include __DIR__ . '/../../views/components/alerts.php';
?>

<div class="container py-4">
    <h4>Nuevo cliente</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="post" action="<?= e(base_url('clientes/guardar.php')) ?>">
                <?= csrf_field() ?>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombres</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control">
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Guardar</button>
                    <a href="<?= e(base_url('clientes/index.php')) ?>" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../views/partials/footer.php'; ?>
