<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Pessoa;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

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
            // print_r($where);die;
        }
        
        $pessoas = $this->repository->obterTodasPessoas($where);
        $profissoes = $this->repository->obterProfissoes();
        require_once __DIR__ . '/../../../views/pessoa/index.php';
    }
}