<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-5 bg-body rounded mt-4">
    <div class="bg-header py-2 px-3">
        <h5 class="text-light m-0">
            <i class="bi bi-person-circle pe-1"></i>
            <?= $pessoa->nome ?>
        </h5>
    </div>
    <div class="row p-3">
        <div class="col-md-12 row">
            <div class="col-md-4 pb-2">
                <strong>Profissão:</strong>
                <?= $profissao->nome
                    ? $profissao->nome
                    : '<span class="nao-informado">Não informado</span>' 
                ?>
            </div>
            <div class="col-md-4 pb-2">
                <strong>Data Nascimento:</strong>
                <?= $pessoa->nascimento
                    ? $pessoa->nascimento
                    : '<span class="nao-informado">Não informado</span>' 
                ?>
            </div>
            <div class="col-md-4 pb-2">
                <strong>Sexo:</strong>
                <span>
                    <?= $pessoa->sexo == 'Feminino' 
                        ? '<i class="bi bi-gender-female c-feminino"></i>' 
                        : '<i class="bi bi-gender-male c-masculino"></i>' 
                    ?>
                    <?= $pessoa->sexo
                        ? $pessoa->sexo
                        : '<span class="nao-informado">Não informado</span>' 
                    ?>
                </span>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-4 pb-2">
                <strong>Telefone:</strong>
                <?= $pessoa->telefone
                    ? $pessoa->telefone
                    : '<span class="nao-informado">Não informado</span>'
                ?>
            </div>
            <div class="col-md-4 pb-2">
                <strong>RG:</strong>
                <?= $pessoa->rg 
                    ? $pessoa->rg 
                    : '<span class="nao-informado">Não informado</span>'
                ?>
            </div>
            <div class="col-md-4 pb-2">
                <strong>CPF:</strong>
                <?= $pessoa->cpf 
                    ? $pessoa->cpf 
                    : '<span class="nao-informado">Não informado</span>' 
                ?>
            </div>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-4 pb-2">
                <strong>Celular:</strong>
                <?= $pessoa->celular 
                    ? $pessoa->celular 
                    : '<span class="nao-informado">Não informado</span>' 
                ?>
            </div>
            <div class="col-md-6">
                <strong>E-mail:</strong>
                <?= $pessoa->email
                    ? $pessoa->email
                    : '<span class="nao-informado">Não informado</span>' 
                ?>
            </div>  
            <div class="text-end col-md-2">
                <a href="/?pagina=1" class="btn btn-sm btn-light border">
                    <i class="bi bi-arrow-left-short"></i>
                    Voltar
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>