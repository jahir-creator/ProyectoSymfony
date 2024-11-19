<?php

namespace App\Repository;

use App\Entity\Datosusuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Datosusuario>
 */
class DatosusuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Datosusuario::class);
    }

    public function add(Datosusuario $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if($flush){
            $this->_en->flush();
        }
    }

    public function findAllDatosusuarios(): array
{
    return $this->findAll();
}

//    /**
//     * @return Datosusuario[] Returns an array of Datosusuario objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Datosusuario
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
