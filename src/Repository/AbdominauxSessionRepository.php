<?php

namespace App\Repository;

use App\Entity\AbdominauxSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AbdominauxSession>
 *
 * @method AbdominauxSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbdominauxSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbdominauxSession[]    findAll()
 * @method AbdominauxSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbdominauxSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbdominauxSession::class);
    }

    public function save(AbdominauxSession $entity, bool $flush = false): void
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
//     * @return AbdominauxSession[] Returns an array of AbdominauxSession objects
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

//    public function findOneBySomeField($value): ?AbdominauxSession
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
