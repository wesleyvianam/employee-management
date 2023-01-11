<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Pessoa;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;
use Dzenvolve\Test\Helper\Pagina;

class ListaMulheresController implements Controller
{

    public function __construct(private Repository $repository)
    {
    }

    public function processaRequisicao()
    {
        if ($_GET) {
            $condicao = [];
            $nome = filter_input(INPUT_GET, 'nome');
            if ($nome !== "" || $nome != null || empty($nome)) {
                array_push($condicao, "pessoas.nome LIKE '%$nome%'");
            }

            $sexo = filter_input(INPUT_GET, 'sexo');
            if ($sexo != "" || $sexo != null) {
                array_push($condicao, "pessoas.sexo = '$sexo'");
            }
    
            $cpf = filter_input(INPUT_GET, 'cpf');
            if ($cpf != "" || $cpf != null) {
                array_push($condicao, "pessoas.cpf = '$cpf'");
            }
    
            $nascidoDe = filter_input(INPUT_GET, 'nascido_de');
            if ($nascidoDe != "" || $nascidoDe != null) {
                array_push($condicao, "pessoas.nascimento > '$nascidoDe'");
            }
            
            $nascidoAte = filter_input(INPUT_GET, 'nascido_ate');
            if ($nascidoAte != "" || $nascidoAte != null) {
                array_push($condicao, "pessoas.nascimento < '$nascidoAte'");
            }
    
            $where = implode(" AND ", $condicao);
            $where = ' AND ' . $where;
        }
        $pagina = new Pagina($this->repository->qtdPessoas($where), (int)$_GET['pagina'] ?? 1, 10);
        $pessoas = $this->repository->obterTodasPessoas($where, $pagina->obterLimite());
        $profissoes = $this->repository->obterProfissoes();
        unset($_GET['status']);
        unset($_GET['pagina']);
        $gets = http_build_query($_GET);
        require_once __DIR__ . '/../../../views/pessoa/index.php';
    }
}