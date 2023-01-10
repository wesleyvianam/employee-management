<?php require_once __DIR__ . '/../components/baseInicio.php';?>
<div class="shadow mb-5 bg-body rounded mt-4">
    <div class="bg-header d-flex justify-content-between py-2 px-4 align-items-center">
        <h2 class="text-light">
            <i class="bi bi-briefcase-fill"></i>
            Profissões
        </h2>
        <a href="#" class="btn btn-header">
            <i class="bi bi-plus"></i>
            Nova Profissão
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOME</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profissoes as $key => $profissao): ?>
                <tr>
                    <th scope="row"><?= $key + 1; ?></th>
                    <td>
                        <?= $profissao->nome; ?>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-header dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opções
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-trash-fill"></i>
                                        Remover
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