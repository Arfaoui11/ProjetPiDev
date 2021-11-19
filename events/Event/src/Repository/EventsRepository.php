<?php

namespace App\Repository;

use App\Entity\Events;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Events|null find($id, $lockMode = null, $lockVersion = null)
 * @method Events|null findOneBy(array $criteria, array $orderBy = null)
 * @method Events[]    findAll()
 * @method Events[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Events::class);
    }

    // /**
    //  * @return Events[] Returns an array of Events objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Events
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function OrderByPriceDQL()
    {
        $em = $this -> getEntityManager();
        $query = $em -> createQuery('select e from App\Entity\Events e order by e.price DESC');
        return $query->getResult();
    }
    public function OrderByPriceQB()
    {
        return $this->createQueryBuilder('e')//select
            ->orderBy('e.price','DESC')
            ->getQuery() ->getResult();
        ;
    }

    function listEventByCategorie($id)
    {
        return $this -> createQueryBuilder('e')
            ->join('e.Categorie','c')
            //selectionner l'entity categorie
            ->addSelect('c')
            ->where('c.id=:id')
            ->setParameter('id',$id)
            ->getQuery() -> getResult();
    }

    function SearchPRICE($price)
    {
        return  $this->createQueryBuilder('e')
            ->where('e.price LIKE :price')
            ->setParameter('price','%'.$price.'%')
            ->getQuery()->getResult();
    }
    public function OrderByDATE()
    {
        return $this->createQueryBuilder('e')//select

            ->orderBy('e.date' ,'ASC')
            ->setMaxResults(3)->getQuery() ->getResult();
        ;
    }




}
