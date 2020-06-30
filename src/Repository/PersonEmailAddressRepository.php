<?php

namespace App\Repository;

use App\Entity\PersonEmailAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonEmailAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonEmailAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonEmailAddress[]    findAll()
 * @method PersonEmailAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonEmailAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonEmailAddress::class);
    }

    // /**
    //  * @return PersonEmailAddress[] Returns an array of PersonEmailAddress objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonEmailAddress
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
