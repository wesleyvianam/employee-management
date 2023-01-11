<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-5 bg-body rounded mt-4" >
    <div class="bg-header p-2 px-4">
        <h5 class="text-light m-0">
            <?php if ($profissao): ?>
                <i class="bi bi-pencil-square"></i>
                Editar Profissão
            <?php else: ?>
                <i class="bi bi-briefcase-fill"></i>
                Nova Profissão
            <?php endif ?>
        </h5>
    </div>

    <?php require_once __DIR__ . '/_form.php';?>
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>