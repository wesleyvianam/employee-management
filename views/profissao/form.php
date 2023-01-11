<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-5 bg-body rounded mt-4" >
    <div class="bg-header py-2 px-4">
        <h3 class="text-light">
            Nova Profissão
        <h3>
    </div>
    <form class="p-3 row" method="post">
        <?php if ($profissao != null): ?>
            <input type="hidden" name="id" value="<?= $profissao->id ?>" />
        <?php endif; ?>
        <div class="col-md-4">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" 
                name="nome" 
                id="nome" 
                class="form-control 
                form-control-sm" 
                required
                autofocus
                value="<?= $profissao?->nome; ?>">
        </div>
        
        <div class="text-end mt-3">
            <a href="/" class="btn btn-sm btn-danger me-1">Cancelar</a>
            <button type="submit" class="btn btn-sm btn-cadastrar"><?= $profissao == false ? "Cadastrar" : "Atualizar" ?></button>
        </div>
    </form> 
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>