<?php

namespace App\Controller;

use App\Entity\Book\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[AsController]
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
        $book = $this->doctrine->getRepository(Book::class)->findShorterThan($length);

        if(!$book){
            throw new NotFoundHttpException("Nie znaleziono książek krótszych niż podana ilość stron.");
        }
        else{
            return $book;
        }
    }


}