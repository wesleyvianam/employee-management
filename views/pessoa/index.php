<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-3 bg-body rounded mt-4">
    <a class="text-light text-decoration-none bg-header d-flex py-2 px-4 align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">            
        <i class="bi bi-search"></i>Filtrar
    </a>
    <form class="row col-md-12 p-3 collapse" id="collapseExample">
        <div class="col-md-4">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control form-control-sm" placeholder="Digite o nome da pessoa" />
        </div>

        <div class="col-md-2">
            <label class="form-label">sexo</label>
            <select type="select" class="form-select form-select-sm">
                <option value="">selecione</option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label">Profissão</label>
            <select type="select" class="form-select form-select-sm">
                <option value="">selecione</option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label">Nascido de:</label>
            <input type="date" class="form-control form-control-sm" />
        </div>

        <div class="col-md-2">
            <label class="form-label">Nascido até:</label>
            <input type="date" class="form-control form-control-sm" />
        </div>

        <div class="text-end mt-3">
            <a href="#" class="btn btn-sm btn-light border">
                <i class="bi bi-x-circle"></i>    
                Limpar
            </a>
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="bi bi-search"></i>    
                Buscar
            </button>
        </div>
    </form>
</div>


<div class="shadow mb-5 bg-body rounded mt-4">
    <div class="bg-header d-flex justify-content-between py-2 px-4 align-items-center">
        <h6 class="text-light">
            <i class="bi bi-person-fill"></i>
            Pessoas
        </h6>
        <div class="d-flex">
            <a href="/cadastrar-pessoa" class="btn btn-sm btn-header">
            <i class="bi bi-person-fill-add"></i>
                Novo Cadastro
            </a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NOME</th>
                <th scope="col">DADOS</th>
                <th scope="col">CONTATO</th>
                <th scope="col">PROFISSÃO</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoas as $key => $pessoa): ?>
                <tr>
                    <td>
                        <?= $pessoa->nome; ?>
                        <br />
                        <small>
                            <strong>Sexo:</strong> 
                            <span class="badge bg-<?= $pessoa->sexo == 'Feminino' ? 'feminino' : 'masculino' ?>">
                                <?= $pessoa->sexo; ?>
                            </span>
                        </small>
                    </td>
                    <td>
                        <small>
                            <strong>Nascimento:</strong> 
                            <?= $pessoa->nascimento; ?>
                        </small> <br />
                        <small>
                            <strong>CPF:</strong> 
                            <?= $pessoa->cpf; ?>
                        </small>
                    </td>
                    <td>
                        <small>
                            <strong>Email:</strong> 
                            <?= $pessoa->email; ?>
                        </small> <br />
                        <small>
                            <strong>Celular:</strong> 
                            <?= $pessoa->celular; ?>
                        </small>
                    </td>
                    <td><?= $pessoa->profissao; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-header dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opções
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/pessoa?id=<?= $pessoa->id; ?>">
                                        <i class="bi bi-eye-fill"></i>
                                        Perfil Completo
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/editar-pessoa?id=<?= $pessoa->id;?>">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/remover-pessoa?id=<?= $pessoa->id; ?>">
                                        <i class="bi bi-trash-fill"></i>
                                        Deletar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>   
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>

    


