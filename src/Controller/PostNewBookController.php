<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Book\Book;
//use App\Entity\Book\BookBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class PostNewBookController
{
    public function __invoke(Request $request)
    {
        $content = json_decode($request->getContent(), true);
//        $book = new BookBuilder();

//        $book->addTitle($content['title']);
//        $book->addAuthor($content['author']);
//        $book->addPagesNumber($content['numberOfPages']);
//        $book->addIsBorrowed(false);
//        $book->addBorrowedBy(null);
//        $book->addDateOfReturn(null);

        //To wyżej kiedyś będzie builderem :)

        $book = new Book();

        $book->setTitle($content['title']);
        $book->setAuthor($content['author']);
        $book->setNumberOfPages($content['numberOfPages']);
        $book->setIsBorrowed(false);
        $book->setBorrowedBy(null);
        $book->setDateOfReturn(null);






        die($book->__toString());


    }
}