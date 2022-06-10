<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\GetByAuthorController;
use App\Controller\GetByLengthController;
use App\Controller\GetNumberOfBooksController;
use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(
    collectionOperations: [
        "get",
        "get_by_author" => [
            "method" => 'GET',
            "path" => '/custom/books/{author}',
            "controller" => GetByAuthorController::class,
            "read" => false,
            "openapi_context"=>[
                "parameters"=>[
                    [
                        "name"=>"author",
                        "in"=>"path",
                        "description"=>"Znajdź książki po autorze.",
                        "type"=>"string",
                        "required"=>true,
                        "example"=>"Henryk_Sienkiewicz",
                    ]
                ]
            ]
        ],
        "get_by_length"=>[
            "method" => 'GET',
            "path" => '/custom/books/{length}(Narazie nie działa)',
            "controller" => GetByLengthController::class,
            "read" => false,
            "openapi_context"=>[
                "parameters"=>[
                    [
                        "name"=>"length",
                        "in"=>"path",
                        "description"=>"Znajdź książki krótsze niż podana ilość stron.",
                        "type"=>"integer",
                        "required"=>true,
                    ]
                ]
            ]
        ]


    ],
    itemOperations: [
        "get",
        "get_number_of_books"=>[
            "method" => 'GET',
            "path" => '/custom/books/{title}',
            "controller" => GetNumberOfBooksController::class,
            "read" => false,
        ]
    ]

)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read", "write", "get:author"])]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read", "write", "get:author"])]
    private $author;

    #[ORM\Column(type: 'integer')]
    #[Groups(["read", "write", "get:author"])]
    private $numberOfPages;

    #[ORM\Column(type: 'boolean', options: ["default"=>false])]
    #[Groups(["read", "write", "get:author"])]
    private $isBorrowed;

    #[ORM\Column(type: 'string', length: 255, nullable: true, options: ["default"=>null])]
    #[Groups(["write", "get:author"])]
    private $borrowedBy;

    #[ORM\Column(type: 'string', length: 255, nullable: true, options: ["default"=>null])]
    #[Groups(["write", "get:author"])]
    private $dateOfReturn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getNumberOfPages(): ?int
    {
        return $this->numberOfPages;
    }

    public function setNumberOfPages(int $numberOfPages): self
    {
        $this->numberOfPages = $numberOfPages;

        return $this;
    }

    public function isIsBorrowed(): ?bool
    {
        return $this->isBorrowed;
    }

    public function setIsBorrowed(bool $isBorrowed): self
    {
        $this->isBorrowed = $isBorrowed;

        return $this;
    }

    public function getBorrowedBy(): ?string
    {
        return $this->borrowedBy;
    }

    public function setBorrowedBy(?string $borrowedBy): self
    {
        $this->borrowedBy = $borrowedBy;

        return $this;
    }

    public function getDateOfReturn(): ?string
    {
        return $this->dateOfReturn;
    }

    public function setDateOfReturn(?string $dateOfReturn): self
    {
        $this->dateOfReturn = $dateOfReturn;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getAuthor();
    }
}
