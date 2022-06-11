<?php

namespace App\Controller;

use App\Entity\Book\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[AsController]
class GetNumberOfBooksController
{
    private ManagerRegistry $doctrine;

    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function __invoke(string $title){
        $number = $this->doctrine->getRepository(Book::class)->findNumberOfBooks($title);

        if($number == 0){
            throw new NotFoundHttpException("Nie posiadamy żadnego dostępnego egzemplarza podanej książki");
        }
        else{
            return $number;
        }
    }


}