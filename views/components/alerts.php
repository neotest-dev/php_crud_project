<?php if ($msg = flash('ok')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= e($msg) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if ($msg = flash('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= e($msg) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
