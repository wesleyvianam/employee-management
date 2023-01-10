<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Repository;

use Dzenvolve\Test\DTO\ListaDadosPessoa;
use Dzenvolve\Test\DTO\ListaDadosProfissao;
use PDO;

class Repository
{
    public function __construct(private PDO $pdo)
    {   
    }

    public function ObterTodasPessoas()
    {
        $sql = 'SELECT pessoas.*, profissoes.nome as profissao 
            FROM pessoas, profissoes 
            WHERE pessoas.profissao_id = profissoes.id;
        ';
        $pessoas = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        return array_map($this->hidrataPessoa(...),$pessoas);
    }

    public function ObterPorGeneroEIdade() {
        $sql = "SELECT pessoas.*, profissoes.nome as profissao
            FROM pessoas, profissoes 
            WHERE pessoas.profissao_id = profissoes.id
            AND sexo = 'feminino' 
            AND nascimento < '2001.01.01'
        ;";
        $pessoas = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        return array_map($this->hidrataPessoa(...), $pessoas);
    }

    public function ObterPessoaPorId(int $id)
    {
        $sql = 'SELECT pessoas.*, profissoes.nome as profissao 
            FROM pessoas, profissoes 
            WHERE pessoas.id = :id;
            WHERE pessoas.profissao_id = profissoes.id;
        ';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':id', $id, \PDO::PARAM_INT);
        $declaracao->execute();
        return $this->hidrataPessoa($declaracao->fetch(\PDO::FETCH_ASSOC));
    }

    public function ObterProfissoes()
    {
        $sql = "SELECT * FROM profissoes";
        $profissoes = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        return array_map($this->hidrataProfissao(...), $profissoes);
    }

    private function hidrataPessoa(array $dadosPessoa): ListaDadosPessoa
    {
        $pessoa = new ListaDadosPessoa(
            $dadosPessoa['id'],
            $dadosPessoa['nome'],
            $dadosPessoa['nascimento'],
            $dadosPessoa['sexo'],
            $dadosPessoa['cpf'],
            $dadosPessoa['rg'],
            $dadosPessoa['email'],
            $dadosPessoa['celular'],
            $dadosPessoa['telefone'],
            $dadosPessoa['profissao'],
        );
        
        return $pessoa;
    }

    private function hidrataProfissao(array $dadosProfissao): ListaDadosProfissao
    {
        $profissao = new ListaDadosProfissao(
            $dadosProfissao['id'],
            $dadosProfissao['nome'],
        );
        
        return $profissao;
    }
}