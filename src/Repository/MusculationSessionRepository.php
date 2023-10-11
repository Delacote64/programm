<?php

namespace App\Repository;

use App\Entity\MusculationSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MusculationSession>
 *
 * @method MusculationSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method MusculationSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method MusculationSession[]    findAll()
 * @method MusculationSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusculationSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusculationSession::class);
    }

    public function save(MusculationSession $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // public function getTitles() {
    //     return $this->createQueryBuilder('m')
    //     ->select('m.title_session')
    //     ->getQuery()
    //     ->getResult();
    // }
//    /**
//     * @return MusculationSession[] Returns an array of MusculationSession objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MusculationSession
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
