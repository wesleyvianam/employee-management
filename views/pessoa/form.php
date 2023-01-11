<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-5 bg-body rounded mt-4" >
    <div class="bg-header py-2 px-4 d-flex justify-content-between align-items-center">
        <h3 class="text-light">
            Novo Cadastro
        <h3>
        <a href="/" class="btn btn-sm btn-danger">Cancelar</a>
    </div>
    <form class="p-3 row" method="post">
        <?php if ($pessoa != null): ?>
            <input type="hidden" name="id" value="<?= $pessoa->id ?>" />
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
                value="<?= $pessoa?->nome; ?>">
        </div>
        
        <div class="col-md-4">
            <label for="email" class="form-label">email:</label>
            <input type="email" 
                name="email" 
                id="email" 
                class="form-control 
                form-control-sm" 
                required
                value="<?= $pessoa?->email; ?>">
        </div>

        <div class="col-md-4">
            <label for="nascimento" class="form-label">nascimento:</label>
            <input type="date"
                name="nascimento" 
                id="nascimento" 
                class="form-control 
                form-control-sm" 
                required
                value="<?= $pessoa?->nascimento; ?>">
        </div>

        <div class="col-md-4">
            <label for="sexo" class="form-label">sexo:</label>
            <select type="select"
                name="sexo" 
                id="sexo" 
                placeholder="Selecione" 
                class="form-select form-select-sm" 
                required
            >
                <option value="<?= $pessoa != null ? "$pessoa->sexo" : ""; ?>">
                    <?= $pessoa != null ? "$pessoa->sexo" : "selecione";?>
                </option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text"
                name="cpf" 
                id="cpf" 
                class="form-control 
                form-control-sm" 
                required
                value="<?= $pessoa?->cpf; ?>">
        </div>

        <div class="col-md-4">
            <label for="rg" class="form-label">RG:</label>
            <input type="text" 
                name="rg" 
                id="rg" 
                class="form-control form-control-sm" 
                required
                value="<?= $pessoa?->rg; ?>">
        </div>

        <div class="col-md-4">
            <label for="celular" class="form-label">celular:</label>
            <input type="text" 
                name="celular" 
                id="celular" 
                class="form-control form-control-sm" 
                required
                value="<?= $pessoa?->celular; ?>">
        </div>
    
        <div class="col-md-4">
            <label for="telefone" class="form-label">telefone:</label>
            <input type="text" 
                name="telefone" 
                id="telefone" 
                class="form-control form-control-sm" 
                required
                value="<?= $pessoa?->telefone; ?>">
        </div>

        <div class="col-md-4">
            <label for="profissao_id" class="form-label">profissão:</label>
            <select type="select"
                name="profissao_id" 
                id="profissao_id" 
                class="form-select form-select-sm" 
                required>
                <option value="<?= $pessoa != null ? "$pessoa->profissao" : ""; ?>">
                    <?= $pessoa != null ? "$pessoa->profissao" : "selecione";?>
                </option>
                <?php foreach ($profissoes as $profissao): ?>
                    <option value="<?= $profissao->id; ?>>"><?= $profissao->nome ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-sm btn-cadastrar"><?= $pessoa === false ? "Cadastrar" : "Atualizar" ?></button>
        </div>
    </form> 
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>