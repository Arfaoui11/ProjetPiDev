<?php

namespace App\Repository;

use App\Entity\Gvol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\BarChart;

/**
 * @method Gvol|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gvol|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gvol[]    findAll()
 * @method Gvol[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gvol::class);
    }

    // /**
    //  * @return Gvol[] Returns an array of Gvol objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gvol
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getART()
    {

        $qb = $this->createQueryBuilder('v')
            ->select('COUNT(v.nomv) AS cvol, SUBSTRING(v.nomv, 1, 100000) AS volt')
            ->groupBy('volt');
        return $qb->getQuery()
            ->getResult();

    }
}
