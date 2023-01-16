<?php

declare(strict_types=1);

namespace Dzenvolve\Service;

use Dzenvolve\DTO\Pessoa\DadosAtualizaPessoa;
use Dzenvolve\DTO\Profissao\DadosAtualizaProfissao;
use Dzenvolve\Entity\Pessoa;
use Dzenvolve\Entity\Profissao;
use Dzenvolve\Helper\Pagina;
use Dzenvolve\Repository\Repository;

class Service
{
    public function __construct(private Repository $repository)
    {
    }

    public function validaDados($tipo, $nome)
    {
        return filter_input($tipo, $nome);
    }
    
    public function salvaProfissao(string $nome)
    {
        if ($nome === false || $nome === null) {
            header('Location: /profissoes?nome-error=0');
            return;
        }

        $successo = $this->repository->cadastraProfissao(new Profissao($nome));
        return $successo === false
            ? header('Location: /cadastrar-profissao?sucesso=0')
            : header('Location: /profissoes?pagina=1sucesso=1');
    }

    public function buscaProfissoes($nome = null)
    {
        if ($nome !== false || $nome !== null) {
            $where = $nome ? "WHERE nome LIKE '%$nome%'": '';
        }

        $pagina = new Pagina($this->repository->qtdProfissoes($where), (int)$_GET['pagina'] ?? 1, 10);

        return [
            'dados' => $this->repository->obterProfissoes($where, $pagina->obterLimite()),
            'pagina' => $pagina
        ];
    }

    public function buscaProfissoesPorId(int $id)
    {
        if ($id === false || $id === null) {
            header('Location: /?sucesso=0');
            return;
        }
        
        return $this->repository->obterProfissaoPorId($id);
    }

    public function buscaTodasProfissoes()
    {
        return $this->repository->obterProfissoes();
    }

    public function atualizaProfissao(int $id, string $nome) {
        if ($id === false || $id === null) {
            header('Location: /profissoes?id-error=0');
            return;
        }

        if ($nome === false || $nome === null) {
            header('Location: /profissoes?nome-error=0');
            return;
        }

        $successo = $this->repository->atualizaProfissao(new DadosAtualizaProfissao($id,$nome));
        return $successo === false
           ? header('Location: /profissoes?sucesso=0')
           : header('Location: /profissoes?sucesso=1');
    }

    public function removeProfissao(int $id)
    {
        if ($id === null || $id === false) {
            header('Location: /profissoes?pagina=1sucesso=0');
            return;
        }

        $successo = $this->repository->removeProfissao($id);
        return $successo === false 
            ? header('Location: /profissoes?pagina=1?sucesso=0') 
            : header('Location: /profissoes?pagina=1?sucesso=1');
    }

    public function buscaPessoas($nome, $sexo, $cpf, $nascidoDe, $nascidoAte) {
        $condicao = [];
        
        if ($nome !== "" || $nome != null || empty($nome)) {
            array_push($condicao, "pessoas.nome LIKE '%$nome%'");
        }

        if ($sexo != "" || $sexo != null) {
            array_push($condicao, "pessoas.sexo = '$sexo'");
        }

        if ($cpf != "" || $cpf != null) {
            array_push($condicao, "pessoas.cpf = '$cpf'");
        }

        if ($nascidoDe != "" || $nascidoDe != null) {
            array_push($condicao, "pessoas.nascimento > '$nascidoDe'");
        }
        
        if ($nascidoAte != "" || $nascidoAte != null) {
            array_push($condicao, "pessoas.nascimento < '$nascidoAte'");
        }

        $where = implode(" AND ", $condicao);
        $where = ' AND ' . $where;

        $pagina = new Pagina($this->repository->qtdPessoas($where), $_GET['pagina'] ? (int)$_GET['pagina'] : 1, 8);
        
        return [
            'dados' => $this->repository->obterTodasPessoas($where, $pagina->obterLimite()),
            'pagina' => $pagina,
        ];
    }

    public function buscaPessoaPorId(int $id)
    {
        if ($id === false || $id === null) {
            header('Location: /pagina=1?sucesso=0');
            return;
        }

        return $this->repository->obterPessoaPorId($id);
    }

    public function salvaPessoa(
        $nome, 
        $email, 
        $nascimento, 
        $sexo, 
        $cpf, 
        $rg, 
        $celular, 
        $telefone, 
        $profissao_id
    ) {
        if ($nome === false || $nome === null) {
            header('Location: /cadastrar-pessoa?nome-error=0');
            return;
        }

        if ($email === false || $email === null) {
            header('Location: /cadastrar-pessoa?email-error=0');
            return;
        }

        if ($nascimento === false || $nascimento === null) {
            header('Location: /cadastrar-pessoa?nascimento-error=0');
            return;
        }

        if ($sexo === false || $sexo === null) {
            header('Location: /cadastrar-pessoa?sexo-error=0');
            return;
        }

        if ($cpf === false || $cpf === null) {
            header('Location: /cadastrar-pessoa?cpf-error=0');
            return;
        }

        if ($rg === false || $rg === null) {
            header('Location: /cadastrar-pessoa?rg-error=0');
            return;
        }

        if ($celular === false || $celular === null) {
            header('Location: /cadastrar-pessoa?celular-error=0');
            return;
        }

        if ($telefone === false || $telefone === null) {
            header('Location: /cadastrar-pessoa?telefone-error=0');
            return;
        }

        if ($profissao_id === false || $profissao_id === null) {
            header('Location: /?profissao=0');
            return;
        }

        $successo =$this->repository->cadastraPessoa(
            new Pessoa(
                $nome, 
                $email, 
                $nascimento, 
                $sexo, 
                $cpf, 
                $rg, 
                $celular, 
                $telefone, 
                $profissao_id
            ));

        return $successo === false
            ? header('Location: /?pagina=10sucesso=0')
            : header('Location: /?pagina=10');
    }

    public function removePessoa(int $id)
    {
        if ($id === null || $id === false) {
            header('Location: /?pagina=1sucesso=0');
            return;
        }
        
        $successo = $this->repository->removePessoa($id);
        return $successo === false 
            ? header('Location: /?pagina=1sucesso=0') 
            : header('Location: /?pagina=1sucesso=1');
    }

    public function atualizaPessoa(
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
    ) {
        if ($id === false || $id === null) {
            header('Location: /?id-error=0');
            return;
        }

        if ($nome === false || $nome === null) {
            header('Location: /?nome-error=0');
            return;
        }

        if ($email === false || $email === null) {
            header('Location: /?email-error=0');
            return;
        }

        if ($nascimento === false || $nascimento === null) {
            header('Location: /?nascimento-error=0');
            return;
        }

        if ($sexo === false || $sexo === null) {
            header('Location: /?sexo-error=0');
            return;
        }

        if ($cpf === false || $cpf === null) {
            header('Location: /?cpf-error=0');
            return;
        }

        if ($rg === false || $rg === null) {
            header('Location: /?rg-error=0');
            return;
        }

        if ($telefone === false || $telefone === null) {
            header('Location: /?telefone-error=0');
            return;
        }

        if ($celular === false || $celular === null) {
            header('Location: /?celular-error=0');
            return;
        }

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
            )
        );

        return $successo === false 
            ? header('Location: /?pagina=1sucesso=0')
            : header('Location: /?pagina=1sucesso=1');
    }
}