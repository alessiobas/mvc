<?php

namespace App\Repository;

use App\Entity\SweOrgsEmissions2014;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SweOrgsEmissions2014|null find($id, $lockMode = null, $lockVersion = null)
 * @method SweOrgsEmissions2014|null findOneBy(array $criteria, array $orderBy = null)
 * @method SweOrgsEmissions2014[]    findAll()
 * @method SweOrgsEmissions2014[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SweOrgsEmissions2014Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SweOrgsEmissions2014::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SweOrgsEmissions2014 $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(SweOrgsEmissions2014 $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SweOrgsEmissions2014[] Returns an array of SweOrgsEmissions2014 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SweOrgsEmissions2014
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
