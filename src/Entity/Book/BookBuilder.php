<?php

namespace App\Entity\Book;

class BookBuilder implements BookInterface
{
    private Book $book;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->book = new Book();
    }

    public function addTitle($title): void
    {
        $this->book->setTitle($title);
    }

    public function addAuthor($author): void
    {
        $this->book->setAuthor($author);
    }

    public function addPagesNumber($number): void
    {
        $this->book->setNumberOfPages($number);
    }

    public function addIsBorrowed($isBorrowed): void
    {
        $this->book->setIsBorrowed($isBorrowed);
    }

    public function addBorrowedBy($borrowedBy): void
    {
        $this->book->setBorrowedBy($borrowedBy);
    }

    public function addDateOfReturn($dateOfReturn): void
    {
        $this->book->setDateOfReturn($dateOfReturn);
    }
}