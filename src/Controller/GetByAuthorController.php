<?php

namespace App\Controller;


use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetByAuthorController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine){
        $this->doctrine = $doctrine;
    }

    public function __invoke(string $author){

        $book = $this->doctrine->getRepository(Book::class)->findBy(
            ['author'=>$author],
        );

//        if(!$book){
//            throw $this->createNotFoundException("Wiadomość");
//        }
//        else{
//            return $book;
//        }
        return $book;
    }
}