<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Pessoa;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\DTO\DadosAtualizaPessoa;
use Dzenvolve\Test\DTO\ListaDadosPessoa;
use Dzenvolve\Test\Repository\Repository;
use Dzenvolve\Test\Entity\Pessoa;
use Exception;

class AtualizaCadastroController implements Controller
{
    public function __construct(private Repository $repository)
    {    
    }

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?id-error=0');
            return;
        }

        $nome = filter_input(INPUT_POST, 'nome');
        if ($nome === false || $nome === null) {
            header('Location: /?nome-error=0');
            return;
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($email === false || $email === null) {
            header('Location: /?email-error=0');
            return;
        }

        $nascimento = filter_input(INPUT_POST, 'nascimento');
        if ($nascimento === false || $nascimento === null) {
            header('Location: /?nascimento-error=0');
            return;
        }

        $sexo = filter_input(INPUT_POST, 'sexo');
        if ($sexo === false || $sexo === null) {
            header('Location: /?sexo-error=0');
            return;
        }

        $cpf = filter_input(INPUT_POST, 'cpf');
        if ($cpf === false || $cpf === null) {
            header('Location: /?cpf-error=0');
            return;
        }

        $rg = filter_input(INPUT_POST, 'rg');
        if ($rg === false || $rg === null) {
            header('Location: /?rg-error=0');
            return;
        }

        $telefone = filter_input(INPUT_POST, 'telefone');
        if ($telefone === false || $telefone === null) {
            header('Location: /?telefone-error=0');
            return;
        }

        $celular = filter_input(INPUT_POST, 'celular');
        if ($celular === false || $celular === null) {
            header('Location: /?celular-error=0');
            return;
        }

        $profissao = filter_input(INPUT_POST, 'profissao_id');
        $profissao_id = intval(str_replace("&gt;",'',$profissao));
        if ($profissao_id === false || $profissao_id === null) {
            header('Location: /?profissao=0');
            return;
        }
        $successo = $this->repository->atualizaPessoa(
            new DadosAtualizaPessoa(
                $id,
                $nome, 
                $email, 
                $nascimento, 
                $sexo, 
                $cpf, 
                $rg, 
                $telefone, 
                $celular, 
                $profissao_id
            ));
        if ($successo === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}