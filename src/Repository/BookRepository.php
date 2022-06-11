<?php

namespace App\Repository;

use App\Entity\Book\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 *
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    private $registry;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
        $this->registry = $registry;
    }

    public function add(Book $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Book $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //-------------------------------------------------------------------------------

    public function findNumberOfBooks(string $title)
    {
        $connection = $this->getEntityManager()->getConnection();
        $sql = "SELECT COUNT(id) FROM Book WHERE title LIKE :title AND is_borrowed LIKE false";
        $statement = $connection->prepare($sql);
        $resultSet = $statement->executeQuery(['title'=>$title]);

        return $resultSet->fetchAllAssociative();
    }


    public function findShorterThan(int $number){
        $connection = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM Book WHERE number_of_pages <= :number";
        $statement = $connection->prepare($sql);
        $resultSet = $statement->executeQuery(['number'=>$number]);

        return $resultSet->fetchAllAssociative();
    }
}
