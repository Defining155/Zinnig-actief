<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Start;

    /**
     * @ORM\Column(type="date")
     */
    private $End;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Min;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Max;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservation", inversedBy="Event_id")
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->Start;
    }

    public function setStart(\DateTimeInterface $Start): self
    {
        $this->Start = $Start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->End;
    }

    public function setEnd(\DateTimeInterface $End): self
    {
        $this->End = $End;

        return $this;
    }

    public function getMin(): ?string
    {
        return $this->Min;
    }

    public function setMin(string $Min): self
    {
        $this->Min = $Min;

        return $this;
    }

    public function getMax(): ?string
    {
        return $this->Max;
    }

    public function setMax(string $Max): self
    {
        $this->Max = $Max;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getUser(): ?Reservation
    {
        return $this->User;
    }

    public function setUser(?Reservation $User): self
    {
        $this->User = $User;

        return $this;
    }
}
