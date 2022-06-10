<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LibraryUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibraryUserRepository::class)]
#[ApiResource]
class LibraryUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $lastName;

    #[ORM\Column(type: 'integer')]
    private $age;

    #[ORM\Column(type: 'boolean')]
    private $hasBorrowedBooks;

    #[ORM\Column(type: 'integer')]
    private $numberOfBooks;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function isHasBorrowedBooks(): ?bool
    {
        return $this->hasBorrowedBooks;
    }

    public function setHasBorrowedBooks(bool $hasBorrowedBooks): self
    {
        $this->hasBorrowedBooks = $hasBorrowedBooks;

        return $this;
    }

    public function getNumberOfBooks(): ?int
    {
        return $this->numberOfBooks;
    }

    public function setNumberOfBooks(int $numberOfBooks): self
    {
        $this->numberOfBooks = $numberOfBooks;

        return $this;
    }
}
