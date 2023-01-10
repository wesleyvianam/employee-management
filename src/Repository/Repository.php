<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Repository;

use Dzenvolve\Test\DTO\DadosAtualizaPessoa;
use Dzenvolve\Test\DTO\ListaDadosPessoa;
use Dzenvolve\Test\DTO\ListaDadosProfissao;
use Dzenvolve\Test\Entity\Pessoa;
use PDO;

class Repository
{
    public function __construct(private PDO $pdo)
    {   
    }

    public function obterTodasPessoas()
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

    public function cadastraPessoa(Pessoa $pessoa): bool
    {
        $sql = 'INSERT INTO pessoas (nome,email,nascimento,sexo,cpf,rg,telefone,celular,profissao_id)
            VALUES (:nome, :email, :nascimento, :sexo, :cpf, :rg, :telefone, :celular, :profissao_id)';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':nome', $pessoa->nome);
        $declaracao->bindValue(':email', $pessoa->email);
        $declaracao->bindValue(':nascimento', $pessoa->nascimento);
        $declaracao->bindValue(':sexo', $pessoa->sexo);
        $declaracao->bindValue(':cpf', $pessoa->cpf);
        $declaracao->bindValue(':rg', $pessoa->rg);
        $declaracao->bindValue(':telefone', $pessoa->telefone);
        $declaracao->bindValue(':celular', $pessoa->celular);
        $declaracao->bindValue(':profissao_id', $pessoa->profissao_id);
        
        return $declaracao->execute();
    }

    public function atualizaPessoa(DadosAtualizaPessoa $pessoa): bool
    {
        $sql = 'UPDATE pessoas 
            SET nome = :nome, email = :email, nascimento = :nascimento, sexo = :sexo, cpf = :cpf, 
            rg = :rg, celular = :celular, telefone = :telefone, profissao_id = :profissao_id
            WHERE id = :id;
        ';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':nome', $pessoa->nome);
        $declaracao->bindValue(':email', $pessoa->email);
        $declaracao->bindValue(':nascimento', $pessoa->nascimento);
        $declaracao->bindValue(':sexo', $pessoa->sexo);
        $declaracao->bindValue(':cpf', $pessoa->cpf);
        $declaracao->bindValue(':rg', $pessoa->rg);
        $declaracao->bindValue(':celular', $pessoa->celular);
        $declaracao->bindValue(':telefone', $pessoa->telefone);
        $declaracao->bindValue(':profissao_id', $pessoa->profissao_id);
        $declaracao->bindValue(':id', $pessoa->id, PDO::PARAM_INT);

        
        return $declaracao->execute();
    }

    public function removePessoa(int $id): bool
    {
        $sql = 'DELETE FROM pessoas WHERE id = :id';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':id', $id, PDO::PARAM_INT);

        return $declaracao->execute();
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