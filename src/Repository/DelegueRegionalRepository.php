<?php

namespace App\Repository;

use App\Entity\DelegueRegional;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DelegueRegional|null find($id, $lockMode = null, $lockVersion = null)
 * @method DelegueRegional|null findOneBy(array $criteria, array $orderBy = null)
 * @method DelegueRegional[]    findAll()
 * @method DelegueRegional[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DelegueRegionalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DelegueRegional::class);
    }

    // /**
    //  * @return DelegueRegional[] Returns an array of DelegueRegional objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DelegueRegional
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
   public function isLoginEquals(){
       $conn = $this->getEntityManager()->getConnection();
       
       $sql = 'Select login from delegue_regional;';
       
       $stmt = $conn->prepare($sql);
       $stmt->execute();
       
       return $stmt->fetchAll();
   }
}
