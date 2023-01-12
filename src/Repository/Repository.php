<?php 

declare(strict_types=1);

namespace Dzenvolve\Repository;

use Dzenvolve\DTO\Pessoa\DadosAtualizaPessoa;
use Dzenvolve\DTO\Pessoa\ListaDadosPessoa;
use Dzenvolve\DTO\Profissao\DadosAtualizaProfissao;
use Dzenvolve\DTO\Profissao\ListaDadosProfissao;
use Dzenvolve\Entity\Pessoa;
use Dzenvolve\Entity\Profissao;
use PDO;

class Repository
{
    public function __construct(private PDO $pdo)
    {   
    }

    public function qtdPessoas($where = null) 
    {
        $sql = "SELECT COUNT(*)
            FROM pessoas, profissoes
            WHERE pessoas.profissao_id = profissoes.id $where;
        ";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(); 
        return $resultado->fetchColumn();
    }

    public function obterTodasPessoas($where = null, $limit = null)
    {
        $sql = "SELECT pessoas.*, profissoes.nome as profissao 
            FROM pessoas, profissoes
            WHERE pessoas.profissao_id = profissoes.id $where $limit;
        ";
        $pessoas = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        return array_map($this->hidrataPessoa(...),$pessoas);
    }

    public function obterPessoaPorId(int $id)
    {
        $sql = 'SELECT pessoas.*, profissoes.id as profissoes_id, profissoes.nome as profissao
            FROM pessoas, profissoes 
            WHERE pessoas.id = :id;
            AND pessoas.profissao_id = profissoes.id
        ;';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':id', $id, \PDO::PARAM_INT);
        $declaracao->execute();
        return $this->hidrataPessoa($declaracao->fetch(\PDO::FETCH_ASSOC));
    }

    public function cadastraPessoa(Pessoa $pessoa): bool
    {
        $sql = 
            'INSERT INTO pessoas (nome,email,nascimento,sexo,cpf,rg,celular,telefone,profissao_id)
            VALUES (:nome,:email,:nascimento,:sexo,:cpf,:rg,:celular,:telefone,:profissao_id)'
        ;
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

    public function qtdProfissoes($where = null)
    {
        $sql = "SELECT COUNT(*) FROM profissoes $where;";
        $resultado = $this->pdo->prepare($sql);
        
        $resultado->execute(); 
        return $resultado->fetchColumn();
    }

    public function obterProfissoes(string $where = "", string $limit = "")
    {
        $sql = "SELECT * FROM profissoes $where $limit;";
        $profissoes = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        return array_map($this->hidrataProfissao(...), $profissoes);
    }

    public function obterProfissaoPorId(int $id)
    {
        $sql = 'SELECT * FROM profissoes WHERE id = :id';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':id', $id, \PDO::PARAM_INT);
        $declaracao->execute();

        return $this->hidrataProfissao($declaracao->fetch(\PDO::FETCH_ASSOC));
    }

    public function cadastraProfissao(Profissao $profissao): bool
    {
        $sql = 'INSERT INTO profissoes (nome) VALUES (:nome);';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':nome', $profissao->nome);
        
        return $declaracao->execute();
    }

    public function atualizaProfissao(DadosAtualizaProfissao $profissao): bool
    {
        $sql = 'UPDATE profissoes SET nome = :nome WHERE id = :id';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':nome', $profissao->nome);
        $declaracao->bindValue(':id', $profissao->id);
        
        return $declaracao->execute();
    }

    public function removeProfissao(int $id): bool
    {
        $sql = 'DELETE FROM profissoes WHERE id = :id';
        $declaracao = $this->pdo->prepare($sql);
        $declaracao->bindValue(':id', $id, PDO::PARAM_INT);

        return $declaracao->execute();
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
            $dadosPessoa['profissao_id'],
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