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
            $this->hydrateVideo(...),
            $pessoas
        );
    }

    private function hydrateVideo(array $personData): DataPerson
    {
        $person = new DataPerson(
            $personData['id'],
            $personData['nome'],
            $personData['nascimento'],
            $personData['sexo'],
            $personData['cpf'],
            $personData['email'],
            $personData['celular'],
            $personData['profissao_id'],
        );
        
        return $person;
    }
}