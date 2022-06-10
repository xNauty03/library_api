<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;

class GetByLengthController
{
    private ManagerRegistry $doctrine;

    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine){
        $this->doctrine = $doctrine;
    }

    public function __invoke(int $length){
        $book = $this->doctrine->getRepository(Book::class)->findBy(
            ['numberOfPages' <= $length],
        );

        return $book;
    }


}