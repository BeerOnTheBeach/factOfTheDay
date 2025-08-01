<?php

namespace App\Entity;

use App\Repository\FactRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: FactRepository::class)]
class Fact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;


    #[Assert\Length(max: 40, maxMessage: 'Die Überschrift darf maximal 40 Zeichen lang sein.')]
    #[ORM\Column(length: 255, nullable: false)]
    private string $label;

    #[Assert\Length(max: 400, maxMessage: 'Der Fakt darf maximal 400 Zeichen lang sein.')]
    #[ORM\Column(type: Types::TEXT, nullable: false)]
    private string $body;

    #[ORM\ManyToOne(inversedBy: 'facts')]
    private User $author;

    #[ORM\Column(nullable: true)]
    private ?DateTime $published = null;

    #[ORM\Column]
    private bool $approved = false;

    public function __toString(): string
    {
        return $this->label;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): static
    {
        $this->body = $body;

        return $this;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getPublished(): ?DateTime
    {
        return $this->published;
    }

    public function setPublished(?DateTime $published): static
    {
        $this->published = $published;

        return $this;
    }

    public function isApproved(): ?bool
    {
        return $this->approved;
    }

    public function setApproved(bool $approved): static
    {
        $this->approved = $approved;

        return $this;
    }
}
