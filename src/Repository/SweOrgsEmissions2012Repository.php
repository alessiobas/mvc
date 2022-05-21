<?php

namespace App\Repository;

use App\Entity\SweOrgsEmissions2012;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SweOrgsEmissions2012|null find($id, $lockMode = null, $lockVersion = null)
 * @method SweOrgsEmissions2012|null findOneBy(array $criteria, array $orderBy = null)
 * @method SweOrgsEmissions2012[]    findAll()
 * @method SweOrgsEmissions2012[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SweOrgsEmissions2012Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SweOrgsEmissions2012::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SweOrgsEmissions2012 $entity, bool $flush = true): void
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
    public function remove(SweOrgsEmissions2012 $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SweOrgsEmissions2012[] Returns an array of SweOrgsEmissions2012 objects
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
    public function findOneBySomeField($value): ?SweOrgsEmissions2012
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
