<?php
// public/clientes/editar.php (Update - form)

require __DIR__ . '/../../app/helpers.php';
require __DIR__ . '/../../app/auth.php';
require __DIR__ . '/../../app/csrf.php';
require __DIR__ . '/../../app/db.php';

require_auth();

$id = intval($_GET['id'] ?? 0);

$stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = ?');
$stmt->execute([$id]);
$cli = $stmt->fetch();

if (!$cli) {
    flash('error', 'Cliente no encontrado.');
    redirect('clientes/index.php');
}

$title = 'Editar Cliente';

include __DIR__ . '/../../views/partials/head.php';
include __DIR__ . '/../../views/partials/navbar.php';
include __DIR__ . '/../../views/components/alerts.php';
?>

<div class="container py-4">
    <h4>Editar cliente</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="post" action="<?= e(base_url('clientes/actualizar.php')) ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= e($cli['id']) ?>">

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombres</label>
                        <input 
                            type="text" 
                            name="nombre" 
                            class="form-control" 
                            value="<?= e($cli['nombre']) ?>" 
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control" 
                            value="<?= e($cli['email']) ?>" 
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Teléfono</label>
                        <input 
                            type="text" 
                            name="telefono" 
                            class="form-control" 
                            value="<?= e($cli['telefono']) ?>"
                        >
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Actualizar</button>
                    <a href="<?= e(base_url('clientes/index.php')) ?>" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../views/partials/footer.php'; ?>
