<div class="shadow mb-3 bg-body rounded mt-4">
    <div class="text-light text-decoration-none bg-header d-flex py-2 px-4 align-items-center">            
        <h5 class="m-0">
            <i class="bi bi-search"></i>
            Filtrar
        </h5>
    </div>
    <form class="row p-4" method="get">
        <div class="col-md-4">
            <label class="form-label">Nome</label>
            <input type="text" 
                name="nome" 
                class="form-control form-control-sm" 
                placeholder="Digite o nome da pessoa" 
                value="<?= $nome ?>"/>
        </div>
        
        <div class="col-md-2">
            <label class="form-label">Sexo</label>
            <select type="select" name="sexo" class="form-select form-select-sm">
                <?= $sexo ? $sexo : "" ?>"><?= $sexo ? $sexo : "Todos" ?>
                <?= $sexo 
                    ? "<option value='<?= $sexo ?>'>$sexo</option>
                        <option value=''>Todos</option>"
                    : '<option value="">Todos</option>'?>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label">CPF:</label>
            <input type="text" 
                name="cpf" 
                class="form-control form-control-sm" 
                placeholder="000.000.000-00"
                value="<?= $cpf ?>"/>
        </div>

        <div class="col-md-2">
            <label class="form-label">Nascido de:</label>
            <input type="date" 
                name="nascido_de" 
                class="form-control form-control-sm"
                min="1923-01-01" max="2023-12-31"
                value="<?= $nascidoDe ?>"/>
        </div>

        <div class="col-md-2">
            <label class="form-label">Nascido até:</label>
            <input type="date" 
                name="nascido_ate" 
                class="form-control form-control-sm" 
                placeholder="dd-mm-yyyy" 
                min="1923-01-01" max="2023-12-31"
                value="<?= $nascidoAte ?>"/>
        </div>

        <div class="text-end mt-3">
            <a href="/?pagina=1" class="btn btn-sm btn-light border px-2 me-1">
                Limpar
            </a>
            <button type="submit" class="btn btn-sm btn-header px-2">
                <i class="bi bi-search"></i>    
                Buscar
            </button>
        </div>
    </form>
</div>