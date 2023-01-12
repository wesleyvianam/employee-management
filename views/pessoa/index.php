<?php require_once __DIR__ . '/../components/baseInicio.php';?>

<?php require_once __DIR__ . '/_filtro.php';?>

<div class="shadow mb-5 bg-body rounded mt-4">
    <div class="bg-header d-flex justify-content-between py-2 px-3 align-items-center">
        <h5 class="text-light m-0">
            <i class="bi bi-person-fill pe-1"></i>
            Pessoas Cadastradas
        </h5>
        <div class="d-flex">
            <a href="/cadastrar-pessoa" class="btn btn-sm btn-header">
                <i class="bi bi-person-fill-add"></i>
                Novo Cadastro
            </a>
        </div>
    </div>
    <?php if (count($pessoas) > 0): ?>
        <div class="table-responsive">
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
                                <?= $pessoa->nome
                                    ? $pessoa->nome
                                    : '<span class="nao-informado">Não informado</span>' 
                                ?>
                                <br />
                                <small>
                                    <strong>Sexo:</strong> 
                                    <span>
                                        <?= $pessoa->sexo == 'Feminino' 
                                            ? '<i class="bi bi-gender-female c-feminino"></i>' 
                                            : '<i class="bi bi-gender-male c-masculino"></i>' 
                                        ?>
                                        <?= $pessoa->sexo; ?>
                                    </span>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <strong>Nascimento:</strong> 
                                    <?= $pessoa->nascimento
                                        ? $pessoa->nascimento
                                        : '<span class="nao-informado">Não informado</span>' 
                                    ?>
                                </small> <br />
                                <small>
                                    <strong>CPF:</strong> 
                                    <?= $pessoa->cpf
                                        ? $pessoa->cpf
                                        : '<span class="nao-informado">Não informado</span>' 
                                    ?>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <strong>E-mail:</strong> 
                                    <?= $pessoa->email
                                        ? $pessoa->email
                                        : '<span class="nao-informado">Não informado</span>' 
                                    ?>
                                </small> <br />
                                <small>
                                    <strong>Celular:</strong> 
                                    <?= $pessoa->celular
                                        ? $pessoa->celular
                                        : '<span class="nao-informado">Não informado</span>' 
                                    ?>
                                </small>
                            </td>
                            <td>
                                <?= $pessoa->profissao
                                    ? $pessoa->profissao
                                    : '<span class="nao-informado">Não informado</span>' 
                                ?>
                            </td>
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
    <?php else: ?>
        <p class="nao-informado m-0 p-3">
            Nenhum cadastro para mostrar.
        </p>
    <?php endif ?>

    <div class="d-flex justify-content-center align-items-center"> 
        <?php foreach ($pagina->obterPaginas() as $page):?>
            <a href="?pagina=<?= $page['pagina'] . "&" . $gets  ?>">
                <button type="button" class="btn btn-sm btn-<?= $page['atual'] == 1? 'paginator-atual' : 'paginator' ?> mx-1 mb-3"><?= $page['pagina'] ?></button>
            </a>    
        <?php endforeach ?> 
    </div>
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>
