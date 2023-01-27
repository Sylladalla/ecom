<?php

namespace App\Repository;

use App\Entity\ArrivalsDetalis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArrivalsDetalis>
 *
 * @method ArrivalsDetalis|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArrivalsDetalis|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArrivalsDetalis[]    findAll()
 * @method ArrivalsDetalis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArrivalsDetalisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArrivalsDetalis::class);
    }

    public function save(ArrivalsDetalis $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ArrivalsDetalis $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ArrivalsDetalis[] Returns an array of ArrivalsDetalis objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ArrivalsDetalis
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
