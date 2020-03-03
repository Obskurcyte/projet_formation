<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValidationRepository")
 */
class Validation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $validatedOn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $payload;

    /**
     * @ORM\Column(type="boolean")
     */
    private $valid;

    /**
     * @ORM\Column(type="text")
     */
    private $feedback;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Item")
     */
    private $item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidatedOn(): ?\DateTimeInterface
    {
        return $this->validatedOn;
    }

    public function setValidatedOn(\DateTimeInterface $validatedOn): self
    {
        $this->validatedOn = $validatedOn;

        return $this;
    }

    public function getPayload(): ?string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    public function getValid(): ?bool
    {
        return $this->valid;
    }

    public function setValid(bool $valid): self
    {
        $this->valid = $valid;

        return $this;
    }

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(string $feedback): self
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }
}
