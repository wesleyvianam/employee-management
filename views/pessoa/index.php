<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<div class="shadow mb-5 bg-body rounded mt-4">
    <div class="bg-header d-flex justify-content-between py-2 px-4 align-items-center">
        <h3 class="text-light">
            <i class="bi bi-person-fill"></i>
            Pessoas
        </h3>
        <div class="d-flex">
            <a href="/cadastrar-pessoa" class="btn btn-sm btn-header me-2">
                <i class="bi bi-plus"></i>
                Novo Cadastro
            </a>
            <div class="dropdown">
                <button class="btn btn-sm btn-header dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filtros
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/pessoas">Mostrar Todos</a></li>
                    <li><a class="dropdown-item" href="/">Filtrar Mulheres +20 Anos </a></li>
                </ul>
            </div>
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

    


