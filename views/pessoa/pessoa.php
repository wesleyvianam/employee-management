<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-5 bg-body rounded mt-4">
    <div class="bg-header py-2 px-4">
        <h3 class="text-light m-0">
            <?= $pessoa->nome ?>
        </h3>
    </div>
    <div class="row p-3">
        <div class="col-md-12 row">
            <div class="col-md-4 pb-2">
                <strong>Profissão:</strong>
                <?= $profissao->nome ?>
            </div>
            <div class="col-md-4 pb-2">
                <strong>Data Nascimento:</strong>
                <?= $pessoa->nascimento; ?>
            </div>
            <div class="col-md-4 pb-2">
                <strong>Sexo:</strong>
                <span class="badge bg-<?= $pessoa->sexo == 'Feminino' ? 'feminino' : 'masculino' ?>">
                    <?= $pessoa->sexo ?>
                </span>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-4 pb-2">
                <strong>Telefone:</strong>
                <?= $pessoa->telefone ?>
            </div>
            <div class="col-md-4 pb-2">
                <strong>RG:</strong>
                <?= $pessoa->rg ?>
            </div>
            <div class="col-md-4 pb-2">
                <strong>CPF:</strong>
                <?= $pessoa->cpf ?>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-4 pb-2">
                <strong>Celular:</strong>
                <?= $pessoa->celular ?>
            </div>
            <div class="col-md-8">
                <strong>E-mail:</strong>
                <?= $pessoa->email ?>
            </div>  
        </div>
    </div>
    <div class="text-end pb-3 me-3">
        <a href="/?pagina=1" class="btn btn-sm btn-light border">
            <i class="bi bi-arrow-left-short"></i>
            Voltar
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>