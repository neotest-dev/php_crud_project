<?php
// public/clientes/index.php (Read)

require __DIR__ . '/../../app/helpers.php';
require __DIR__ . '/../../app/auth.php';
require __DIR__ . '/../../app/db.php';

require_auth();

$title = 'Clientes';

// Partials
include __DIR__ . '/../../views/partials/head.php';
include __DIR__ . '/../../views/partials/navbar.php';
include __DIR__ . '/../../views/components/alerts.php';

//components/alerts.php';


// Consultar clientes
$stmt = $pdo->query('SELECT * FROM clientes ORDER BY id ASC');
$clientes = $stmt->fetchAll();
?>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Clientes</h4>
    <a href="<?= e(base_url('clientes/crear.php')) ?>" class="btn btn-primary">Nuevo</a>
  </div>

  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($clientes as $c): ?>
            <tr>
              <td><?= e($c['id']) ?></td>
              <td><?= e($c['nombre']) ?></td>
              <td><?= e($c['email']) ?></td>
              <td><?= e($c['telefono']) ?></td>
              <td>
                <a 
                  class="btn btn-sm btn-warning" 
                  href="<?= e(base_url('clientes/editar.php?id=' . $c['id'])) ?>">
                  Editar
                </a>
                <a 
                  class="btn btn-sm btn-danger" 
                  href="<?= e(base_url('clientes/eliminar.php?id=' . $c['id'])) ?>" 
                  onclick="return confirm('¿Eliminar?')">
                  Eliminar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
// Footer
include __DIR__ . '/../../views/partials/footer.php';
?>
