<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-5 bg-body rounded mt-4" >
    <div class="bg-header py-2 px-3">
        <h5 class="text-light m-0 pe-1">
            <?php if ($pessoa): ?>
                <i class="bi bi-pencil-square"></i>
                Editar Pessoa
            <?php else: ?>
                <i class="bi bi-person-fill-add"></i>
                Novo Cadastro
            <?php endif ?>
        </h5>
    </div>
    
    <?php require_once __DIR__ . '/_form.php';?>
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>