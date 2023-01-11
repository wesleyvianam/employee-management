<?php require_once __DIR__ . '/../components/baseInicio.php';?>
<div class="shadow mb-5 bg-body rounded mt-4">
    <div class="bg-header d-flex justify-content-between py-2 px-4 align-items-center">
        <h5 class="text-light m-0">
            <i class="bi bi-briefcase-fill"></i>
            Profissões
        </h5>
        
        <?php require_once __DIR__ . '/_filtro.php';?>

        <a href="/cadastrar-profissao" class="btn btn-sm btn-header">
            <i class="bi bi-plus"></i>
            Nova Profissão
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NOME</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profissoes as $profissao): ?>
                <tr>
                    <td>
                        <?= $profissao->nome; ?>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-header dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opções
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/editar-profissao?id=<?= $profissao->id; ?>">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/remover-profissao?id=<?= $profissao->id; ?>">
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
    <div class="d-flex justify-content-center align-items-center"> 
        <?php foreach ($pagina->obterPaginas() as $page):?>  
            <a href="?pagina=<?= $page['pagina'] . $gets  ?>">
                <button type="button" class="btn btn-sm btn-<?= $page['atual'] == 1? 'paginator-atual' : 'paginator' ?> mx-1 mb-3"><?= $page['pagina'] ?></button>
            </a>    
        <?php endforeach ?> 
    </div>
</div>

<?php require_once __DIR__ . '/../components/baseFim.php';?>