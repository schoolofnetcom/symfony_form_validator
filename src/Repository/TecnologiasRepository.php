<?php

namespace App\Repository;

use App\Entity\Tecnologias;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tecnologias|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tecnologias|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tecnologias[]    findAll()
 * @method Tecnologias[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TecnologiasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tecnologias::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('t')
            ->where('t.something = :value')->setParameter('value', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
