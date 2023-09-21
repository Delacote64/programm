<?php

namespace App\Repository;

use App\Entity\CardioSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CardioSession>
 *
 * @method CardioSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method CardioSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method CardioSession[]    findAll()
 * @method CardioSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CardioSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CardioSession::class);
    }

    public function save(CardioSession $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getTitles() {
        return $this->createQueryBuilder('m')
        ->select('m.title_session')
        ->getQuery()
        ->getResult();
    }

//    /**
//     * @return CardioSession[] Returns an array of CardioSession objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CardioSession
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
