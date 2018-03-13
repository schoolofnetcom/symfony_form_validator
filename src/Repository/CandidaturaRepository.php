<?php

namespace App\Repository;

use App\Entity\Candidatura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Candidatura|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidatura|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidatura[]    findAll()
 * @method Candidatura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidaturaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Candidatura::class);
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
