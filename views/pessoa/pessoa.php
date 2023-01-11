<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-5 bg-body rounded mt-4">
    <div class="bg-header py-2 px-4 d-flex justify-content-between align-items-center">
        <h3 class="text-light">
            <?= $pessoa->nome ?>
        </h3>
        <a href="/?pagina=1" class="btn btn-sm btn-light border">
            <i class="bi bi-arrow-left-short"></i>
            Voltar
        </a>
    </div>
    <div class="row p-3">
        <div class="col-md-12 row">
            <div class="col-md-4">
                <strong>Profissão:</strong>
                <?= $pessoa->profissao ?>
            </div>
            <div class="col-md-4">
                <strong>Data Nascimento:</strong>
                <?= $dataNascimento; ?>
            </div>
            <div class="col-md-4">
                <strong>Sexo:</strong>
                <span class="badge bg-<?= $pessoa->sexo == 'Feminino' ? 'feminino' : 'masculino' ?>">
                    <?= $pessoa->sexo ?>
                </span>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-4">
                <strong>Telefone:</strong>
                <?= $pessoa->telefone ?>
            </div>
            <div class="col-md-4">
                <strong>RG:</strong>
                <?= $pessoa->rg ?>
            </div>
            <div class="col-md-4">
                <strong>CPF:</strong>
                <?= $pessoa->cpf ?>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-4">
                <strong>Celular:</strong>
                <?= $pessoa->celular ?>
            </div>
            <div class="col-md-8">
                <strong>E-mail:</strong>
                <?= $pessoa->email ?>
            </div>  
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>