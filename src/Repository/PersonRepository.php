<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Repository;

use Dzenvolve\Test\DTO\DataPerson;
use Dzenvolve\Test\Entity\Person;
use PDO;

class PersonRepository
{
    public function __construct(private PDO $pdo)
    {   
    }

    public function getAll()
    {
        $pessoas = $this->pdo
            ->query(
                'SELECT * FROM pessoas;'
            )
            ->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(
            $this->hydratePerson(...),
            $pessoas
        );
    }

    public function getBySexAndAge() {
        $pessoas = $this->pdo
            ->query(
                "SELECT 
                    person.*,
                    profission.nome as profissao
                FROM pessoas as person, profissoes as profission 
                WHERE person.profissao_id = profission.id
                AND sexo = 'feminino' 
                AND nascimento < '2001.01.01';"
            )
            ->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(
            $this->hydratePerson(...),
            $pessoas
        );
    }

    private function hydratePerson(array $personData): DataPerson
    {
        $person = new DataPerson(
            $personData['id'],
            $personData['nome'],
            $personData['nascimento'],
            $personData['sexo'],
            $personData['cpf'],
            $personData['email'],
            $personData['celular'],
            $personData['profissao'],
        );
        
        return $person;
    }
}