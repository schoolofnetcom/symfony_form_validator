<?php

namespace App\Repository;

use App\Entity\Candidato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Candidato|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidato|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidato[]    findAll()
 * @method Candidato[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Candidato::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
