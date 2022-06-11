<?php

namespace App\Entity\Book;

interface BookInterface{

    public function addTitle(string $title) : void;

    public function addAuthor(string $author) : void;

    public function addPagesNumber(int $number) : void;

    public function addIsBorrowed(bool $isBorrowed) : void;

    public function addBorrowedBy($borrowedBy) : void;

    public function addDateOfReturn($dateOfReturn) : void;

}